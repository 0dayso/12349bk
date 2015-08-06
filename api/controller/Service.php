<?php

class Service {
	/**
	 * 发送服务
	 * @return [type] [description]
	 */
	public static function sendService(){
		$db      = Flight::get('db');

		$data = Flight::request()->data;

		$user_id = isset($data["user_id"])?trim($data["user_id"]):'';
		if(!$user_id) {
			Flight::json( array( "success" => false, "msg" => "获取不到用户ID" ));
			die;
		}

		$item_id = isset($data["item_id"])?trim($data["item_id"]):'';
		if(!$item_id) {
			Flight::json( array( "success" => false, "msg" => "请选择一个服务类型" ));
			die;
		}

		// 判断当前用户是否包年套餐券
		$ownCoup = 0;
		if($item_id > 30) {
			$curTime = date('Y-m-d H:i:s');
			$coup_id = $db->get("lk_coup_list", "id",array("AND" => array(
				"user_id" => $user_id, 
				"item_id" => $item_id,
				"begintime[<]" => $curTime,
				"endtime[>]" => $curTime,
				"ischecked" => 0,
				"isuse" => 1
			 )));
			if(!$coup_id) {
				Flight::json( array( "success" => false, "msg" => "对不起您没有此类型的包年套餐优惠券，无法下单" ));
				die;
			}else{
				$ownCoup = 1;
			}
		}

		// 获取金额
		$need_time = isset($data['need_time'])?strtotime($data['need_time']):'';
		if(!$need_time) {
			Flight::json( array( "success" => false, "msg" => "请选择约定服务时间" ));
			die;
		}

		$startTime = date("Y-m-d", strtotime($need_time)).' 00:00:00';
		$endTime = date("Y-m-d", strtotime($need_time)).' 23:59:59';

		// 限单功能
		$limit_order = $db->get("lk_service_item", "limit_order", array("item_id" => $item_id));
		if($limit_order > 0) {
			// 当天已经下单量
			$hasOrder = $db->count("lk_order", array("[>]lk_order_service" => "order_sn"), "order_id", array("AND" =>array(
				"item_id" => $item_id,
				"need_time[>]" => $startTime,
				"need_time[<]" => $endTime,
				)));
			if($hasOrder >= $limit_order) {
				Flight::json( array( "success" => false, "msg" => "无法下单，预约时间当天订单已达到限单量" ));
				die;
			}
		}

		$contact = isset($data['contact'])?trim($data['contact']):'';
		if(!$contact) {
			Flight::json( array( "success" => false, "msg" => "请选择约定服务时间" ));
			die;
		}
		$phone_mob = isset($data['phone_mob'])?trim($data['phone_mob']):'';
		if(!$phone_mob) {
			Flight::json( array( "success" => false, "msg" => "请填写手机号或电话" ));
			die;
		}

		// 判断是手机号码还是电话
		if(preg_match("/1[3578]{1}\d{9}$/",$phone_mob)){  
		    $is_phone = true;
		}else{  
		    $is_phone = false;
		}  

		$address = isset($data['address'])?$data['address']:'';
		if(!$address) {
			Flight::json( array( "success" => false, "msg" => "请输入服务地址" ));
			die;
		}
		$remark = isset($data['remark'])?$data['remark']:'';

		$db = Flight::get('db');
		$user = $db->get("lk_user", array("user_id","user_name"), array("user_id" => $user_id));
		if(!$user) {
			Flight::json( array( "success" => false, "msg" => "找不到用户，请确认" ));
			die;
		}

		$order_sn = self::_generate_order_sn();
		$order_data = array(
			'order_sn' => $order_sn,
			'type' => 'service',
			'buyer_id' => isset($user['user_id'])?$user['user_id']:'',
			'buyer_name' => isset($user['user_name'])?$user['user_name']:'匿名',
			'add_time' => time(),
			'need_time' => $need_time,
			'source' => 0,
			'remark' => $remark,
		);

		$order_id = $db->insert("lk_order", $order_data);

		if($order_id) {

			$address_data = array(
				'order_sn' => $order_sn,
				'contact' => $contact,
				'address' => $address,
				'phone_mob' => $is_phone?$phone_mob:'',
				'phone_tel' => $is_phone?'':$phone_mob,
			);
			$order_address_id = $db->insert("lk_order_address", $address_data);

			if(!$order_address_id) {
				Flight::json( array( "success" => false, "msg" => "插入订单地址失败" ));
				die;
			}

			$item = $db->get("lk_service_item", array("ser_id", "item_name"), array("item_id" => $item_id));
			$service_name = $db->get("lk_service", "ser_name", array("ser_id" => $item['ser_id']));

			$order_service = array(
				'order_sn' => $order_sn,
				'service_id' => $item['ser_id'],
				'service_name' => $service_name,
				'item_id' => $item_id,
				'item_name' => $item['item_name'],
			);

			$order_service = $db->insert("lk_order_service", $order_service);
			if(!$order_service) {
				Flight::json( array( "success" => false, "msg" => "插入订单服务项失败" ));
				die;
			}

			$action_data = array(
				'order_sn' => $order_sn,
				'admin_id' => $user_id,
				'action_id' => '4',
				'action_result' => '1',
				'comment' => '微信下单',
				'action_time' => time(),
			);
			$action_id = $db->insert("lk_order_action", $action_data);

			// 若使用了优惠券
			if($ownCoup == 1) {
				$db->update("lk_coup_list", array("order_sn" => $order_sn, "ischecked" => 1, "usedtime" => date('Y-m-d H:i:s')), array("id" => $coup_id));
			}

			Flight::json( array( "success" => true, "msg" => "添加成功" ));
			die;

		}else{
			Flight::json( array( "success" => false, "msg" => "插入订单失败" ));
			die;
		}

	}

