<?php /* Smarty version 3.1.27, created on 2015-07-15 10:18:33
         compiled from "E:\myphp\www\12349bk\backend\view\shop\addShop.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1588855a5c2f9c00124_78082309%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '218b92e4ee012e2ac258aac5de65b0ad44af7bad' => 
    array (
      0 => 'E:\\myphp\\www\\12349bk\\backend\\view\\shop\\addShop.tpl',
      1 => 1436777692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1588855a5c2f9c00124_78082309',
  'variables' => 
  array (
    'ser_items' => 0,
    'regions' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55a5c2f9c1b6b5_50233802',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55a5c2f9c1b6b5_50233802')) {
function content_55a5c2f9c1b6b5_50233802 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'E:\\myphp\\www\\12349bk\\backend\\vender\\smarty\\plugins\\function.html_options.php';

$_smarty_tpl->properties['nocache_hash'] = '1588855a5c2f9c00124_78082309';
?>
<div class="contentwrapper">
	
	<form class="stdform formtable" action="../shop/addShop" method="post" enctype="multipart/form-data">
		<table width="60%" cellspacing="0">
			<tr>
				<td>
					<p>
			        	<label>商家名称：</label>
			            <span class="field"><input type="text" name="shop_name" class="smallinput" /></span>
			        </p>
				</td>
				<td>
					<p>
			        	<label>商家类型：</label>
			            <span class="field">
			            	<select name="item_ids[]" id="item_ids" data-placeholder="请选择类型" class="chzn-select" multiple="multiple" style="width:350px;" tabindex="4">
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ser_items']->value),$_smarty_tpl);?>

							</select>
						</span>
			        </p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
						<label>商家地址</label>
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
				<td>
					<p>
						<label>营业执照：</label>
					</p>
					<span class="field">
                    	<input type="file" name="business_license" />
                    </span>
				</td>
				<td>
					<p>
						<label>法人身份证：</label>
					</p>
					<span class="field">
                    	<input type="file" name="legal_person" />
                    </span>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
						<label>上传公司LOGO：</label>
					</p>
					<span class="field">
                    	<input type="file" name="logo" />
                    </span>
				</td>
			</tr>
			<tr>
				<td>
					<p>
			        	<label>负责人：</label>
			            <span class="field"><input type="text" name="officer" class="smallinput" /></span>
			        </p>
				</td>
				<td>
					<p>
			        	<label>开户行：</label>
			            <span class="field"><input type="text" name="bank" class="smallinput" /></span>
			        </p>
				</td>
			</tr>
			<tr>
				<td>
					<p>
			        	<label>联系手机号：</label>
			            <span class="field"><input type="text" name="phone" class="smallinput" /></span>
			        </p>
				</td>
				<td>
					<p>
			        	<label>开户账号：</label>
			            <span class="field"><input type="text" name="bank_account_name" class="smallinput" /></span>
			        </p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
						<label>收款账号：</label>
					</p>
					<span class="field"><input type="text" name="bank_accunt" class="smallinput" /></span>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
                        <label>结算类型</label>
                        <span class="field">
                        	<input type="radio" name="check_type" value="1" checked="checked"/>月结 &nbsp; &nbsp;
                        	<input type="radio" name="check_type" value="2" /> 半月结 &nbsp; &nbsp;
                        	<input type="radio" name="check_type" value="3" /> 周结 &nbsp; &nbsp;
                        </span>
                    </p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
                        <label>是否启用</label>
                        <span class="field">
                        	<input type="radio" name="is_use" value="1" checked="checked"/>是 &nbsp; &nbsp;
                        	<input type="radio" name="is_use" value="0" /> 否 &nbsp; &nbsp;
                        </span>
                    </p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
                        <label>是否推荐</label>
                        <span class="field">
                        	<input type="radio" name="is_recommend" value="1"/>是 &nbsp; &nbsp;
                        	<input type="radio" name="is_recommend" value="0" checked="checked" /> 否 &nbsp; &nbsp;
                        </span>
                    </p>
				</td>
			</tr>
		</table>
		<br>
        <p class="stdformbutton">
        	<button id="submitBtn" class="submit radius2">提交</button>
            <input type="reset" class="reset radius2" value="重置">
        </p>
	</form>

</div><?php }
}
?>