<?php
/**
 * 二维码接口
 *
 * 默认输出PNG steam，不保存文件
 */
require_once "vender/phpqrcode/qrlib.php";

$data = $_GET;
$content = isset($data['content'])?$data['content']:'1';
$level = isset($data['level'])?$data['level']:'L';
$piexl = isset($data['piexl'])?$data['piexl']:'3';
$margin = isset($data['margin'])?$data['margin']:'4';

if(!$content) {
	echo "请传入转换的内容";
}

QRcode::png($content, false, $level, $piexl, $margin); 
