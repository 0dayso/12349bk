<?php /* Smarty version 3.1.27, created on 2015-07-14 09:13:26
         compiled from "E:\myphp\www\12349bk\backend\view\shop\editShop.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2978055a46236788816_02892516%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95f8a11c2c7518e7508485a7cded5196affc5927' => 
    array (
      0 => 'E:\\myphp\\www\\12349bk\\backend\\view\\shop\\editShop.tpl',
      1 => 1436778444,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2978055a46236788816_02892516',
  'variables' => 
  array (
    'shop_info' => 0,
    'ser_items' => 0,
    'regions' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55a462367de737_11259777',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55a462367de737_11259777')) {
function content_55a462367de737_11259777 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'E:\\myphp\\www\\12349bk\\backend\\vender\\smarty\\plugins\\function.html_options.php';

$_smarty_tpl->properties['nocache_hash'] = '2978055a46236788816_02892516';
?>
<div class="contentwrapper">
	
	<form class="stdform formtable" action="../shop/editShop" method="post" enctype="multipart/form-data">
		<input type="hidden" name="shop_id" id="shop_id" value="<?php echo $_smarty_tpl->tpl_vars['shop_info']->value['shop_id'];?>
">
		<table width="60%" cellspacing="0">
			<tr>
				<td>
					<p>
			        	<label>商家名称：</label>
			            <span class="field"><input type="text" name="shop_name" class="smallinput" value="<?php echo $_smarty_tpl->tpl_vars['shop_info']->value['shop_name'];?>
"/></span>
			        </p>
				</td>
				<td>
					<input type="hidden" id="hideItems"  value="<?php echo $_smarty_tpl->tpl_vars['shop_info']->value['item_ids'];?>
">
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
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['regions']->value,'selected'=>$_smarty_tpl->tpl_vars['shop_info']->value['region_id']),$_smarty_tpl);?>

							</select>
							<br>
							<input type="text" name="address" class="smallinput" style="margin-top: 5px;" placeholder="请填写详细地址" value="<?php echo $_smarty_tpl->tpl_vars['shop_info']->value['address'];?>
"/>
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
						<img src="<?php echo $_smarty_tpl->tpl_vars['shop_info']->value['business_license'];?>
" alt="" width="100px" height="100px"/><br>
                    	<input type="file" name="business_license" />
                    </span>
				</td>
				<td>
					<p>
						<label>法人身份证：</label>
					</p>
					<span class="field">
						<img src="<?php echo $_smarty_tpl->tpl_vars['shop_info']->value['legal_person'];?>
" alt="" width="100px" height="100px"/><br>
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
						<?php if ($_smarty_tpl->tpl_vars['shop_info']->value['logo']) {?>
						<img src="<?php echo $_smarty_tpl->tpl_vars['shop_info']->value['logo'];?>
" alt="" width="100px" height="100px"/><br>
						<?php }?>
                    	<input type="file" name="logo" />
                    </span>
				</td>
			</tr>
			<tr>
				<td>
					<p>
			        	<label>负责人：</label>
			            <span class="field"><input type="text" name="officer" class="smallinput" value="<?php echo $_smarty_tpl->tpl_vars['shop_info']->value['officer'];?>
"/></span>
			        </p>
				</td>
				<td>
					<p>
			        	<label>开户行：</label>
			            <span class="field"><input type="text" name="bank" class="smallinput" value="<?php echo $_smarty_tpl->tpl_vars['shop_info']->value['bank'];?>
" /></span>
			        </p>
				</td>
			</tr>
			<tr>
				<td>
					<p>
			        	<label>联系手机号：</label>
			            <span class="field"><input type="text" name="phone" class="smallinput" value="<?php echo $_smarty_tpl->tpl_vars['shop_info']->value['phone'];?>
" /></span>
			        </p>
				</td>
				<td>
					<p>
			        	<label>开户账号（姓名）：</label>
			            <span class="field"><input type="text" name="bank_account_name" class="smallinput" value="<?php echo $_smarty_tpl->tpl_vars['shop_info']->value['bank_account_name'];?>
" /></span>
			        </p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
						<label>收款账号（卡号）：</label>
					</p>
					<span class="field"><input type="text" name="bank_accunt" class="smallinput" value="<?php echo $_smarty_tpl->tpl_vars['shop_info']->value['bank_accunt'];?>
" /></span>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
                        <label>结算类型</label>
                        <span class="field">
                        	<input type="radio" name="check_type" value="1" <?php if ($_smarty_tpl->tpl_vars['shop_info']->value['check_type'] == '1') {?>checked="checked"<?php }?>/>月结 &nbsp; &nbsp;
                        	<input type="radio" name="check_type" value="2" <?php if ($_smarty_tpl->tpl_vars['shop_info']->value['check_type'] == '2') {?>checked="checked"<?php }?>/> 半月结 &nbsp; &nbsp;
                        	<input type="radio" name="check_type" value="3" <?php if ($_smarty_tpl->tpl_vars['shop_info']->value['check_type'] == '3') {?>checked="checked"<?php }?>/> 周结 &nbsp; &nbsp;
                        </span>
                    </p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
                        <label>是否启用</label>
                        <span class="field">
                        	<input type="radio" name="is_use" value="1" <?php if ($_smarty_tpl->tpl_vars['shop_info']->value['is_use'] == '1') {?>checked="checked"<?php }?>/>是 &nbsp; &nbsp;
                        	<input type="radio" name="is_use" value="0" <?php if ($_smarty_tpl->tpl_vars['shop_info']->value['is_use'] == '0') {?>checked="checked"<?php }?>/> 否 &nbsp; &nbsp;
                        </span>
                    </p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
                        <label>是否推荐</label>
                        <span class="field">
                        	<input type="radio" name="is_recommend" value="1" <?php if ($_smarty_tpl->tpl_vars['shop_info']->value['is_use'] == '1') {?>checked="checked"<?php }?>/>是 &nbsp; &nbsp;
                        	<input type="radio" name="is_recommend" value="0" <?php if ($_smarty_tpl->tpl_vars['shop_info']->value['is_use'] == '0') {?>checked="checked"<?php }?>/> 否 &nbsp; &nbsp;
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