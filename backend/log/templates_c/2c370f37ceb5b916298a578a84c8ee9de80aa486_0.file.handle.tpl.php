<?php /* Smarty version 3.1.27, created on 2015-07-06 16:24:56
         compiled from "E:\myphp\www\12349bk\backend\view\common\handle.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:4423559a3b5807bd76_52916973%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c370f37ceb5b916298a578a84c8ee9de80aa486' => 
    array (
      0 => 'E:\\myphp\\www\\12349bk\\backend\\view\\common\\handle.tpl',
      1 => 1436153382,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4423559a3b5807bd76_52916973',
  'variables' => 
  array (
    'code' => 0,
    'msg' => 0,
    'is_back' => 0,
    'backAct' => 0,
    'gotomsg' => 0,
    'gotourl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_559a3b580878f4_18322089',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559a3b580878f4_18322089')) {
function content_559a3b580878f4_18322089 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '4423559a3b5807bd76_52916973';
?>
<div class="contentwrapper padding10">
	<div class="errorwrapper error404">
    	<div class="errorcontent">
            <h1><?php echo $_smarty_tpl->tpl_vars['code']->value;?>
</h1>
            <h3><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</h3>
            
            <?php if ($_smarty_tpl->tpl_vars['is_back']->value == 1) {?>
            <button class="stdbtn btn_black" onclick="history.back()">点击返回</button> &nbsp; 
            <?php } else { ?>
            <button class="stdbtn btn_black" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['backAct']->value;?>
'">点击返回</button> &nbsp; 
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['gotomsg']->value) {?>
            <button onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['gotourl']->value;?>
'" class="stdbtn btn_orange"><?php echo $_smarty_tpl->tpl_vars['gotomsg']->value;?>
</button>
            <?php }?>
        </div><!--errorcontent-->
    </div><!--errorwrapper-->
</div>   <?php }
}
?>