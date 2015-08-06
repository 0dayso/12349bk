<?php

class Shop {

	/**
	 * 服务人员信息
	 *
	 * @return [type]     [description]
	 * @author zhaozl
	 * @since  2015-07-28
	 */
	public static function staffinfo() {

		$code = Flight::request()->query->code;
		if($staff = Flight::get('db')->get("lk_shopstaff", "*", array("staff_code" => $code))) {

			$shop = Flight::get('db')->get("lk_shop", "*", array("shop_id" => $staff['shop_id']));

			Flight::render('shop/staffinfo', array('shop' => $shop, 'staff' => $staff));

		}else{
			Handle::result("找不到服务人员信息");
		}
	}
}