<?php /* Smarty version 3.1.27, created on 2015-07-06 15:52:54
         compiled from "E:\myphp\www\12349bk\backend\view\dashboard\manageadmin.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:24025559a33d600eb95_40984968%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3cdd653e1ae5b55967193277e2bdc2abc7a818b7' => 
    array (
      0 => 'E:\\myphp\\www\\12349bk\\backend\\view\\dashboard\\manageadmin.tpl',
      1 => 1436154463,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24025559a33d600eb95_40984968',
  'variables' => 
  array (
    'type' => 0,
    'groups' => 0,
    'admin_id' => 0,
    'admin_name' => 0,
    'true_name' => 0,
    'phone_mob' => 0,
    'group_id' => 0,
    'is_use' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_559a33d60456a8_41633258',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559a33d60456a8_41633258')) {
function content_559a33d60456a8_41633258 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'E:\\myphp\\www\\12349bk\\backend\\vender\\smarty\\plugins\\function.html_options.php';

$_smarty_tpl->properties['nocache_hash'] = '24025559a33d600eb95_40984968';
if ($_smarty_tpl->tpl_vars['type']->value == 'add') {?>

<div class="contentwrapper">
	
	<form class="stdform" action="../dashboard/addadmin" method="post">
		<p>
        	<label>用户名：</label>
            <span class="field"><input type="text" name="admin_name" class="smallinput" /></span>
        </p>
        <p>
        	<label>密码：</label>
            <span class="field"><input type="password" name="admin_password" class="smallinput" /></span>
        </p>
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
            	<input type="radio" name="is_use" value="1" checked="checked" /> 是 &nbsp; &nbsp;
            	<input type="radio" name="is_use" value="0" /> 否 &nbsp; &nbsp;
            </span>
        </p>

        <br>
        <p class="stdformbutton">
        	<button id="submitBtn" class="submit radius2">提交</button>
            <input type="reset" class="reset radius2" value="重置">
        </p>
	</form>

</div>

<?php } else { ?>
<div class="contentwrapper">
    
    <form class="stdform" action="../dashboard/editadmin" method="post">
        <input type="hidden" name="admin_id" id="admin_id" value="<?php echo $_smarty_tpl->tpl_vars['admin_id']->value;?>
">
        <p>
            <label>用户名：</label>
            <span class="field"><input type="text" name="admin_name" class="smallinput" value="<?php echo $_smarty_tpl->tpl_vars['admin_name']->value;?>
"/></span>
        </p>
        <p>
            <label>姓名：</label>
            <span class="field"><input type="text" name="true_name" class="smallinput"  value="<?php echo $_smarty_tpl->tpl_vars['true_name']->value;?>
"/></span>
        </p>
        <p>
            <label>手机号：</label>
            <span class="field"><input type="text" name="phone_mob" class="smallinput"  value="<?php echo $_smarty_tpl->tpl_vars['phone_mob']->value;?>
"/></span>
        </p>
        <p>
            <label>用户组：</label>
            <select name="group_id" id="group_id">
                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['groups']->value,'selected'=>$_smarty_tpl->tpl_vars['group_id']->value),$_smarty_tpl);?>

            </select>
        </p>
        <p>
            <label>是否启用：</label>
            <span class="formwrapper">
                <input type="radio" name="is_use" value="1" <?php if ($_smarty_tpl->tpl_vars['is_use']->value == '1') {?>checked="checked"<?php }?> /> 是 &nbsp; &nbsp;
                <input type="radio" name="is_use" value="0" <?php if ($_smarty_tpl->tpl_vars['is_use']->value == '0') {?>checked="checked"<?php }?> /> 否 &nbsp; &nbsp;
            </span>
        </p>

        <br>
        <p class="stdformbutton">
            <button id="submitBtn" class="submit radius2">提交</button>
            <input type="reset" class="reset radius2" value="重置">
        </p>
    </form>

</div>
<?php }
}
}
?>