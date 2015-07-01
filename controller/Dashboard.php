<?php

class Dashboard{

	/**
	 * 管理界面
	 *
	 * @return [type]     [description]
	 * @author zhaozl
	 * @since  2015-07-01
	 */
	public static function admin() {

		Flight::render("dashboard/admin", array());


	}


}