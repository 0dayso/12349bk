<?php
// ini_set("display_errors","On"); 
ini_set('date.timezone','Asia/Shanghai');
// error_reporting(E_ALL);
require_once "./bInit.php";
require_once "./lib/WxPay.Api.php";
require_once './lib/WxPay.Notify.php';
require_once './log.php';
require_once  "../vender/medoo.min.php";





class PayNotifyCallBack extends WxPayNotify
{
	
	//查询订单
	public function Queryorder($transaction_id)
	{
		$input = new WxPayOrderQuery(); 
		$input->SetTransaction_id($transaction_id);
		$result = WxPayApi::orderQuery($input);
		
		function generateRandChar($type = 1, $database) {
			if($type == 1) {
				$code = date(ymdHi).rand(10000, 99999);

				if($database->get("lk_coup_list", "id", array("commomcode" => $code))) {
		        	return generateRandChar($type);
		        }
		        return $code;
			}else{

				return rand(10000000, 99999999);  
			}
		}

		/*
			数据库定义

		 */

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

		if(array_key_exists("return_code", $result)
			&& array_key_exists("result_code", $result)
			&& $result["return_code"] == "SUCCESS"
			&& $result["result_code"] == "SUCCESS")
		{
			
			$time = time();

			//$database->pdo->beginTransaction();
			//处理信息

			$res = $database->get("lk_recharge","*",array(
				"r_order_sn[=]" => $result['out_trade_no']
			));

			if( $res && $res['status'] == 0 ){

				$user_id = $database->get("lk_user","user_id",array(
					"phone_mob[=]" => $res['phone_mob']
				));
				$res2 = $database->update("lk_recharge",array(
						"status" => 1,
						"pay_id" => 1,
						"ftime"  => time(),
					),array(
						"r_order_sn[=]" => $result['out_trade_no']
					));
				//现场发券,已经绑定过
				$coupon_id = $res['coupon_id'];
				$rule = $database->get('lk_coup_rule', "*", array("id" => $coupon_id));

				$ser_item = $database->query("SELECT ser_id, item_id FROM lk_service_item WHERE FIND_IN_SET(item_id, '{$rule['item_ids']}')");
					$item_sers = array();
				foreach ($ser_item as $key => $value) {
					$item_sers[$value['item_id']] = $value['ser_id'];
				}
				 
				if($rule['canusetype'] == 1) {
					$start = date('Y-m-d', time()).' 00:00:00';
					$end = date('Y-m-d', time()+$rule['canuseday']*86400) . ' 23:59:59';
				}else{
					$start = $rule['begintime'];
					$end = $rule['endtime'];
				}

				$in_data = array();
				$commoncode = $rule['prefix'].generateRandChar(1, $database);
				$codepassword = generateRandChar(2, $database);

				$items = explode(",", $rule['item_ids']);

				foreach ($items as $item_id) {
					$in_data[] = array(
						'coupon_id' => $coupon_id,
						'user_id' => $user_id?$user_id:0,
						'phone_mob' => $res['phone_mob'],
						'begintime' => $start,
						'endtime' => $end,
						'ser_id' => $item_sers[$item_id],
						'item_id' => $item_id,
						'commoncode' => $commoncode,
						'codepassword' => $codepassword,
						'createtime' => date('Y-m-d H:i:s'),
					);
				}
				
				if(count($in_data)) {
					$res1 = $database->insert("lk_coup_list", $in_data);
					$res2 = $database->update("lk_coup_rule", array("num[+]" => count($in_data), "residuenum[+]" => count($in_data)), array("id" => $coupon_id));
				}

				$res = $database->update("lk_recharge",array(
					"status" => 2
				),array(
					"r_order_sn[=]" => $result['out_trade_no']
				));


				//发送短信
				$SMSApi  = 'MW.php';
				$SMSMsg  = "亲，您的100元家庭服务包年套餐已购买成功，关注微信公众号(loukou12349)，绑定购买时的手机号后，点击我的包年券可进行查看。通过公众号或者致电12349可预约服务。";

				$res2 = $database->select("lk_recharge",array("phone_mob"),array("AND" =>array(
					"r_order_sn[=]" => $result['out_trade_no'] ,
					"status[>]" => 0
				)));

				if(!$res2) {
					return false;
				}

				$SMSTel  = $res2['phone_mob'];
				$SMSType = 1;
				$ch = curl_init ();
				$data = array(
					"app"		=> "Sms",
					"act"		=> "sendMsg",
					"phone_mob" => $SMSTel,
					"message"   => $SMSMsg,
					"type"      => 1
				);
				// print_r($ch);
				curl_setopt ( $ch, CURLOPT_URL, $SMSApi );
				curl_setopt ( $ch, CURLOPT_POST, 1 );
				curl_setopt ( $ch, CURLOPT_HEADER, 0 );
				curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
				curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
				$return = curl_exec ( $ch );


				curl_close ( $ch );

				return true;
			}else{
			 	//没有记录
				return false;
			}
			
		}else{
			//回调失败
			
			return false;
		}
	}
	 
	//重写回调处理函数
	public function NotifyProcess($data, &$msg){
		$notfiyOutput = array();
		
		if(!array_key_exists("transaction_id", $data)){
			$msg = "输入参数不正确";
			return false;
		}
		//查询订单，判断订单真实性
		if(!$this->Queryorder($data["transaction_id"])){
			$msg = "订单查询失败";
			return false;
		}
		return true;
	}
}

$notify = new PayNotifyCallBack();
$notify->Handle(false);
