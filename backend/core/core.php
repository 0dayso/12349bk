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

// 打印函数
function p($target) {
	echo "<pre>";
	var_dump($target);
	echo "</pre>";
}


// 检测文件夹是否存在
function verifyPath($strPath, $createPath = false) {
	$folder_path = strstr ( $strPath, '.' ) ? dirname ( $strPath ) : $strPath;
	
	if (file_exists ( $strPath ) || @is_dir ( $strPath )) {
		return true;
	} else {
		if ($createPath) {
			mk_dir ( $strPath, 0777 );
		} else
			return false;
	}
	return false;
}

// 创建文件夹
function mk_dir( $strPath, $rights = 0777) {
	$folder_path = array($strPath);
	$oldumask    = umask(0);
	while(!@is_dir(dirname(end($folder_path)))
	  && dirname(end($folder_path)) != '/'
	  && dirname(end($folder_path)) != '.'
	  && dirname(end($folder_path)) != '')
	array_push($folder_path, dirname(end($folder_path)));

	while($parent_folder_path = array_pop($folder_path))
		if(!@is_dir($parent_folder_path))
			if(!@mkdir($parent_folder_path, $rights))
				umask($oldumask);
}