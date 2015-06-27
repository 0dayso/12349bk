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

/**
 *  rdump的别名
 *
 *  @author Garbin
 *  @param  any
 *  @return void
 */
function dump($arr) {
    $args = func_get_args();
    call_user_func_array('rdump', $args);
}

/**
 *  格式化显示出变量
 *
 *  @author Garbin
 *  @param  any
 *  @return void
 */
function rdump($arr) {
    echo '<pre>';
    array_walk(func_get_args(), create_function('&$item, $key', 'print_r($item);'));
    echo '</pre>';
    //exit();
}