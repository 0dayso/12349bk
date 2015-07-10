<?php /* Smarty version 3.1.27, created on 2015-07-10 09:06:34
         compiled from "E:\myphp\www\12349bk\backend\view\dashboard\admin.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:13060559f1a9a648b83_86784482%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85c8c739edbd49787d378f29d4534ffbaa703f75' => 
    array (
      0 => 'E:\\myphp\\www\\12349bk\\backend\\view\\dashboard\\admin.tpl',
      1 => 1436144743,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13060559f1a9a648b83_86784482',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_559f1a9a648b89_79508554',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559f1a9a648b89_79508554')) {
function content_559f1a9a648b89_79508554 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '13060559f1a9a648b83_86784482';
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