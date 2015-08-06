<?php

Flight::route('/', function(){
    Flight::redirect('/main/index');
});

// 运行action
Flight::route("/@app/@act", function ($app, $act) {
    $class = ucwords("$app");

    // 设置当前操作在全局变量里面
    Flight::set('app', strtolower($app));
    Flight::set('act', $act);

    $class::$act();
});