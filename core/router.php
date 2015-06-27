<?php

Flight::route('*', array('Base', 'index'));

Flight::route('/', function(){
    Flight::redirect('/Dashboard/admin');
});
Flight::route('/backend/*', function(){
    Flight::redirect('/Dashboard/admin');
});

// 运行action
Flight::route("/@app/@act", function ($app, $act) {
    $class = ucwords("$app");
    $class::$act();
});