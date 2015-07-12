<?php /* Smarty version 3.1.27, created on 2015-07-12 14:47:28
         compiled from "F:\MyLocalPHP\AMySite\12349bk\backend\view\dashboard\admin.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2665255a20d8053bd46_61432714%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b79788f804654f7199e791cc7c0599e5966f581' => 
    array (
      0 => 'F:\\MyLocalPHP\\AMySite\\12349bk\\backend\\view\\dashboard\\admin.tpl',
      1 => 1436614210,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2665255a20d8053bd46_61432714',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55a20d8053fbc2_47583222',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55a20d8053fbc2_47583222')) {
function content_55a20d8053fbc2_47583222 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2665255a20d8053bd46_61432714';
?>
<div id="contentwrapper" class="contentwrapper">
	<div class="tableoptions">
    	<button class="deletebutton radius3" id="add_admin_btn">添加管理员</button> &nbsp;
    </div><!--tableoptions-->	
    <table id="adminTable" class="stdtable" cellspacing="0" width="100%">
    </table>
</div><?php }
}
?>