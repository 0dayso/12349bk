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
	public static function result( $msg, $res = 1 ) {

		Flight::render('common/handle', array(
			'msg' => $msg,
			'res' => $res == 1?'失败':'成功'
			));
		die;
	}

}