<?php /* Smarty version 3.1.27, created on 2015-07-15 14:03:36
         compiled from "E:\myphp\www\12349bk\backend\view\dashboard\group.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1494755a5f7b8589018_43703241%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73b902d54526cf485ea6cd3eb7e7a695c48d50ad' => 
    array (
      0 => 'E:\\myphp\\www\\12349bk\\backend\\view\\dashboard\\group.tpl',
      1 => 1436153642,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1494755a5f7b8589018_43703241',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55a5f7b8589018_31516852',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55a5f7b8589018_31516852')) {
function content_55a5f7b8589018_31516852 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1494755a5f7b8589018_43703241';
?>
<div id="contentwrapper" class="contentwrapper">
	<div class="tableoptions">
    	<button class="deletebutton radius3" id="add_group_btn">添加用户组</button> &nbsp;
    </div><!--tableoptions-->	
    <table id="groupTable" class="stdtable" cellspacing="0" width="100%">
    </table>
</div><?php }
}
?>