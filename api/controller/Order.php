<?php

// header('Content-type: application/json');

class Order {
	
	/**
	 * 获取订单列表
	 * 
	 * @author glivia
	 *
	 * @param  $user_id
	 * @return 
	 */
	public function getOrderList(){

		$db = Flight::get('db');
		$user_id  = P('user_id');

		if( !$user_id ){
			Flight::json(array("success" => false, "msg" => '缺少关键数据'));
			exit();
		}

		$result = $db->select("lk_order", array(
			"[>]lk_order_address" => "order_sn",
			"[>]lk_order_service" => "order_sn",
		),"*",array("buyer_id" => $user_id , "ORDER" => "add_time DESC"));

		if( $result ){
			Flight::json(array(
				"success"   => 'true',
				"data"      => $result
			));
		}else{
			Flight::json(array(
				"success"   => 'false'
			));
		}

		exit();
	}

	/**
	 * 支付订单
	 * @author glivia
	 * @method post
	 * @param  $order_sn , $user_id
	 * @return 
	 */
	public function orderPay(){

		$db = Flight::get('db');
		$order_sn = P('order_sn');
		$coupon_id = P('coupon_id');
		$user_id = P('user_id');
		$money = P('money');

		if(!$order_sn || !$user_id) {
			Flight::json(array("success" => false, "msg" => '缺少关键数据'));
			exit();
		}

		// 检测订单
		$db = Flight::get('db');
		if($order_info = $db->get("lk_order", "*" ,array("AND" => array("status[~]" => array(4,5), "order_sn" => $order_sn)))) {
			// 有优惠券
			if($coupon_id) {

				$curTime = date("Y-m-d H:i:s");
				$coupon = $db->get("lk_coup_list", "*", array("AND" => array(
					"id" => $coupon_id, 
					"user_id" => $user_id,
					"begintime[<]" => $curTime,
					"endtime[>]" => $curTime,
					"isuse" => 1,
					"pay_confirm" => 0
				 )));

				if($coupon) {
					// 抵消
					if($coupon['item_id']) {
						$order_item = $db->get("lk_order_service", "item_id" ,array("order_sn" => $order_sn));
						if($order_item != $coupon['item_id']) {
							Flight::json(array("success" => false, "msg" => '优惠券享受的抵消服务与订单服务不一致，无法使用'));
							exit();
						}

						//获取抵消金额
						$coupon_value = $db->get("lk_service_item", "item_price" ,array("item_id" => $coupon['item_id']));
						$money = $coupon_value;
						$order_amount = $coupon_value;
					}else{
						if(!$money) {
							Flight::json(array("success" => false, "msg" => '缺少关键数据money'));
							exit();
						}

						// 现金,满减
						if($coupon['minprice'] && $coupon['minprice'] > $money) {
							Flight::json(array("success" => false, "msg" => '订单金额没达到满减的最小金额，无法使用'));
							exit();
						}

						$coupon_value = $coupon['money'];

						$order_amount = $money + $coupon_value;
					}

					$order_data = array(
						"status" => 6,
						"pay_type" => 2,
						"pay_time" => time(),
						"use_coupon_no" => $coupon['commoncode'],
						"use_coupon_value" => $coupon_value,
						"amount" => $order_amount,
						"discount" => $coupon_value,
						"order_amount" => $order_amount - $coupon_value,
					);

					$db->update("lk_order", $order_data, array("order_sn" => $order_sn));

					$pay_data = array(
						"order_sn" => $order_sn,
						"pay_id" => 1,
						"pay_name" =>'优惠券支付',
						"money" => $coupon_value,
						"pay_time" => time(),
						"status" => 1,
						"pay_message" => '优惠券抵消',
					);

					$pay_id = $db->insert("lk_order_pay", $pay_data);

					// 更改优惠券状态标识成已使用
					$coup_data = array(
						"ischecked" => 1,
						"usedtime" => date('Y-m-d H:i:s'),
						"order_sn" => $order_sn,
						"pay_confirm" => 1
					);

					$db->update("lk_coup_list", $coup_data, array("id" => $coupon_id));

				}else{
					Flight::json(array("success" => false, "msg" => '优惠券无效不能使用'));
					exit();
				}

			}else{

				if(!$money) {
					Flight::json(array("success" => false, "msg" => '缺少关键数据money'));
					exit();
				}


				$order_data = array(
					"status" => 5,
					"pay_type" => 0,
					"amount" => $money,
					"discount" => 0,
					"order_amount" => $money,
				);

				$db->update("lk_order", $order_data, array("order_sn" => $order_sn));

				$pay_data = array(
					"order_sn" => $order_sn,
					"money" => $money,
					"status" => 0,
				);

				$db->delete("lk_order_pay", array("AND" => array(
					"order_sn" => $order_sn,
					"status" => 0,
				)));

				$order_amount = $money;
				$pay_id = $db->insert("lk_order_pay", $pay_data);

			}

			Flight::json(array("success" => true, "msg" => '订单支付成功', "order_amount" => $order_amount, "order_sn" => $order_sn));

		}else{

			Flight::json(array("success" => false, "msg" => '无效的订单'));
			exit();

		}
		
	}


