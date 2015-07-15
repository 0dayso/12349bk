<?php
class Ad extends Affi{
	/**
	 * 得到banner图
	 * @return [type] [description]
	 */
	public static function getBanner(){
		$db      = flight::get("db");
		$token   = self::P("token");
		$nowTime = time();
		$result = $db->select("lk_ad_list","ad_name,ad_url,img_url",array(
			"AND" => array(
				"start_time[<]" => $nowTime,
				"end_time[>]"   => $nowTime,
				"is_use[=]"     => 1,
				"is_del[=]"     => 0
			),
			"ORDER" => "sort_order DESC",
		));

		if( $result ){
			echo json_encode(array(
				"success"   => 'true',
				"data"      => $result
			));
			exit();
		}else{
			echo json_encode(array(
				"success"   => 'false'
			));
			exit();
		}

	}
}