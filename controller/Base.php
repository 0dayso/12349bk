<?php
/**
 * 基础类，过滤所有请求
 *
 * 保证登录状态下
 * 
 */
class Base{

	private static $no_login_array = array(
		'User.login', 'User.auth_login', 'Error.handle'
	);

	public static function index() {

		$req = explode('/', Flight::request()->url);
		$app = isset($req[1])?$req[1]:'';
		$act = isset($req[2])?$req[2]:'';

		if(!in_array("{$app}.{$act}", self::$no_login_array)) {

			// Login With Cookie
			User::loginWithCookie();

			if(!Session::get('is_login')) {
				User::login();
		        return false;
		    }else{

		    	$group_id = Session::get('group_id');

		    	$db = Flight::get('db');
				$res = $db->get("lk_group", array("*"), array("group_id" => $group_id));

				$pers = $res['permissions'];
				$perArray = unserialize($pers);

				if(isset($perArray[$app])) {

					$app::$act();

				}else{
					// 没权限
					$hasApp = $perArray['defaultapp'];
					$hasAct = $perArray['defaultact'];

					Error::handle('1', $hasApp, $hasAct);

				}
		    }
			
		}

		return true;
	}

}