<?php

require_once VENDER_PATH."/nusoap/nusoap.php";

class Sms {

	public static function sendMsg() {

		$phone_mob = P('phone_mob');
		$message = P('message');
		$type = P('type');

		if(!$phone_mob || !$message || !$type) {
			Flight::json(array("success" => false, "msg" => "手机号和短信内容不能为空"));
			die;
		}

		if(!self::checkMobile($phone_mob)) {
			Flight::json(array("success" => false, "msg" => "非法手机号码"));
			die;
		}

		$config = include(CONF_PATH . '/sms.php');

		if($type == 1) {
			$conf = $config['YX'];
		}else{
			$conf = $config['YXH'];
		}
		
		$soap = new nusoap_client($conf['url'], true, "", "", "", "");
		$soap->setUseCurl('0');
		$soap->soap_defencoding 	= $conf['msg_encoding'];
		$soap->decode_utf8 		= false;
		$soap->xml_encoding 		= $conf['msg_encoding'];

		$params=array(
			'userCode' => $conf['account'],
			'userPass' => $conf['password'],
			'DesNo'    => $phone_mob,
			'Msg'      => $message . $conf['sign_name'],
			'Channel'  => $conf['Channel1'],
		);
		
		$ret = $soap->call('SendMsg', array('parameters' => $params));
		$ret = $ret['SendMsgResult'];
		
		$return = ($ret > 0) ? 0 : $ret;

		$codeMsg = self::YXErrorCode($return);
		
		//记入日志
		$content = "手机号：" . $phone_mob . " " . $message . "( 发送结果：) " . $ret . " " . $codeMsg ;
		writefile($content);

		if($ret >= 0) {
			Flight::json(array("success" => true, "msg" => $codeMsg));
		}else{
			Flight::json(array("success" => false, "msg" => $codeMsg));
		}	

	}

	/**
	 * 获取余额
	 *
	 * @author zhaozl
	 * @since  2015-07-19
	 */
	public static function CLBalance() {
		$proxyhost 			= '';
		$proxyport 			= '';
		$proxyusername 		= '';
		$proxypassword 		= '';
		$msgEncoding 		= "UTF-8";

		$config = include(CONF_PATH . '/sms.php');

		$soap = new nusoap_client($config['YX']['url'], true, "", "", "", "");
		$soap->setUseCurl('0');
		$soap->soap_defencoding 	= $config['YX']['msg_encoding'];
		$soap->decode_utf8 		= false;
		$soap->xml_encoding 		= $config['YX']['msg_encoding'];

		$params=array(
			'userCode' => $config['YX']['account'],
			'userPass' => $config['YX']['password'],
		);

		$ret = $soap->call('GetBalance', array('parameters' => $params));
		$ret = $ret['GetBalanceResult'];

		echo $ret;
	}


	/**
	 * 返回错误信息
	 *
	 * @param  [type]     $code [description]
	 * @author zhaozl
	 * @since  2015-07-19
	 */
	private static function YXErrorCode($code)
	{
		$msg = array(
			'0'			=> '提交成功',
			'-1' 		=> '应用程序异常',
			'-3' 		=> '用户名或密码错误',
			'-4'	 	=> '短信内容和备案的模板不一样',
			'-5' 		=> '签名不正确（格式为：短信内容……【签名内容】）签名一定要放在短信最后',
			'-6' 		=> '包含敏感字符',
			'-7' 		=> '余额不足',
			'-8' 		=> '没有可用通道， 或不在时间范围内',
			'-9' 		=> '没有可用通道， 或不在时间范围内',
			'-10' 		=> '号码数量大于允许上限（不设置上限时，不可超过 1000）',
			'-11' 		=> '号码数量大于允许上限（不设置上限时，不可超过 1000）',
			'-12' 		=> '模板不匹配',
			'-13' 		=> 'Invalid Ip ip 绑定用户，未绑定该 ip',
			'-14' 		=> '用户黑名单',
			'-15' 		=> '系统黑名单',
			'-16' 		=> '号码格式错误',
			'-17' 		=> '无效号码（格式正常，可不是正确的电话号码,如 12345456765)',
			'-18' 		=> '没有设置用户的固定下发扩展号， 不能自定义扩展',
			'-19' 		=> '强制模板通道，不能使用个性化接口',
			'-20' 		=> '包含非法字符',
		);
	
		return $msg[$code];
	}

	/**
     * 验证手机是否合法
     */
    private static function checkMobile($mobile)
    {
        $return = false;
        if (preg_match("/^1[34578]\d{9}$/", $mobile))
        {
            $return = true;
        }
        return $return;
    }

}