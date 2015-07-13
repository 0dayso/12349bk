<?php

// header('Content-type: application/json');

class Order extends Affi{
	
	/**
	 * 得到订单
	 * @author glivia
	 * @method post
	 * @param  $userid
	 * @return 
	 */
	public function getOrderList(){

		$database = Flight::get('db');
		$uid      = self::P('userid');
		$token    = self::P('token'); 

		if( !$token || !$uid ){
			echo self::paramsError;
			exit();
		}

		$result   = $database->select("lk_order","*",array("buyer_id[=]" => $userid ));

		if( $result ){
			echo json_encode(array(
				"success"   => 'true',
				"data"      => $result
			));
		}else{
			echo json_encode(array(
				"success"   => 'false'
			));
		}

		exit();
	}

	/**
	 * 订单支付
	 * @author glivia
	 * @method post
	 * @param  $orderid , $userid
	 * @return 
	 */
	public function orderPay(){

		$database = Flight::get('db');
		$orderid   = $_POST('orderid');
		$userid   = $_POST('userid');

		
	}


	/**
	 * 得到订单信息
	 * @author glivia
	 * @method post
	 * @param  $orderid , $userid
	 * @return 
	 */
	public function orderInfo(){
		$database  = Flight::get('db');
		$oid   = self::P('orderid');
		$uid   = self::P('userid');
		$token = self::P('token');


		if( !$token || !$uid || !$oid){
			echo self::paramsError;
			exit();
		}

		

	}


	/**
	 * 取消订单
	 * @author glivia
	 * @method post
	 * @param  $orderid , $userid
	 * @return 
	 */
	public function orderCancel(){

		$database  = Flight::get('db');
		$oid    = self::P('orderid');
		$uid    = self::P('userid');
		$token  = self::P('token');

		if( !$token || !$uid || !$oid){
			echo self::paramsError;
			exit();
		}

		$result = $database->update("lk_order",array(
			"status" => 3
		),array(
			"AND" => array(
				"order_sn[=]"  => $oid,
				"buyer_id[=]"  => $uid
			)
		));



		if( $result ){
			echo json_encode(array(
				"success"   => 'true'
			));
		}else{
			echo json_encode(array(
				"success"   => 'false'
			));
		}

		exit();
		
	}


	/**
	 * 订单评论
	 * @author glivia
	 * @method post
	 * @param  $orderid , $userid , $content
	 * @return 
	 */
	public function orderComment(){

		$database   = Flight::get('db');
		$orderid    = $_POST['orderid'];
		$userid     = $_POST['userid'];
		$content    = $_POST['content'];

		
	}



}