	/**
	 * 获取订单信息
	 * 
	 * @author glivia
	 * @method post
	 * @param  $order_sn , $user_id
	 * @return 
	 */
	public function orderInfo(){
		$db  = Flight::get('db');
		$order_sn   = P('order_sn');
		$user_id   = P('user_id');

		if( !$user_id || !$order_sn){
			Flight::json(array("success" => false, "msg" => '缺少关键数据'));
			exit();
		}

		$result = $db->query("SELECT A.*, B.*, C.*, D.phone_mob as staff_phone FROM lk_order A 
			LEFT JOIN lk_order_address B ON A.order_sn = B.order_sn 
			LEFT JOIN lk_order_service C ON A.order_sn = C.order_sn 
			LEFT JOIN lk_shopstaff D ON A.staff_id = D.staff_id 
			WHERE A.buyer_id = {$user_id} AND A.order_sn = '{$order_sn}'")->fetchAll();

		if( $result ){
			Flight::json(array(
				"success"   => 'true',
				"data"      => $result[0]
			));
		}else{
			Flight::json(array(
				"success"   => 'false'
			));
		}

		exit();

	}


	/**
	 * 取消订单
	 * 
	 * @author glivia
	 * @method post
	 * @param  $order_sn , $user_id
	 * @return 
	 */
	public function orderCancel(){

		$db  = Flight::get('db');
		$order_sn    = P('order_sn');
		$user_id     = P('user_id');

		if( !$user_id || !$order_sn){
			Flight::json(array("success" => false, "msg" => '缺少关键数据'));
			exit();
		}

		// 检测订单
		if($db->has("lk_order", array("AND" => array("order_sn" => $order_sn, "status[>=]" => 3)))) {
			Flight::json(array("success" => false, "msg" => '此订单不能取消'));
			exit();
		}

		$result = $db->update("lk_order",array(
			"status" => 3
		),array(
			"AND" => array(
				"order_sn[=]"  => $order_sn,
				"buyer_id[=]"  => $user_id
			)
		));

		// 返回优惠券
		$db->update("lk_coup_list", array("ischecked" => 0, "usedtime" => NULL, "order_sn" => ''), array("order_sn" => $order_sn));

		// Action
		$order_action = array(
			'order_sn' => $order_sn,
			'admin_id' => $user_id,
			'action_id' => 5,
			'action_result' => 1,
			'action_time' => time(),
			'comment' => '用户取消订单'
		);

		$last_id = $db->insert("lk_order_action", $order_action);

		if( $last_id ){
			Flight::json(array(
				"success"   => 'true'
			));
		}else{
			Flight::json(array(
				"success"   => 'false'
			));
		}
		exit();
		
	}

	/**
	 * 订单评论词
	 * 
	 * @author glivia
	 * @method post
	 * @param  $order_sn , $user_id , $content
	 * @return 
	 */
	public function orderComment(){

		$db   = Flight::get('db');
		$order_sn    = $_POST['order_sn'];
		$user_id     = $_POST['user_id'];
		$content    = $_POST['content'];


		
	}



}