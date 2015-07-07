<?php
/**
 * 消息处理类
 */
class Handle {

	/**
	 * 处理结果函数
	 *
	 * @return [type]     [description]
	 * @author zhaozl
	 * @since  2015-07-01
	 */
	public static function result($code, $msg, $backAct = '', $gotomsg = '', $gotourl = '') {

		// 判断返回上一页还是指定位置

		if(!$backAct) {
			$is_back = 1;
		}else{
			$is_back = 0;
		}

		Flight::render('common/handle', array(
			'code' => $code, 
			'msg' => $msg, 
			'is_back' => $is_back, 
			'backAct' => $backAct, 
			'gotourl' => $gotourl, 
			'gotomsg' => $gotomsg));

		die;
	}

}