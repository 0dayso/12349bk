<?php

class User {


	/**
	 * 登录界面
	 *
	 * @return [type]     [description]
	 * @author zhaozl
	 * @since  2015-06-27
	 */
	public static function login() {

		Flight::render("user/login", array(), false);

	}


	/**
	 * 验证登录
	 *
	 * @return json
	 * @author zhaozl
	 * @since  2015-06-29
	 */
	public static function auth_login() {

		if(IS_POST) {

			$data = Flight::request()->data;
			$username = $data->username;
			$password = $data->password;
			$remember_me = $data->remember_me;

			$db = Flight::get('db');
			$res = $db->get("lk_admin", "*", array("admin_name" => trim($username)));

			if($res) {

				if(md5($password) == $res['admin_password']) {
					// 执行登录操作

					// login process, write the user data into session
		            Session::init();
		            Session::set('is_login', true);
		            Session::set('admin_id', $res['admin_id']);
		            Session::set('admin_name', $res['admin_name']);
		            Session::set('phone_mob', $res['phone_mob']);
		            Session::set('group_id', $res['group_id']);

		            if($remember_me == "true") {
						// set cookie
						// COOKIE RUNTIME(7 days)
						$runTime = 7*24*60*60;

		                setcookie('remmember_user', $res['admin_id'], time() + $runTime, "/");
					}

					Flight::json(array('success' => true, 'msg' => '登录成功'));

				}else{
					Flight::json(array('success' => false, 'msg' => '用户密码不正确'));
				}

			}else{
				Flight::json(array('success' => false, 'msg' => '找不到用户'));
			}


		}else{

			Flight::json(array('success' => false, 'msg' => '非法操作'));

		}

	}

	/**
	 * login with cookie
	 *
	 * @author zhaozl
	 * @since  2014-06-11T14:35:54+0800
	 */
	public static function loginWithCookie() {
		$cookie = isset($_COOKIE['remmember_user']) ? $_COOKIE['remmember_user'] : '';

		if(!$cookie) {
			return false;
		}

		$db = Flight::get('db');
		$user = $db->get("lk_admin", array("*"), array("admin_id" => $cookie));
		if($user) {

			// login process, write user data to session
			Session::init();
            Session::set('is_login', true);
            Session::set('admin_id', $res['admin_id']);
            Session::set('admin_name', $res['admin_name']);
            Session::set('phone_mob', $res['phone_mob']);
            Session::set('group_id', $res['group_id']);

			// set cookie
			// COOKIE RUNTIME(7 days)
			$runTime = 7*24*60*60;
            setcookie('remmember_user', $res['admin_id'], time() + $runTime, "/");
			return true;

		}else{
			return false;
		}

	}


}