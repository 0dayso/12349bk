<?php

// 判断当前请求类型
$request = Flight::request();

if($request->method == 'GET') {
	define('IS_GET', true);
	define('IS_POST', false);
}else if($request->method == 'POST') {
	define('IS_POST', true);
	define('IS_GET', false);
}

if($request->ajax) {
	define('IS_AJAX', true);
}else{
	define('IS_AJAX', true);
}


// 注册数据库函数方法, 使用medoo
$db =  new medoo(array(
	// required
	'database_type' => Flight::get('DB_TYPE'),
	'database_name' => Flight::get('DB_NAME'),
	'server'        => Flight::get('DB_HOST'),
	'username'      => Flight::get('DB_USER'),
	'password'      => Flight::get('DB_PWD'),
	'charset'       => Flight::get('DB_ENCODING'),
	'port' 			=> Flight::get('DB_PORT'),
	'option' => array(
		PDO::ATTR_CASE => PDO::CASE_NATURAL
	)
)); 

Flight::set('db', $db);
