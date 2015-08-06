<?php
	//error_reporting(E_ALL);
	//ini_set("display_errors","On"); 
	header( 'Content-Type:text/html;charset=utf-8 ');
	require_once dirname(__FILE__)."/vender/class.session.php";
	require_once  dirname(__FILE__)."/vender/medoo.min.php";
	
	//数据库和session方法
	$database = new medoo(array(
	    // 必填
	    'database_type' => 'mysql',
	    'database_name' => 'loukou12349',
	    'server'        => '192.168.0.153',
	    'username'      => 'loukou12349',
	    'password'      => 'loukou12349',
	    'port'          => 3306, 
	    'charset'       => 'utf8',
	    'option'        => array()
	));
	Session::init();
	// Session::destroy();
	// Session::init(); 
	$appid  = 'wxc015c45312ad173d';
	$secret = 'e1c27ea61912a52f6552d41979204ae0';
	$isTest = false;

	if(!Session::get("openid") || !Session::get("nickname") ){
	
		$type   = 'snsapi_userinfo';
		$code   = isset($_GET['code']) ? trim($_GET['code']) : '';
		$reurl  = urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);


		/***1.获取CODE***/
		if(!$code){
		    $url    = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appid}&redirect_uri={$reurl}&response_type=code&scope={$type}&state=123#wechat_redirect";
		    header("Location:{$url}");
		    exit();
		}

		/***2.得到openID***/
		$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$appid}&secret={$secret}&code={$code}&grant_type=authorization_code";
 
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$access_token = curl_exec( $ch );
		$res          = json_decode($access_token,true);
		$openid       = $res['openid'];
		$act          = $res['access_token'];
		/***3.得到个人资料***/
		$getOId = "https://api.weixin.qq.com/sns/userinfo?access_token={$act}&openid={$openid}";
		curl_setopt($ch, CURLOPT_URL, $getOId );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$userinfo = curl_exec( $ch );
		$res      = json_decode($userinfo,true);
		$nickname     = $res['nickname'];
		Session::set("openid",$openid);
		Session::set("nickname",$nickname);
	}

 
	//插入数据库用户信息
	$isOldUser = $database->select("lk_user",array("user_id"),array(
		"open_id[=]" => Session::get("openid") 
	));
	
 	if( !$isOldUser ){
		//如果是新用户,数据库插入一条记录
		$last_user_id = $database->insert("lk_user", array(
		    "open_id"       => Session::get("openid"),
		    "reg_date"      => time(),
		    "user_name"     => Session::get("openid")
		));
		Session::set("userid",$last_user_id);
		if( !$last_user_id ){
			//插入失败重新刷新当前页面
			header("Location:home.php");
		}

	}else{
		Session::set("userid",$isOldUser[0]['user_id']);
		//查看是否绑定手机号
		$isBindMobile = $database->select("lk_user",array("phone_mob"),array(
			"AND" => array(
				"open_id[=]"    => Session::get("openid"),
				"phone_mob[!]"  => ""
			)
		));

		if( $isBindMobile ){
			//如果绑定了,把手机号码记录到Session中去
			Session::set("phone_mob",$isBindMobile[0]['phone_mob']);
		}
	}
 	
?>