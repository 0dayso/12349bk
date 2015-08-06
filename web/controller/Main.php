<?php
header("Content-Type: text/html; charset=UTF-8");
/**
 * 主页功能展示
 */
class Main {

	public static function index() {

		Flight::cssrender("/public/css/magister.css");
		Flight::jsrender("/public/js/plugins/modernizr.custom.72241.js");
		Flight::jsrender("/public/js/plugins/magister.js");

		Flight::render('main/index');
		
	}

}