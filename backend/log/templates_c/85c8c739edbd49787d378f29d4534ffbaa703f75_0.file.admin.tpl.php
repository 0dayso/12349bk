<?php /* Smarty version 3.1.27, created on 2015-07-07 10:15:09
         compiled from "E:\myphp\www\12349bk\backend\view\dashboard\admin.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:315559b362d0f7ee6_21134291%%*/
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
  'nocache_hash' => '315559b362d0f7ee6_21134291',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_559b362d0fbd69_72678172',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559b362d0fbd69_72678172')) {
function content_559b362d0fbd69_72678172 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '315559b362d0f7ee6_21134291';
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