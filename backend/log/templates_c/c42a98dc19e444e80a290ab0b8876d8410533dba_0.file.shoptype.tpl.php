<?php /* Smarty version 3.1.27, created on 2015-07-12 23:02:43
         compiled from "F:\MyLocalPHP\AMySite\12349bk\backend\view\shop\shoptype.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1024655a281930bcef9_12489786%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c42a98dc19e444e80a290ab0b8876d8410533dba' => 
    array (
      0 => 'F:\\MyLocalPHP\\AMySite\\12349bk\\backend\\view\\shop\\shoptype.tpl',
      1 => 1436713357,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1024655a281930bcef9_12489786',
  'variables' => 
  array (
    'sers' => 0,
    'key' => 0,
    'cur_ser_id' => 0,
    'item' => 0,
    'subitem' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55a281930d8475_50328319',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55a281930d8475_50328319')) {
function content_55a281930d8475_50328319 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1024655a281930bcef9_12489786';
?>
<div id="contentwrapper" class="contentwrapper">
	<div class="tableoptions dataTables_wrapper" style="text-align: right;">
        <input type="text" class="inner-editor" id="search_text" placeholder="查找类型">&nbsp;
        <button class="radius3" id="search_btn">Search</button>
    </div>
    <table id="shoplist" class="stdtable" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th style="width: 20px;"></th>
				<th>#</th>
				<th>类型名称</th>
				<th>二级类型</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<?php
$_from = $_smarty_tpl->tpl_vars['sers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['__foreach_ser_name'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_ser_name']->value['iteration']++;
$foreach_item_Sav = $_smarty_tpl->tpl_vars['item'];
?>
				<tr id="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="main_ser">
					<td><a href="javascript:void(0);" class="expand_btn" data-id="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><span class="<?php if ($_smarty_tpl->tpl_vars['key']->value == $_smarty_tpl->tpl_vars['cur_ser_id']->value) {?>icon-minus<?php } else { ?>icon-plus<?php }?>">&nbsp;</span></a></td>
					<td><?php echo (isset($_smarty_tpl->tpl_vars['__foreach_ser_name']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_ser_name']->value['iteration'] : null);?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['item']->value['ser_name'];?>
</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>
						<a href="javascript:void(0);" class="btn_link add_item" data-id="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">添加子类</a>
						&nbsp;&nbsp;&nbsp;
						<a href="javascript:void(0);" class="btn_link del_ser" data-id="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">删除</a>
					</td>
				</tr>
				<?php
$_from = $_smarty_tpl->tpl_vars['item']->value['items'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['subitem'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['subitem']->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_subname'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars['subitem']->value) {
$_smarty_tpl->tpl_vars['subitem']->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_subname']->value['iteration']++;
$foreach_subitem_Sav = $_smarty_tpl->tpl_vars['subitem'];
?>
					<tr id="<?php echo $_smarty_tpl->tpl_vars['subitem']->value['item_id'];?>
" class="sub_item<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['key']->value == $_smarty_tpl->tpl_vars['cur_ser_id']->value) {?>show<?php } else { ?>hide<?php }?>">
						<td>&nbsp;</td>
						<td><?php echo (isset($_smarty_tpl->tpl_vars['__foreach_subname']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_subname']->value['iteration'] : null);?>
)</td>
						<td>&nbsp;</td>
						<td><?php echo $_smarty_tpl->tpl_vars['subitem']->value['item_name'];?>
</td>
						<td><a href="javascript:void(0);" class="btn_link del_sub" data-id="<?php echo $_smarty_tpl->tpl_vars['subitem']->value['item_id'];?>
">删除</a></td>
					</tr>
				<?php
$_smarty_tpl->tpl_vars['subitem'] = $foreach_subitem_Sav;
}
?>
			<?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
		</tbody>
    </table>
</div><?php }
}
?>