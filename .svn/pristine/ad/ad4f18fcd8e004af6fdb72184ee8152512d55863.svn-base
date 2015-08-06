<?php

/**
 * 财务管理
 * 
 */
class Finance {

	/**
	 * 商家报表
	 *
	 * @return [type]     [description]
	 * @author zhaozl
	 * @since  2015-07-16
	 */
	public static function shop() {
		Flight::jsrender('/public/js/finance/shop.js');
		Flight::render('finance/shop');
	}

	/**
	 * 获取商家报表数据
	 *
	 * @return [type]     [description]
	 * @author zhaozl
	 * @since  2015-07-16
	 */
	public static function getShops() {

		$req = Flight::request()->query;

		$search = isset($req->sSearch)?$req->sSearch:'';
		$sSearch_1 = isset($req->sSearch_1)?$req->sSearch_1:'';
		$sSearch_2 = isset($req->sSearch_2)?$req->sSearch_2:'';
		$sSearch_3 = isset($req->sSearch_3)?$req->sSearch_3:'';

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

		$sql .= ' AND is_del = 0 AND status = 1';

		$countSql = $sql;
		$sql .= " ORDER BY {$sort_item} {$sort_sort} LIMIT {$start},{$length}";

		$res = $db->query($sql)->fetchAll();

		$serItems = Shop::getServiceItems(2);
		$result = array();
		if($res) {
			foreach ($res as $key => $value) {
				$items = explode(',', $value['item_ids']);

				$item_names = '';
				foreach ($items as $item_id) {
					$item_names .= $serItems[$item_id] . ',';
				}

				$order_info = $db->query("SELECT sum(O.amount) AS tamount, sum(O.discount) as tdiscount, 
					sum(O.order_amount) as torderamount, SUM(O.order_amount * S.rate) as tmoney
					FROM lk_order O INNER JOIN lk_order_service S ON O.order_sn = S.order_sn 
					WHERE O.shop_id = '{$value['shop_id']}' AND O.status >= 6")->fetch();

				$return = $db->query("SELECT sum(PR.value) AS ramount FROM lk_order_pay_r PR 
					LEFT JOIN lk_order_return R ON PR.order_id_r = R.order_id_r 
					WHERE R.status = 3 AND R.shop_id = '{$value['shop_id']}'")->fetch();

				$tmp = array(
					'shop_id' => $value['shop_id'],
					'shop_name' => $value['shop_name'],
					'item_types' => rtrim($item_names, ','),
					'tamount' => isset($order_info['tamount'])?sprintf("%.2f", $order_info['tamount']):'0',
					'tdiscount' => isset($order_info['tdiscount'])?sprintf("%.2f", $order_info['tdiscount']):'0',
					'torderamount' => isset($order_info['torderamount'])?sprintf("%.2f", $order_info['torderamount']):'0',
					'tmoney' => isset($order_info['tmoney'])?sprintf("%.2f", $order_info['tmoney']):'0',
					'treturn' => isset($return['ramount'])?sprintf("%.2f", $return['ramount']):'0',
				);
				$tmp['true_amount'] = sprintf("%.2f", ($tmp['torderamount'] - $tmp['treturn'] - $tmp['tmoney']));

				$result[] = $tmp;

			}
		}

		$iFilteredTotal = count($db->query($countSql)->fetchAll());
		$iTotalRecords = $db->count('lk_shop', array("AND" => array("is_del" => 0,"status" => 1)));

		Flight::json(array(
			'aaData' => $result, 
			"sEcho" => intval($req->sEcho),
			"iTotalRecords" => $iTotalRecords,
			"iTotalDisplayRecords" => $iFilteredTotal,
		));
		
	}
}