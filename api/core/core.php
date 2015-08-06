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

/**
 * 得到GET的值
 * @param [type] $value [description]
 */
function G($value){
	if(isset(Flight::request()->query[$value]))
		return Flight::request()->query[$value];
	else
		return '';
}

/**
 * 得到POST的值
 * @param [type] $value [description]
 */
function P($value){
	if(Flight::request()->data[$value])
		return Flight::request()->data[$value];
	else
		return '';
}

/**
 * 返回调试数据
 */

function D($data){
	print_r("<pre>");
	print_r($data);
	print_r("</pre>");
}

/**
 *   创建目录
 *   @author hjf
 *   @param  string $dir
 *   @return boolean
 */
function mkdirs($dir, $mode = 0777) {
	if (is_dir($dir) || @mkdir($dir, $mode))
		return TRUE;
	if (!mkdirs(dirname($dir), $mode))
		return FALSE;
	return @mkdir($dir, $mode);
}

/**
 * 写LOG
 *
 * @param  [type]     $content  [description]
 * @param  string     $dir_name [description]
 * @return [type]               [description]
 * @author zhaozl
 * @since  2015-07-19
 */
function writefile($content, $dir_name = 'sms') {
	$dir = LOG_PATH. '/' . $dir_name . "/" . date("Ymd"); //提交需更新
	$logfile = $dir_name . ".txt";
	$desfile = $dir . "/" . $logfile;
	//判断日志文件夹是否存在，不存在则创建
	if (!file_exists($dir)) {
		mkdirs($dir);
	}

	$fp = fopen($desfile, 'ab'); //以二进制追加方式打开文件
	$str = "[".  date("Y-m-d H:i:s")."] ".$content . "\r\n";
	fwrite($fp, $str, strlen($str));
	fclose($fp);
}