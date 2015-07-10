<?php

class Shop {

	/**
	 * 商家列表
	 *
	 * @return [type]     [description]
	 * @author zhaozl
	 * @since  2015-07-08
	 */
	public static function shoplist() {

		Flight::jsrender('/public/js/shop/shoplist.js');
		Flight::render("shop/shoplist");

	}

	/**
	 * 获取商户数据
	 *
	 * @return [type]     [description]
	 * @author zhaozl
	 * @since  2015-07-08
	 */
	public static function getShops() {

		$req = Flight::request()->query;

		$search = isset($req->sSearch)?$req->sSearch:'';
		$sSearch_1 = isset($req->sSearch_1)?$req->sSearch_1:'';

		$type = isset($req->type)?$req->type:'';
		$length = isset($req->iDisplayLength)?$req->iDisplayLength:'';
		$start = isset($req->iDisplayStart)?$req->iDisplayStart:'';
		$sort_index = isset($req->iSortCol_0)?$req->iSortCol_0:'0';

		$sort_item = $req['mDataProp_'.$sort_index];
		$sort_sort = strtoupper($req['sSortDir_0']);

		$db = Flight::get('db');

		$sql = "SELECT * FROM lk_shop WHERE 1 = 1";

		// L类型查询
		if($sSearch_1 > 0) {
			$sql .= " AND FIND_IN_SET({$sSearch_1}, `item_ids`)";
		}

		// 查询店铺名和负责人姓名
		if($search) {
			$sql .= " AND (shop_name LIKE '%{$search}%' OR officer LIKE '%{$search}%')";
		}

		switch ($type) {
			case '1':
				$sql .= ' AND is_del = 0 AND status = 0';
				break;
			case '2':
				// 被删除的商家
				$sql .= ' AND is_del = 1';
				break;
			default:
				// 全部不包括被删除的
				$sql .= ' AND is_del = 0';
				break;
		}

		$sql .= " ORDER BY {$sort_item} {$sort_sort} LIMIT {$start},{$length}";

		$res = $db->query($sql)->fetchAll();

		$serItems = self::getServiceItems(2);
		$result = array();
		if($res) {
			foreach ($res as $key => $value) {
				$items = explode(',', $value['item_ids']);

				$item_names = '';
				foreach ($items as $item_id) {
					$item_names .= $serItems[$item_id] . ',';
				}

				$result[] = array(
					'index' => $key+1,
					'shop_name' => $value['shop_name'],
					'item_types' => rtrim($item_names, ','),
					'officer' => $value['officer'],
					'phone' => $value['phone'],
					'address_detail' => $value['address'],
					'shop_id' => $value['shop_id'],
				);

			}
		}

		$iFilteredTotal = count($res);
		$iTotalRecords = $db->count('lk_shop');

		Flight::json(array(
			'aaData' => $result, 
			"sEcho" => intval($req->sEcho),
			"iTotalRecords" => $iTotalRecords,
			"iTotalDisplayRecords" => $iFilteredTotal,
		));

	}


