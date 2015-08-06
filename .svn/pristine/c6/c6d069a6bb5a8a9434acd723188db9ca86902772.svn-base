<?php

//得到数据
$app   = $_POST['app'];
$act   = $_POST['act'];
$data  = $_POST;

// if( $_POST['message'] == 1 && $_POST['tel']){
// 	//发送短信
// 	$code=rand(10000,99999) ; 
// 	$_SESSION["YZMCODE"] = $code;
// 	$_SESSION["tel"]=$_POST['tel'];
// }

// $_POST['message'] = $_SESSION["YZMCODE"];

$time  = time();
$token = md5( strtolower($app).strtolower($act).$time.'g8c,D3!M&s.tt@#$&^');
$data['time']  = $time ;
$data['token'] = $token;

// file_put_contents("g.log",print_r($data,1),FILE_APPEND);

$baseUrl = "http://api.12349.loukou.com/";
$url     = $baseUrl. $app . '/' . $act;
$ch      = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// post数据		
curl_setopt($ch, CURLOPT_POST, 1);
// post的变量
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$output = curl_exec($ch);

echo $output;
curl_close($ch);



?>