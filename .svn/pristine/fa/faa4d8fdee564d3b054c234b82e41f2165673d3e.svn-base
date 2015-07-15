<?php
	
	class Affi{

		public static $paramsError = "参数不完整!";
		public static $tokenError  = "签名不正确!";
		/**
		 * 验签比对
		 * @param  [type] $time  [description]
		 * @param  [type] $token [description]
		 * @return [type]        [description]
		 */
		public static function createToken($time,$token){
			//接口加密规则
			
			if( !(time() + 10 < $time) && !(time() - 10 < $time) ){
				return false;
			}

			$TokenSalt = "g8c,D3!M&s.tt$time";
		

			if( sha1( md5( $TokenSalt ) ) == $token ){
				return true;
			}else{
				return false;
			}

		}

		/**
		 * 得到GET的值
		 * @param [type] $value [description]
		 */
		public static function G($value){
			return Flight::request()->query[$value];
		}

		/**
		 * 得到POST的值
		 * @param [type] $value [description]
		 */
		public static function P($value){
			return Flight::request()->data[$value];
		}

		/**
		 * 返回json数据
		 * @param  [type] $array [description]
		 * @return [type]        [description]
		 */
		public static function returnJson($array){
			echo json_encode($array);
		}

		/**
		 * 返回调试数据
		 */

		public static function D($data){
			print_r("<pre>");
			print_r($data);
			print_r("</pre>");
		}



	}

?>