	/**
	 * 添加商家
	 *
	 * @author zhaozl
	 * @since  2015-07-08
	 */
	public static function addShop() {

		if(IS_POST) {
			$data = Flight::request()->data;

			$shop_name = isset($data["shop_name"])?trim($data["shop_name"]):'';

			if(!$shop_name) {
				Handle::result("缺少关键数据", "商户名未获取到" );
			}

			$item_ids = isset($data["item_ids"])?trim($data["item_ids"]):'';
			if(!$item_ids) {
				Handle::result("缺少关键数据", "至少选择一个商户类型" );
			}

			$region_id = isset($data["region_id"])?trim($data["region_id"]):'';
			if(!$region_id) {
				Handle::result("缺少关键数据", "请选择商户所在区域" );
			}

			$address = isset($data["address"])?trim($data["address"]):'';
			if(!$address) {
				Handle::result("缺少关键数据", "请填写商家地址" );
			}

			// $data["business_license"]	=> "005.jpg"
			// $data["legal_person"]		=> "51d24328c2634.jpg"
			// $data["logo"]				=> "51d24328c2634.jpg"
			
			$officer = isset($data["officer"])?trim($data["officer"]):'';
			if(!$officer) {
				Handle::result("缺少关键数据", "请填写商家负责人" );
			}

			$bank = isset($data["bank"])?trim($data["bank"]):'';
			if(!$bank) {
				Handle::result("缺少关键数据", "请填写商家开户银行" );
			}

			$phone = isset($data["phone"])?trim($data["phone"]):'';
			if(!$phone) {
				Handle::result("缺少关键数据", "请填写商家联系手机号码" );
			}

			$bank_account_name = isset($data["bank_account_name"])?trim($data["bank_account_name"]):'';
			if(!$bank_account_name) {
				Handle::result("缺少关键数据", "请填写商家银行开户账户名" );
			}

			$bank_accunt = isset($data["bank_accunt"])?trim($data["bank_accunt"]):'';
			if(!$bank_accunt) {
				Handle::result("缺少关键数据", "请填写商家银行收款账号(卡号)" );
			}

			$is_use = isset($data["is_use"])?$data["is_use"]:'1';
			$is_recommend = isset($data["is_recommend"])?$data["is_recommend"]:'0';
			$check_type = isset($data["check_type"])?$data["check_type"]:'1';

			$files = Flight::request()->files;

			if(!isset($files['business_license'])) {
				Handle::result("缺少关键数据", "请填写上传商家的营业执照照片" );
			}

			if(!isset($files['legal_person'])) {
				Handle::result("缺少关键数据", "请填写上传商家法人照片" );
			}

			foreach ($files as $name => $file) {
				// 上传文件并生成URL
				$fileExt = explode('.', $file['name']);
				$fileExt = end($fileExt);

				if(!in_array($fileExt, array('jpg', 'jpeg', 'png', 'gif', 'bmp'))) {
				    Handle::result("失败", "文件格式不对，仅支持'jpg', 'jpeg', 'png', 'gif', 'bmp'" );
				}

				$curDate = date('Ymd');
				$target_path = FILE_PATH . '/images/' . $curDate;
				verifyPath($target_path, true);

				$randChar = self::generateRandChar(10);

				$file_path = $target_path . '/' .$randChar. '.'. $fileExt;
				if(move_uploaded_file($file['tmp_name'], $file_path)) {
				    $$name = Flight::get('STATIC_URL').'/images/'.$curDate. '/' .$randChar. '.'. $fileExt;
				}
			}

			$business_license = isset($business_license)?$business_license:'';
			if(!$business_license) {
				Handle::result("缺少关键数据", "商家营业执照照片上传失败" );
			}

			$legal_person = isset($legal_person)?$legal_person:'';
			if(!$legal_person) {
				Handle::result("缺少关键数据", "商家法人照片上传失败" );
			}

			$logo = isset($logo)?$logo:'';

			$db = Flight::get('db');
			if($db->has('lk_shop', array('shop_name' => $shop_name))) {
				Handle::result("重复", "此商家已经存在请重新定义商家名" );
			}

			$last_id = $db->insert('lk_shop', array(
				"shop_name" 			=> $shop_name,
				"item_ids" 				=> $item_ids,
				"region_id" 			=> $region_id,
				"address" 				=> $address,
				"business_license" 		=> $business_license,
				"legal_person" 			=> $legal_person,
				"logo" 					=> $logo,
				"officer" 				=> $officer,
				"phone" 				=> $phone,
				"bank_account_name" 	=> $bank_account_name,
				"bank" 					=> $bank,
				"bank_accunt" 			=> $bank_accunt,
				"add_time" 				=> time(),
				"is_use" 				=> $is_use,
				"is_recommend" 			=> $is_recommend,
				"check_type" 			=> $check_type,
			));

			if($last_id) {
				Handle::result("成功", "添加成功", '../shop/shoplist', "点击继续添加", '../shop/addShop' );
			}else{
				Handle::result("失败", "添加数据失败");
			}

		}else{

			$regions = self::getRegions();
			$serItems = self::getServiceItems();

			Flight::jsrender('/public/js/plugins/jquery.validate.min.js');
			Flight::jsrender('/public/js/plugins/jquery.tagsinput.min.js');
			Flight::jsrender('/public/js/plugins/chosen.jquery.min.js');
			Flight::jsrender('/public/js/shop/addShop.js');

			Flight::render("shop/addShop", array('type' => 'add', 'regions' => $regions, 'ser_items' => $serItems));
			
		}

	}

