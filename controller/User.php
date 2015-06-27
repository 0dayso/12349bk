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


}