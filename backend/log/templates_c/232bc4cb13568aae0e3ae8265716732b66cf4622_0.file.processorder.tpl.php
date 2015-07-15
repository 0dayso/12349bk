<?php /* Smarty version 3.1.27, created on 2015-07-15 14:03:43
         compiled from "E:\myphp\www\12349bk\backend\view\order\processorder.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:482755a5f7bf2c3974_14933595%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '232bc4cb13568aae0e3ae8265716732b66cf4622' => 
    array (
      0 => 'E:\\myphp\\www\\12349bk\\backend\\view\\order\\processorder.tpl',
      1 => 1436925084,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '482755a5f7bf2c3974_14933595',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55a5f7bf2c77f8_80374513',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55a5f7bf2c77f8_80374513')) {
function content_55a5f7bf2c77f8_80374513 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '482755a5f7bf2c3974_14933595';
?>
<div id="contentwrapper" class="contentwrapper">
    <table id="processorder" class="stdtable" cellspacing="0" width="100%">
    </table>
</div>

<div class="hide">
	<div id="dialog" title="请选择商家服务人员" style="">
		<form class="stdform formtable" action="../order/assignWorker" method="POST">
			<input type="hidden" name="order_id" id="order_id" />
			<table width="100%" cellspacing="0" collspacing="0">
				<tr>
					<td>
						<p>
				        	<label>商家</label>
				            <span class="field">
				            	<select name="shop" id="shop" data-placeholder="请选择商家" class="chzn-select" style="width:350px;" tabindex="-1">
				            		<option value="">请选择商家</option>
								</select>
							</span>
				        </p>
					</td>
				</tr>
				<tr id="staffField" style="display: none;">
					<td>
						<p>
				        	<label>服务人员</label>
				            <span class="field">
				            	<select name="staff" id="staff" data-placeholder="请选择服务人员" class="chzn-select" style="width:350px;" tabindex="-1">
								</select>
							</span>
				        </p>
					</td>
				</tr>
			</table>
			<p class="stdformbutton">
	        	<button id="submitBtn" class="submit radius2">提交</button>
	        </p>
		</form>

	</div>
</div><?php }
}
?>