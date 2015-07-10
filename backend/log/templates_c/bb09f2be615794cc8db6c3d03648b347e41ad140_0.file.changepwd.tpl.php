<?php /* Smarty version 3.1.27, created on 2015-07-09 10:21:19
         compiled from "E:\myphp\www\12349bk\backend\view\dashboard\changepwd.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:24039559dda9f885939_92900538%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb09f2be615794cc8db6c3d03648b347e41ad140' => 
    array (
      0 => 'E:\\myphp\\www\\12349bk\\backend\\view\\dashboard\\changepwd.tpl',
      1 => 1436170182,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24039559dda9f885939_92900538',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_559dda9f8c02c4_94381997',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559dda9f8c02c4_94381997')) {
function content_559dda9f8c02c4_94381997 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '24039559dda9f885939_92900538';
?>
<div class="contentwrapper">
	
	<form class="stdform" action="../dashboard/changepwd" method="post">
        <p>
        	<label>新密码：</label>
            <span class="field"><input type="password" id="admin_password" name="admin_password" class="smallinput" /></span>
        </p>
        <p>
        	<label>新密码确认：</label>
            <span class="field"><input type="password" id="admin_password_conf" name="admin_password_conf" class="smallinput" /></span>
        </p>
        <br>
        <p class="stdformbutton">
        	<button id="submitBtn" class="submit radius2">提交</button>
            <input type="reset" class="reset radius2" value="重置">
        </p>
	</form>

</div><?php }
}
?>