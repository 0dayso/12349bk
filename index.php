<?php
require 'vender/flight/Flight.php';
require 'vender/medoo/medoo.min.php';

// 定义默认配置变量
$conf = include('conf/conf.php');
foreach ($conf as $key => $value) {
	if(!Flight::has($key)) {
		Flight::set(strtoupper($key), $value);
	}
}

// 修改默认配置
// 覆盖base url 请求
Flight::set('flight.base_url ', Flight::get('SITE_URL'));
// 允许 Flight 处理所有内部错误。 (默认: true)
Flight::set('flight.handle_errors ', true);
// 将错误日志记录到 web server 的错误日志文件。 (默认: false)
Flight::set('flight.log_errors', true);
// 包含视图模板文件的目录 (默认: ./views)
Flight::set('flight.views.path', './view');

// 注册数据库函数方法, 使用medoo
Flight::register('db', 'medoo', array(
	'database_type' => Flight::get('DB_TYPE'),
	'database_name' => Flight::get('DB_NAME'),
	'server'        => Flight::get('DB_HOST'),
	'username'      => Flight::get('DB_USER'),
	'password'      => Flight::get('DB_PWD'),
	'charset'       => Flight::get('DB_ENCODING'),
	'port' 			=> Flight::get('DB_PORT'),
));

Flight::route('/|/backend', function(){
    



});


Flight::before('start', function(&$params, &$output){
    // 判断是否登录状态
    
	if($_COOKIE['is_login'])

});

Flight::start();
?>
