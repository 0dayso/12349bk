<?php /* Smarty version 3.1.27, created on 2015-07-14 10:00:56
         compiled from "E:\myphp\www\12349bk\backend\view\shop\viewWorker.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2414055a46d58068393_53408920%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d9e630849014583b555e6ba2c6a2125399e3945' => 
    array (
      0 => 'E:\\myphp\\www\\12349bk\\backend\\view\\shop\\viewWorker.tpl',
      1 => 1436839254,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2414055a46d58068393_53408920',
  'variables' => 
  array (
    'staff_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55a46d580877a9_86817534',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55a46d580877a9_86817534')) {
function content_55a46d580877a9_86817534 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2414055a46d58068393_53408920';
?>
<div class="contentwrapper">
	
	<form class="stdform formtable" action="../shop/addWorker" method="post" enctype="multipart/form-data">
		<table width="60%" cellspacing="0">
			<tr>
				<td>
					<p>
					<label><b>姓名：</b></label>
			            <span class="field"><?php echo $_smarty_tpl->tpl_vars['staff_info']->value['staff_name'];?>
</span>
			        </p>
				</td>
				<td>
					<p>
					<label><b>手机：</b></label>
			            <span class="field"><?php echo $_smarty_tpl->tpl_vars['staff_info']->value['phone_mob'];?>
</span>
			        </p>
				</td>
			</tr>
			<tr>
				<td>
					<p>
						<label><b>所属分类：</b></label>
						<span class="field">
			            	<?php echo $_smarty_tpl->tpl_vars['staff_info']->value['item_ids'];?>

						</span>
					</p>
				</td>
				<td>
					<p>
						<label><b>所属商家：</b></label>
					</p>
					<span class="field">
		            	<?php echo $_smarty_tpl->tpl_vars['staff_info']->value['shop_name'];?>

                    </span>
				</td>
			</tr>
			<tr>
				<td>
					<p>
						<label><b>健康证：</b></label>
					</p>
					<span class="field">
						<img src="<?php echo $_smarty_tpl->tpl_vars['staff_info']->value['health_certificate'];?>
" alt="" width="100px" height="100px" />
                    </span>
				</td>
				<td>
					<p>
						<label><b>健康证到期时间：</b></label>
					</p>
					<span class="field">
						<?php echo $_smarty_tpl->tpl_vars['staff_info']->value['health_date'];?>

                    </span>
				</td>
			</tr>
			<tr>
				<td>
					<p>
						<label><b>身份证正面：</b></label>
					</p>
					<span class="field">
						<img src="<?php echo $_smarty_tpl->tpl_vars['staff_info']->value['id_front'];?>
" alt="" width="100px" height="100px" />
                    </span>
				</td>
				<td>
					<p>
						<label><b>身份证反面：</b></label>
					</p>
					<span class="field">
						<img src="<?php echo $_smarty_tpl->tpl_vars['staff_info']->value['id_reverse'];?>
" alt="" width="100px" height="100px" />
                    </span>
				</td>
			</tr>
			<tr>
				<td>
					<p>
						<label><b>上岗证：</b></label>
					</p>
					<span class="field">
						<img src="<?php echo $_smarty_tpl->tpl_vars['staff_info']->value['work_license'];?>
" alt="" width="100px" height="100px" />
                    </span>
				</td>
				<td>
					&nbsp;
				</td>
			</tr>
		</table>
	</form>

</div><?php }
}
?>