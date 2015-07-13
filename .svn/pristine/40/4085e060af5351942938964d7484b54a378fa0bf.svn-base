<?php

class Service extends Affi{
	/**
	 * 发送服务
	 * @return [type] [description]
	 */
	public static function sendService(){
		$database      = Flight::get('db');

		$userid        = $_POST['userid'];
		$tel           = $_POST['tel'];
		$address       = $_POST['address'];
		$username      = $_POST['username'];
		$servicetime   = $_POST['servicetime'];
		$comment       = $_POST['comment'];
		$sid           = $_POST['sid'];


		if( !$userid ||  !$tel ||  !$address || !$username || !$servicetime || !$comment || !$sid){
			echo json_encode(array(
				"success"   => 'false',
				"notice" => '参数缺少'
			));
		}


		$buyerName  = $database->select("lk_user",array("user_name"),array("user_id[=]" => $userid ));

		$result = $database->insert('lk_order', array(
			'buyer_id'         =>  $userid,
		    'buyer_name'       =>  $buyerName,
		    'add_time'         =>  time(),
		    'type'             =>  'service',
		    'need_time'        =>  $servicetime,
		    'remark'           =>  $comment
		));

		if( $result ){

			echo json_encode( array(
				"success"     => 'true',
				"notice"   => '下单成功，请耐心等待!'
			) );

		}
	}

	/**
	 * 得到大类
	 * @return [type] [description]
	 */
	public static function getClass(){
		$db = flight::get("db");
		$token = self::P("token");


		$result = $db->select("lk_service","*",array(
			"is_use[=]" => 1,
			"ORDER"     => "sort_order desc"
		));

		if( $result ){
			echo json_encode(array(
				"success"   => 'true',
				"data"      => $result
			));
			exit();
		}else{
			echo json_encode(array(
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
		$token = self::P("token"); 
		
		$result = $db->select("lk_service_item","*",array(
			"is_use[=]" => 1,
			"ORDER"     => "ser_id asc"
		));

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
	 * 得到二级分类下的评论词
	 * @return [type] [description]
	 */
	public static function getCommnetItem(){
		$db    = flight::get("db");
		$token = self::P("token"); 
		$iid   = self::P("itemid");

		if( !$token || !$iid ){
			echo self::paramsError;
			exit();
		}

		$reuslt = $db->select("lk_service_item","comment_item",array(
			"item_id" => $iid
		));

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
	 * 得到服务说明那边的文案
	 * @return [type] [description]
	 */
	public static function getServiceInfo(){
		$db    = flight::get("db");
		$token = self::P("token"); 
		$iid   = self::P("itemid");
		if( !$token || !$iid ){
			echo self::paramsError;
			exit();
		}

		$reuslt = $db->select("lk_service_item","price_detail,professional_detail,user_protected",array(
			"item_id" => $iid
		));

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

}