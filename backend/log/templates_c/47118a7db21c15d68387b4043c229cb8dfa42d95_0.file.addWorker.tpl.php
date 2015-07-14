<?php /* Smarty version 3.1.27, created on 2015-07-14 13:20:59
         compiled from "E:\myphp\www\12349bk\backend\view\shop\addWorker.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2472755a49c3b30ab87_89737946%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47118a7db21c15d68387b4043c229cb8dfa42d95' => 
    array (
      0 => 'E:\\myphp\\www\\12349bk\\backend\\view\\shop\\addWorker.tpl',
      1 => 1436835310,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2472755a49c3b30ab87_89737946',
  'variables' => 
  array (
    'ser_items' => 0,
    'shops' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55a49c3b32de11_78474984',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55a49c3b32de11_78474984')) {
function content_55a49c3b32de11_78474984 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'E:\\myphp\\www\\12349bk\\backend\\vender\\smarty\\plugins\\function.html_options.php';

$_smarty_tpl->properties['nocache_hash'] = '2472755a49c3b30ab87_89737946';
?>
<div class="contentwrapper">
	
	<form class="stdform formtable" action="../shop/addWorker" method="post" enctype="multipart/form-data">
		<table width="60%" cellspacing="0">
			<tr>
				<td>
					<p>
			        	<label>姓名：</label>
			            <span class="field"><input type="text" name="staff_name" class="smallinput" /></span>
			        </p>
				</td>
				<td>
					<p>
			        	<label>手机：</label>
			            <span class="field"><input type="text" name="phone_mob" class="smallinput" /></span>
			        </p>
				</td>
			</tr>
			<tr>
				<td>
					<p>
						<label>所属分类：</label>
						<span class="field">
			            	<select name="item_ids[]" id="item_ids" data-placeholder="请选择类型" class="chzn-select" multiple="multiple" style="width:350px;" tabindex="4">
								<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ser_items']->value),$_smarty_tpl);?>

							</select>
						</span>
					</p>
				</td>
				<td>
					<p>
						<label>所属商家：</label>
					</p>
					<span class="field">
		            	<select name="shop_id" id="shop_id" data-placeholder="请选择商家" class="chzn-select" style="width:350px;" tabindex="4">
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['shops']->value),$_smarty_tpl);?>

						</select>
                    </span>
				</td>
			</tr>
			<tr>
				<td>
					<p>
						<label>健康证：</label>
					</p>
					<span class="field">
                    	<input type="file" name="health_certificate" />
                    </span>
				</td>
				<td>
					<p>
						<label>健康证到期时间：</label>
					</p>
					<span class="field">
                    	<input type="text" name="health_date" />
                    </span>
				</td>
			</tr>
			<tr>
				<td>
					<p>
						<label>身份证正面：</label>
					</p>
					<span class="field">
                    	<input type="file" name="id_front" />
                    </span>
				</td>
				<td>
					<p>
						<label>身份证反面：</label>
					</p>
					<span class="field">
                    	<input type="file" name="id_reverse" />
                    </span>
				</td>
			</tr>
			<tr>
				<td>
					<p>
						<label>上岗证：</label>
					</p>
					<span class="field">
                    	<input type="file" name="work_license" />
                    </span>
				</td>
				<td>
					&nbsp;
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