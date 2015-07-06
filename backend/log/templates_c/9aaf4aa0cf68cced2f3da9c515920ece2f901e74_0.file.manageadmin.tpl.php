<?php /* Smarty version 3.1.27, created on 2015-07-02 16:53:22
         compiled from "E:\myphp\www\12349bk\view\dashboard\manageadmin.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:305385594fc02c60f00_36114901%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9aaf4aa0cf68cced2f3da9c515920ece2f901e74' => 
    array (
      0 => 'E:\\myphp\\www\\12349bk\\view\\dashboard\\manageadmin.tpl',
      1 => 1435827190,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '305385594fc02c60f00_36114901',
  'variables' => 
  array (
    'type' => 0,
    'groups' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5594fc02c88018_38381106',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5594fc02c88018_38381106')) {
function content_5594fc02c88018_38381106 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'E:\\myphp\\www\\12349bk\\vender\\smarty\\plugins\\function.html_options.php';

$_smarty_tpl->properties['nocache_hash'] = '305385594fc02c60f00_36114901';
?>
<div class="contentwrapper">
	
	<form class="stdform" action="../dashboard/manageadmin" method="post">
		<p>
        	<label>用户名：</label>
            <span class="field"><input type="text" name="admin_name" class="smallinput" /></span>
        </p>
        <?php if ($_smarty_tpl->tpl_vars['type']->value == 'add') {?>
        <p>
        	<label>密码：</label>
            <span class="field"><input type="password" name="admin_password" class="smallinput" /></span>
        </p>
        <?php }?>
        <p>
        	<label>姓名：</label>
            <span class="field"><input type="text" name="true_name" class="smallinput" /></span>
        </p>
        <p>
        	<label>手机号：</label>
            <span class="field"><input type="text" name="phone_mob" class="smallinput" /></span>
        </p>
        <p>
        	<label>用户组：</label>
        	<select name="group_id" id="group_id">
        		<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['groups']->value),$_smarty_tpl);?>

        	</select>
        </p>
        <p>
        	<label>是否启用：</label>
            <span class="formwrapper">
            	<input type="radio" name="radiofield" checked="checked" /> 是 &nbsp; &nbsp;
            	<input type="radio" name="radiofield" /> 否 &nbsp; &nbsp;
            </span>
        </p>

        <br>
        <p class="stdformbutton">
        	<button class="submit radius2">提交</button>
            <input type="reset" class="reset radius2" value="重置">
        </p>
	</form>

</div><?php }
}
?>