	/**
	 * 生成随机字符
	 *
	 * @author zhaozl
	 * @since  2015-07-10
	 */
	private static function generateRandChar($length = 8) {
		// 密码字符集，可任意添加你需要的字符  
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";  
		$strings = "";  
		for ( $i = 0; $i < $length; $i++ )  
		{  
			// 这里提供两种字符获取方式  
			// 第一种是使用 substr 截取$chars中的任意一位字符；  
			// 第二种是取字符数组 $chars 的任意元素  
			// $strings .= substr($chars, mt_rand(0, strlen($chars) – 1), 1);  
			$strings .= $chars[ mt_rand(0, strlen($chars) - 1) ];  
		}  
		return $strings;  
	}

	/**
	 * 获取区域
	 *
	 * @return [type]     [description]
	 * @author zhaozl
	 * @since  2015-07-08
	 */
	public static function getRegions($type = 1) {

		$db = Flight::get('db');

		$regions = $db->select('lk_region', array('region_id', 'region_name'), array('parent_id' => '530', 'ORDER' => "sort_order ASC") );

		// 所有
		$allRegions = $db->select('lk_region', array('region_id', 'region_name', 'parent_id'), array('parent_id[>]' => '0' ,'ORDER' => "sort_order ASC") );
		$allRegs = array();

		$res = array();
		if($type == 2) {
			foreach ($allRegions as $region) {
				$region_name = $db->get('lk_region', 'region_name', array('region_id' => $region['parent_id']));
				$res[$region['region_id']] = $region_name. '·' .$region['region_name'];
			}

		}else{
			
			foreach ($allRegions as $alre) {
				$allRegs[$alre['parent_id']]["{$alre['region_id']}"] = $alre['region_name'];
			}

			if($regions) {
				foreach ($regions as $value) {
					if(!isset($allRegs[$value['region_id']])) {
						$res[$value['region_name']] = array("{$value['region_id']}" => "{$value['region_name']}");
					}else{
						$res[$value['region_name']] = $allRegs[$value['region_id']];
					}
				}

			}
		}




		return $res;

	}

	/**
	 * [getServiceItems description]
	 *
	 * @return [type]     [description]
	 * @author zhaozl
	 * @since  2015-07-08
	 */
	public static function getServiceItems( $type = 1) {
		$db = Flight::get('db');

		$sers = $db->select('lk_service', array('ser_id', 'ser_name'), array('is_use' => '1', 'ORDER' => "sort_order ASC") );

		// 所有
		$all = $db->select('lk_service_item', array('item_id', 'item_name', 'ser_id'), array('is_use' => '1' ,'ORDER' => "sort_order ASC") );
		$allItems = array();

		$res = array();
		if($type == 2) {
			foreach ($all as $item) {
				$ser_name = $db->get('lk_service', 'ser_name', array('ser_id' => $item['ser_id']));
				$res[$item['item_id']] = $ser_name. '·' .$item['item_name'];
			}

		}else{
			foreach ($all as $item) {
				$allItems[$item['ser_id']]["{$item['item_id']}"] = $item['item_name'];
			}

			if($sers) {
				foreach ($sers as $value) {
					$res[$value['ser_name']] = $allItems[$value['ser_id']];
				}

			}
		}

		return $res;
	}

