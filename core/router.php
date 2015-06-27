<?php

Flight::route('*', array('Base', 'index'));

Flight::route('/', array('Dashboard', 'admin'));
Flight::route('/backend/*', array('Dashboard', 'admin'));

// 运行action
Flight::route("/@app/@act", function ($app, $act) {
    $class = ucwords("$app");
    $class::$act();
});