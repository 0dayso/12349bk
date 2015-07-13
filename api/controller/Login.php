<?php
class Login extends Affi{
	/**
	 * checkLogin
	 * @return [type] [description]
	 */
	public static function checkLogin(){
		$database = Flight::get('db');
		$oid   = self::P('open_id');
		$token = self::P('token');
		//$openid   = 1111;
		//$result   = $database->select("lk_user",array("user_id","phone_mob"),array("open_id[=]" => $openid ));

		//$userId   = $result['user_id'];
		//$userTel  = $result['userTel'];

		//print_r( $result['user_id'] );

		// if( $result ){
		// 	//如果有记录
			
		// 	echo json_encode(array(
		// 		"success" => 'true',
		// 		"userId"  => $userId,
		// 		"userTel" => $userTel
		// 	));
		// }else{
		// 	//如果没记录
		// 	echo json_encode(array(
		// 		"success" => 'true',
		// 		"userId"  => 'none'
		// 	));
		// }
	}	


	/**
	 * sendYZM 发送短信
	 * @return [type] [description]
	 */
	public static function sendYZM(){
		$database = Flight::get('db');
	 
	}	


	/**
	 * doLogin
	 * @return [type] [description]
	 */
	public static function doLogin(){
		$database = Flight::get('db');
		$openid   = $_POST['openid'];
		$telnum   = $_POST['telnum'];
		$telnum   = $_POST['telnum'];

		$result   = $database->select("lk_user","*",array("buyer_id[=]" => $userid ));


		if( $result ){
			//如果有记录
			echo json_encode(array(
				"success" => 'true',
				"userId"  => 'none'
			));
		}else{
			//如果没记录
			echo json_encode(array(
				"success" => 'true',
				"userId"  => $userId,
				"userTel" => $userTel
			));
		}
	}	

	/**
	 * 检测是否绑定手机
	 */

	public static function checkBind(){
		$database = Flight::get('db');
		$oid      = self::P("openid");
		$token    = self::P("token");

		if( !$oid || !$token ){
			echo self::paramsError;
			exit();
		}

		$result = $db->select("lk_user",array(
			"AND" => array(
				"open_id[=]"   => $oid,
				"phone_mob[!]" => "" 
			)
		));

		if( $result ){
			echo json_encode(array(
				"success"   => 'true'
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
	 * 绑定手机
	 */
	public static function bindMobile(){
		$db    = flight::get("db");
		$tel   = self::P('tel');
		$oid   = self::P('oid');
		$token = self::P('token');
		$yzm   = self::P('yzm');

		if( !$tel || !$oid || !$token || !$yzm ){
			echo self::paramsError;
			exit();
		}

		//1.检测验证码是否正确
		

		//2.数据库绑定用户



	}
}