<?php

// 运行action
Flight::route("/@app/@act", function ($app, $act) {
    $class = ucwords("$app");

    // 设置当前操作在全局变量里面
    Flight::set('app', strtolower($app));
    Flight::set('act', $act);

    if(isset(Flight::request()->data['time'])) {
    	$time = Flight::request()->data['time'];
    }else{
    	Flight::json(array('success' => false, 'msg' => '缺少关键参数time'));
    	die;
    }

    if(isset(Flight::request()->data['token'])) {
    	$token = Flight::request()->data['token'];
    }else{
    	Flight::json(array('success' => false, 'msg' => '缺少关键参数token'));
    	die;
    }

    // 验证接口时间// 120s 有效
    $curtime = time();
    if($curtime - $time > 120) {
        Flight::json(array('success' => false, 'msg' => '接口请求超时，请重新请求数据'));
        die;
    }

    // 接口验证
    $secCode = md5(strtolower($app).strtolower($act).$time.Flight::get("SECRECT_CODE"));

    if($secCode == $token) {
    	$class::$act();
    }else{
    	Flight::json(array('success' => false, 'msg' => '验证失败'));
    	die;
    }

});


