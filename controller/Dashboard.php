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

		Flight::jsrender("/public/js/dashboard/admin.js");
		Flight::render("dashboard/admin");

	}

	/**
	 * 获取管理员账户
	 *
	 * @return [type]     [description]
	 * @author zhaozl
	 * @since  2015-07-02
	 */
	public static function getAdminUsers() {
		$req = Flight::request()->query;

		$search = isset($req->sSearch)?$req->sSearch:'';
		$length = isset($req->iDisplayLength)?$req->iDisplayLength:'';
		$start = isset($req->iDisplayStart)?$req->iDisplayStart:'';

		$db = Flight::get('db');
		$condtion = array(
			'ORDER' => 'admin_name', 
			'LIMIT' => "{$start},{$length}");

		if($search) {
			$condtion['admin_name[~]'] = "{$search}";
		}

		$res = $db->select('lk_admin', "*", $condtion);

		$result = array();
		if($res){
			foreach ($res as $key => $value) {
				$group_name = $db->get('lk_group', 'group_name', array('group_id' => $value['group_id']));

				$result[] = array(
					'admin_name' => $value['admin_name'],
					'is_use' => $value['is_use'],
					'group_name' => $group_name?$group_name:'',
					'phone_mob' => $value['phone_mob'],
					'admin_id' => $value['admin_id'],
				);
			}
		}

		$iFilteredTotal = $db->count('lk_admin', $condtion);
		$iTotalRecords = $db->count('lk_admin');

		Flight::json(array(
			'aaData' => $result, 
			"sEcho" => intval($req->sEcho),
			"iTotalRecords" => $iTotalRecords,
			"iTotalDisplayRecords" => $iFilteredTotal,
		));

	}

	/**
	 * 修改当前用户密码
	 *
	 * @author zhaozl
	 * @since  2015-07-02
	 */
	public static function changepwd() {

	}

	/**
	 * 管理员管理
	 *
	 * @author zhaozl
	 * @since  2015-07-02
	 */
	public static function addadmin() {

		Flight::jsrender("/public/js/dashboard/manageadmin.js");

		$db = Flight::get('db');
		$groups = $db->select("lk_group", array('group_id','group_name'), array('is_use' => 1));

		$gArray = array();
		foreach ($groups as $key => $value) {
			$gArray[$value['group_id']] = $value['group_name'];
		}

		Flight::render("dashboard/manageadmin", array('type' => 'add', 'groups' => $gArray));

	}

	/**
	 * 编辑管理员
	 *
	 * @author zhaozl
	 * @since  2015-07-02
	 */
	public static function editadmin() {

		Flight::jsrender("/public/js/dashboard/manageadmin.js");

		$db = Flight::get('db');
		$groups = $db->select("lk_group", array('group_id','group_name'), array('is_use' => 1));

		$gArray = array();
		foreach ($groups as $key => $value) {
			$gArray[$value['group_id']] = $value['group_name'];
		}

		$group_id = $db->get('lk_admin', 'group_id', array('admin_id' => Flight::request()->query->admin_id));

		Flight::render("dashboard/manageadmin", array('type' => 'edit', 'groups' => $gArray, 'group_id' => $group_id));

	}

	/**
	 * 删除管理员
	 *
	 * @author zhaozl
	 * @since  2015-07-02
	 */
	public static function deladmin() {

		if(IS_POST) {
			$admin_id = Flight::request()->data->admin_id;
			$db = Flight::get('db');
			$delRes = $db->delete("lk_admin",  array('admin_id' => $admin_id));

			if($delRes) {
				Flight::json(array('success' => true, 'msg' => '删除成功'));
			}else{
				Flight::json(array('success' => false, 'msg' => '删除失败'));
			}

		}else{
			Error::handle('302', '非法请求');
		}

	}

	/**
	 * 管理用户组
	 *
	 * @author zhaozl
	 * @since  2015-07-02
	 */
	public static function managegroup() {

		Flight::jsrender("/public/js/dashboard/managegroup.js");

		$pers = include(CONF_PATH . '/menu.php');

		Flight::render("dashboard/managegroup", array('type' => 'add', 'pers' => $pers));


	}

}