	/**
	 * 删除店铺
	 *
	 * @return [type]     [description]
	 * @author zhaozl
	 * @since  2015-07-10
	 */
	public static function delShop() {

		if(IS_POST) {
			$shop_id = Flight::request()->data->shop_id;
			$db = Flight::get('db');
			$db->update("lk_shop",  array('is_del' => 1) ,array('shop_id' => $shop_id));

			// add shop action
			$db->insert("lk_shop_action", array(
				'shop_id' => $shop_id, 
				'action' => 4, 
				'admin_id' => Session::get('admin_id'), 
				'msg' => trim(Flight::request()->data->reason),
				'add_time' => time() 
			));

			Flight::json(array('success' => true, 'msg' => '删除成功'));

		}else{
			Handle::result('302', '非法请求', '../dashboard/admin');
		}

	}


	/**
	 * 审核商家
	 *
	 * @author zhaozl
	 * @since  2015-07-10
	 */
	public static function verifyshop() {
		Flight::jsrender('/public/js/shop/verifyshop.js');
		Flight::render("shop/verifyshop");
	}

	/**
	 * 本删除的商家
	 *
	 * @author zhaozl
	 * @since  2015-07-10
	 */
	public static function recycle() {
		Flight::jsrender('/public/js/shop/recycle.js');
		Flight::render("shop/recycle");
	}

	/**
	 * 审核打回商家申请
	 *
	 * @return [type]     [description]
	 * @author zhaozl
	 * @since  2015-07-10
	 */
	public static function check_shop() {

		$req = Flight::request()->data;
		$shop_id = isset($req['shop_id'])?$req['shop_id']:'';
		$type = isset($req['type'])?$req['type']:'';

		if($shop_id) {

			// 判断订单是否存在并有效
			$db = Flight::get('db');
			$hasOrder = $db->has('lk_shop',array('AND' => array('shop_id' => $shop_id, 'status' => 0)) );
			if($hasOrder) {

				$admin_id = Session::get('admin_id');
				$time = time();

				if($type == 1) {

					// 更改订单表审核信息
					$db->update('lk_shop', array(
						'status' => 1
					), array('shop_id' => $shop_id));

					// 添加操作记录
					$db->insert('lk_shop_action', array(
						'shop_id' => $shop_id,
						'admin_id' => $admin_id,
						'action' => 1,
						'msg' => '审核通过',
						'add_time' => $time
					));

					Flight::json(array('success' => true, 'msg' => '审核订单成功'));
				}else{

					$reason = isset($req['reason'])?$req['reason']:'';
					// 更改订单表审核信息
					$db->update('lk_shop', array(
						'status' => 2
					), array('shop_id' => $shop_id));

					// 添加操作记录
					$db->insert('lk_shop_action', array(
						'shop_id' => $shop_id,
						'admin_id' => $admin_id,
						'action_id' => 2,
						'msg' => $reason,
						'add_time' => $time
					));

					Flight::json(array('success' => true, 'msg' => '打回订单成功'));
				}

			}else{
				Flight::json(array('success' => false, 'msg' => '找不到符合条件的订单'));
			}

		}else{
			Flight::json(array('success' => false, 'msg' => '传入的数据不正确'));
		}

	}

	/**
	 * 还原商家
	 *
	 * @return [type]     [description]
	 * @author zhaozl
	 * @since  2015-07-10
	 */
	public static function rollbackShop() {

		if(IS_POST) {
			$shop_id = Flight::request()->data->shop_id;
			$db = Flight::get('db');
			$db->update("lk_shop",  array('is_del' => 0) ,array('shop_id' => $shop_id));

			// add shop action
			$db->insert("lk_shop_action", array(
				'shop_id' => $shop_id, 
				'action' => 5, 
				'admin_id' => Session::get('admin_id'), 
				'msg' => "还原商户",
				'add_time' => time() 
			));

			Flight::json(array('success' => true, 'msg' => '删除成功'));

		}else{
			Handle::result('302', '非法请求', '../dashboard/admin');
		}

	}


	/**
	 * 店铺类型管理
	 *
	 * @return [type]     [description]
	 * @author zhaozl
	 * @since  2015-07-10
	 */
	public static function shoptype() {

		Flight::jsrender('/public/js/shop/shoptype.js');
		Flight::render("shop/shoptype");

	}

}