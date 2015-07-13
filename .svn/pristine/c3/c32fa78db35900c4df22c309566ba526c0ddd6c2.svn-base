<?php
// header('Content-type: application/json');
class My extends Affi{


	/**
	 * 获得我的优惠券
	 * @author glivia
	 * @method post
	 * @param  $userid
	 * @param  $token
	 * @return json
	 */
	public function getCoupList(){

		$database = Flight::get('db');
		$uid      = self::P('userid');
		//$token    = Flight::request()->data['token'];

		// if( self::createToken() != $token){
		// 	echo "签名不正确";
		// 	exit();
		// }

		if( !$uid ){
			echo self::$paramsError;
			exit();
		}

		$res      = $database->select("lk_coup_list",array("begintime","endtime","ser_id","item_id","commoncode","money","minprice","codepassword"),array(
					"AND" => array(
						"user_id"   => $uid,
					    "ischecked" => 0,
					    "isuse"     => 1
					)));

		if( $res ){
			self::returnJson(array(
				"success" => "true",
				"data"    => $res
			));
		}else{
			self::returnJson(array(
				"success" => "false"
			));
		}

	}

	/**
	 * 是否有该分类下的免费券
	 * @author glivia
	 * @method post
	 * @param  $userid 
	 * @param  $itemid
	 * @param  $token
	 * @return 
	 */
	public function hasCoup(){

		$database = Flight::get('db');
		$uid      = self::P('userid');
		$iid      = self::P('itemid');
		$token    = self::P('token');
		
	}


	/**
	 * 提交用户反馈
	 * @author glivia
	 * @method post
	 * @param  $content 
	 * @param  $userid
	 * @param  $token
	 * @return 
	 */
	public function submitComment(){

		$database =  Flight::get('db');
		$cnt      =  self::P('content');
		$uid      =  self::P('userid');
		$token    =  self::P('token');
		
		//检查签名
		

		//缺少参数,返回
		if( !$cnt || !$uid ){
			echo self::$paramsError;
			exit();
		}

		$result = $database->insert('lk_feedback', array(
			'cmt_content'    =>  $cnt,
		    'cmt_user'       =>  $uid,
		    'add_time'       =>  time(),
		    'is_view'        =>  0
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
	 * 获取用户信息
	 * @param $userid
	 * @param $token
	 * @return [type] [description]
	 */
	public static function getUserInfo(){
		$database = Flight::get('db');
		$uid      = self::P("userid");
		$token    = self::P("token");

		if( !$uid || !$token ){
			echo self::paramsError;
			exit();
		}

		$result = $database->select("lk_user",array("user_name","phone_mob","open_id"),array(
			"user_id" => $uid 
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
}
