<?php

//得到数据
$app   = isset($_POST['app']) ? $_POST['app'] : "";
$act   = isset($_POST['act']) ? $_POST['act'] : "";
$data  = $_POST;


//验证码校验
if( $_POST['needYZM'] == 1 ){
	if( $_POST['phone_mob'] != $_SESSION['phone_mob'] || $_POST['yzm'] != $_SESSION['YZMCODE'] ){
		echo json_encode(array(
			"success" => false
		));
		die();
	}
}





if( $_POST['message'] == 1 && $_POST['phone_mob']){
	//发送短信
	$code=rand(10000,99999) ; 
	$_SESSION["YZMCODE"] = $code;
	$_SESSION["phone_mob"]=$_POST['phone_mob'];

}

$data['message'] = "千万不能告诉别人的验证码【{$_SESSION["YZMCODE"]}】，若非本人操作请勿做操作，请联系客服，客服电话：12349.";
$time  = time();
$token = md5( strtolower($app).strtolower($act).$time.'g8c,D3!M&s.tt@#$&^');
$data['time']  = $time ;
$data['token'] = $token;
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