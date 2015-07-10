<?php /* Smarty version 3.1.27, created on 2015-07-08 14:58:22
         compiled from "E:\myphp\www\12349bk\backend\view\order\vieworder.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:22227559cca0e58deb3_73605160%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da8e531ee6ed9a9fd2448842f8b05ce1840febb5' => 
    array (
      0 => 'E:\\myphp\\www\\12349bk\\backend\\view\\order\\vieworder.tpl',
      1 => 1436338695,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22227559cca0e58deb3_73605160',
  'variables' => 
  array (
    'order_sn' => 0,
    'status' => 0,
    'type_name' => 0,
    'add_time' => 0,
    'finish_time' => 0,
    'verify_time' => 0,
    'work_time' => 0,
    'amount' => 0,
    'use_coupon_value' => 0,
    'order_amount' => 0,
    'contact' => 0,
    'shop_name' => 0,
    'phone_mob' => 0,
    'shop_phone' => 0,
    'address' => 0,
    'staff_name' => 0,
    'need_time' => 0,
    'staff_phone' => 0,
    'remark' => 0,
    'degree' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_559cca0e5a9431_18139929',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559cca0e5a9431_18139929')) {
function content_559cca0e5a9431_18139929 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '22227559cca0e58deb3_73605160';
?>
<div id="contentwrapper" class="contentwrapper">
    

	<table class="infoTable" cellspacing="0" width="60%" border="0">
		<tr>
			<th>订单号：</th>
			<td><?php echo $_smarty_tpl->tpl_vars['order_sn']->value;?>
</td>
			<th>订单状态：</th>
			<td><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</td>
		</tr>
		<tr>
			<th>预约类型：</th>
			<td colspan="3"><?php echo $_smarty_tpl->tpl_vars['type_name']->value;?>
</td>
		</tr>
		<tr>
			<th>下单时间：</th>
			<td><?php echo $_smarty_tpl->tpl_vars['add_time']->value;?>
</td>
			<th>完成时间：</th>
			<td><?php echo $_smarty_tpl->tpl_vars['finish_time']->value;?>
</td>
		</tr>
		<tr>
			<th>审核时间：</th>
			<td><?php echo $_smarty_tpl->tpl_vars['verify_time']->value;?>
</td>
			<th>抢单时间：</th>
			<td><?php echo $_smarty_tpl->tpl_vars['work_time']->value;?>
</td>
		</tr>
		<tr>
			<th>服务费用：</th>
			<td>￥<?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
</td>
			<th>使用红包：</th>
			<td>￥<?php echo $_smarty_tpl->tpl_vars['use_coupon_value']->value;?>
</td>
		</tr>
		<tr>
			<th>应付：</th>
			<td colspan="3">￥<?php echo $_smarty_tpl->tpl_vars['order_amount']->value;?>
</td>
		</tr>
		<tr>
			<td colspan="4"><hr></td>
		</tr>
		<tr>
			<th>下单用户：</th>
			<td><?php echo $_smarty_tpl->tpl_vars['contact']->value;?>
</td>
			<th>服务商家：</th>
			<td><?php echo $_smarty_tpl->tpl_vars['shop_name']->value;?>
</td>
		</tr>
		<tr>
			<th>手机号码：</th>
			<td><?php echo $_smarty_tpl->tpl_vars['phone_mob']->value;?>
</td>
			<th>联系电话：</th>
			<td><?php echo $_smarty_tpl->tpl_vars['shop_phone']->value;?>
</td>
		</tr>
		<tr>
			<th>预约地址：</th>
			<td><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</td>
			<th>服务人员：</th>
			<td><?php echo $_smarty_tpl->tpl_vars['staff_name']->value;?>
</td>
		</tr>
		<tr>
			<th>预约时间：</th>
			<td><?php echo $_smarty_tpl->tpl_vars['need_time']->value;?>
</td>
			<th>联系电话：</th>
			<td><?php echo $_smarty_tpl->tpl_vars['staff_phone']->value;?>
</td>
		</tr>
		<tr>
			<th>备注：</th>
			<td><?php echo $_smarty_tpl->tpl_vars['remark']->value;?>
</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4"><hr></td>
		</tr>
		<tr>
			<th>用户评价:</th>
			<td colspan="3">
				<?php if ($_smarty_tpl->tpl_vars['degree']->value == '-1') {?>
					<span style="color:red">被投诉</span>
				<?php } elseif ($_smarty_tpl->tpl_vars['degree']->value == 'NO_COMMENT') {?>
					未评论
				<?php } elseif ($_smarty_tpl->tpl_vars['degree']->value == '0') {?>
					<div class="msgstar"></div>
					<div class="msgstar"></div>
					<div class="msgstar"></div>
					<div class="msgstar"></div>
					<div class="msgstar"></div>
				<?php } elseif ($_smarty_tpl->tpl_vars['degree']->value == '1') {?>
					<div class="msgstar starred"></div>
					<div class="msgstar"></div>
					<div class="msgstar"></div>
					<div class="msgstar"></div>
					<div class="msgstar"></div>
				<?php } elseif ($_smarty_tpl->tpl_vars['degree']->value == '2') {?>
					<div class="msgstar starred"></div>
					<div class="msgstar starred"></div>
					<div class="msgstar"></div>
					<div class="msgstar"></div>
					<div class="msgstar"></div>
				<?php } elseif ($_smarty_tpl->tpl_vars['degree']->value == '3') {?>
					<div class="msgstar starred"></div>
					<div class="msgstar starred"></div>
					<div class="msgstar starred"></div>
					<div class="msgstar"></div>
					<div class="msgstar"></div>
				<?php } elseif ($_smarty_tpl->tpl_vars['degree']->value == '4') {?>
					<div class="msgstar starred"></div>
					<div class="msgstar starred"></div>
					<div class="msgstar starred"></div>
					<div class="msgstar starred"></div>
					<div class="msgstar"></div>
				<?php } elseif ($_smarty_tpl->tpl_vars['degree']->value == '5') {?>
					<div class="msgstar starred"></div>
					<div class="msgstar starred"></div>
					<div class="msgstar starred"></div>
					<div class="msgstar starred"></div>
					<div class="msgstar starred"></div>
				<?php }?>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="3">
				<?php echo $_smarty_tpl->tpl_vars['comment']->value;?>

			</td>
		</tr>
    </table>

</div><?php }
}
?>