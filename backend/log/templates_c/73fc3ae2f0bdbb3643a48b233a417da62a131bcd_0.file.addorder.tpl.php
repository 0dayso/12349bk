<?php /* Smarty version 3.1.27, created on 2015-07-15 14:03:40
         compiled from "E:\myphp\www\12349bk\backend\view\order\addorder.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:659155a5f7bc77a050_10932271%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73fc3ae2f0bdbb3643a48b233a417da62a131bcd' => 
    array (
      0 => 'E:\\myphp\\www\\12349bk\\backend\\view\\order\\addorder.tpl',
      1 => 1436859146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '659155a5f7bc77a050_10932271',
  'variables' => 
  array (
    'ser_items' => 0,
    'regions' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55a5f7bc78d8e6_85387432',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55a5f7bc78d8e6_85387432')) {
function content_55a5f7bc78d8e6_85387432 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'E:\\myphp\\www\\12349bk\\backend\\vender\\smarty\\plugins\\function.html_options.php';

$_smarty_tpl->properties['nocache_hash'] = '659155a5f7bc77a050_10932271';
?>
<div class="contentwrapper">
	
	<form class="stdform stdform2 formtable" action="../order/addOrder" method="post" enctype="multipart/form-data">
		<table width="100%" cellspacing="0">
			<tr>
				<td>
					<p>
			        	<label>选择服务：</label>
			            <span class="field">
			            	<select name="item_id" id="item_id" data-placeholder="请选择服务类型" class="chzn-select" style="width:350px;" tabindex="4">
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ser_items']->value),$_smarty_tpl);?>

							</select>
						</span>
			        </p>
				</td>
				<td>
					<p>
			        	<label>服务时间：</label>
			            <span class="field"><input type="text" name="need_time" class="smallinput"/></span>
			        </p>
				</td>
			</tr>
			<tr>
				<td>
					<p>
			        	<label>联系人：</label>
			            <span class="field"><input type="text" name="contact" class="smallinput" placeholder="联系人"/></span>
			        </p>
				</td>
				<td>
					<p>
			        	<label>联系电话：</label>
			            <span class="field"><input type="text" name="phone_mob" class="smallinput" placeholder="手机号码或者电话"/></span>
			        </p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
						<label>服务地址：</label>
						<span class="field">
							<select name="region_id" id="region_id"  data-placeholder="请选择区域" class="chzn-select" style="width:350px;" tabindex="2">
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['regions']->value),$_smarty_tpl);?>

							</select>
							<br>
							<input type="text" name="address" class="smallinput" style="margin-top: 5px;" placeholder="请填写详细地址"/>
						</span>
					</p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
						<label>备注：</label>
						<span class="field">
	                    	<textarea cols="80" rows="5" class="longinput" name="remark"></textarea>
	                    </span>
					</p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
						<label for="">用户名（可选）:</label>
						<span class="field">
							<input type="text" name="user_name" placeholder="已注册用户的用户名或者绑定手机号码（可选填）">
						</span>
					</p>
				</td>
			</tr>
		</table>
        <p class="stdformbutton">
        	<button id="submitBtn" class="submit radius2">提交</button>
            <input type="reset" class="reset radius2" value="重置">
        </p>
	</form>

</div><?php }
}
?>