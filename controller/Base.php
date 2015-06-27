<?php
/**
 * 基础类，过滤所有请求
 *
 * 保证登录状态下
 * 
 */
class Base{

	public static function index() {

		if(!isset($_SESSION['is_login'])) {
			User::login();
	        return false;
	    }
		

		return true;
	}

}