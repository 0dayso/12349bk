<?php

Flight::route('/', function(){
    echo "asdasd";
});

Flight::route('/backend/*', function(){
    echo "asdasd";
});

// 设置路由
$menus = include(CONF_PATH.'/menu.php');
foreach ($menus as $app => $value) {

    foreach ($value['subs'] as $act => $value) {
        Flight::route("/$app/$act", array("{$app}", "{$act}"));
    }
}

// 路由过滤，保持登录状态
Flight::before('start', function(&$params, &$output){

    // 判断是否登录状态
    if (session_id() == '') {
        session_start();
    }

	if(!isset($_SESSION['is_login'])) {
		Flight::render("user/login", array(), false);
        return false;
    }

});