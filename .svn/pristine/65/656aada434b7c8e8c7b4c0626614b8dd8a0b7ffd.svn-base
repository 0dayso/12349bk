<?php

	
// file_put_contents("d.log",print_r($_POST,1));
ini_set('date.timezone','Asia/Shanghai');
require_once "./lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";
require_once 'log.php';


//初始化日志
$logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);
 
//支付类型 
// file_put_contents("m2.log", print_r($_POST,1));
$payType = isset( $_POST['payType'] ) ? $_POST['payType'] : 1;
$oid    = $_POST['oid'];
$mey    = $_POST['mey'];
$bdy    = $_POST['bdy'];
$openid = $_POST['openid'];
$rid    = $_POST['rid'];

//①、获取用户openid
$tools = new JsApiPay();

// file_put_contents("m1.log", print_r($_POST,1));

//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody("$bdy");

if( $payType == 1  ){
	$input->SetOut_trade_no("$oid");
	$input->SetAttach("$oid");
}else if( $payType == 2 ){
	$input->SetOut_trade_no("$rid");
	$input->SetAttach("$rid");
}

// file_put_contents("m3.log", print_r($_POST,1));

//$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));

$mey = $mey * 100;
//   
// file_put_contents("g.log",$mey);
$input->SetTotal_fee("$mey");
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag("test");

//$input->SetNotify_url("http://wx.12349.loukou.com/pay/100notify.php");

if( $payType == 1 ){
	//1 : 支付平时的业务
	$input->SetNotify_url("http://wx.12349.loukou.com/pay/notify.php");
	//file_put_contents("gusuqi.log", 'http://wx.12349.loukou.com/pay/notify.php');
}else if( $payType == 2 ){
	//2 : 100元套餐
	$input->SetNotify_url("http://wx.12349.loukou.com/pay/100notify.php");
	//file_put_contents("gusuqi.log", 'http://wx.12349.loukou.com/pay/100notify.php');
}


// file_put_contents("m4.log", print_r($_POST,1));

$input->SetTrade_type("JSAPI");
$input->SetOpenid($openid);

// file_put_contents("m5.log", print_r($_POST,1));

$order = WxPayApi::unifiedOrder($input);

// file_put_contents("m6.log", print_r($order,1));
$jsApiParameters = JsApiPay::GetJsApiParameters($order);
// file_put_contents("m7.log", print_r($jsApiParameters,1));



echo $jsApiParameters;
exit();


?>