	/**
	 * 得到大类
	 * @return [type] [description]
	 */
	public static function getClass(){
		$db = flight::get("db");

		$result = $db->select("lk_service","*",array(
			"is_use[=]" => 1,
			"ORDER"     => "sort_order desc"
		));

		if( $result ){
			Flight::json(array(
				"success"   => 'true',
				"data"      => $result
			));
			exit();
		}else{
			Flight::json(array(
				"success"   => 'false'
			));
			exit();
		}

	}

	/**
	 * 得到二级子类目
	 * @return [type] [description]
	 */
	public static function getItem(){
		$db    = flight::get("db");
		
		$result = $db->select("lk_service_item","*",array(
			"is_use[=]" => 1,
			"ORDER"     => "ser_id asc"
		));

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
	 * 得到二级分类下的评论词
	 * @return [type] [description]
	 */
	public static function getCommnetItem(){
		$db    = flight::get("db");
		$iid   = P("item_id");

		if( !$iid ){
			Flight::json( array( "success" => false, "msg" => "缺少二级分类" ));
			exit();
		}

		$reuslt = $db->select("lk_service_item","comment_item",array(
			"item_id" => $iid
		));

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
	 * 得到服务说明那边的文案
	 * @return [type] [description]
	 */
	public static function getServiceInfo(){
		$db    = flight::get("db");
		$iid   = P("item_id");
		if( !$iid ){
			Flight::json( array( "success" => false, "msg" => "缺少二级分类" ));
			exit();
		}

		$reuslt = $db->select("lk_service_item","price_detail,professional_detail,user_protected",array(
			"item_id" => $iid
		));

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
	 * 生成订单号
	 *
	 * @param  string     $_pre [description]
	 * @return [type]           [description]
	 * @author zhaozl
	 * @since  2015-07-14
	 */
	public static function _generate_order_sn($_pre = ''){
        if($_pre == 'REC') {
        	$seq_no=substr(date('Y'),-2).date('md').date("H").date("i").rand(10000,99999);
        	$atrOrderSNMain = $_pre.$seq_no;

	        if(Flight::get('db')->get("lk_recharge", "r_order_sn", array("order_sn" => $atrOrderSNMain))) {
	        	return self::_generate_order_sn($_pre);
	        }
        }else{
        	$seq_no = date('ymd').'-'.rand(1000,9999);
        	$atrOrderSNMain = $_pre.$seq_no;

        	if(Flight::get('db')->get("lk_order", "order_sn", array("order_sn" => $atrOrderSNMain))) {
	        	return self::_generate_order_sn($_pre);
	        }
        }
        return $atrOrderSNMain;

    }

    /**
     * 购买优惠券
     *
     * @return [type]     [description]
     * @author zhaozl
     * @since  2015-07-18
     */
    public static function recharge() {

    	$db = Flight::get("db");
    	$phone_mob = P('phone_mob');
    	$open_id = P('open_id');

    	if(!$phone_mob || !$open_id) {
    		Flight::json(array(
				"success"   => false,
				"msg" => "缺少关键数据"
			));
			die;
    	}

    	$user_info = $db->get("lk_user", array("user_id", "user_name"), array("open_id" => $open_id));
    	if(!$user_info) {
    		Flight::json(array(
				"success"   => false,
				"msg" => "用户信息错误"
			));
			die;
    	}

    	$recharge_info = $db->get("lk_recharge", "id", array("AND" => array("phone_mob" => $phone_mob, "status[>]" => 0)));
    	if($recharge_info) {
    		Flight::json(array(
				"success"   => false,
				"msg" => "此手机号已经购买过"
			));
			die;
    	}

    	$old_order_sn = $db->get("lk_recharge", "r_order_sn", array("AND" => array("phone_mob" => $phone_mob, "status" => 0)));
    	if($old_order_sn) {
    		Flight::json(array(
				"success"   => true,
				"r_order_sn" => $old_order_sn
			));
			die;
    	}

    	$r_order_sn = self::_generate_order_sn("REC");
    	$last_id = $db->insert("lk_recharge", array(
    		"user_id" => $user_info['user_id'],
    		"phone_mob" => $phone_mob,
    		"r_order_sn" => $r_order_sn,
    		"type" => 2,
    		"coupon_id" => Flight::get("COUPON_ID"),
    		"money" => 100,
    		"status" => 0,
    		"ctime" => time(),
    	));

    	if($last_id) {
    		Flight::json(array(
				"success"   => true,
				"r_order_sn" => $r_order_sn
			));
			die;
    	}else{
    		Flight::json(array(
				"success"   => false,
				"msg" => "生成充值单失败"
			));
			die;
    	}

    }

}