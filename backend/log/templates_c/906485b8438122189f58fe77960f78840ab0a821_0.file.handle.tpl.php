<?php /* Smarty version 3.1.27, created on 2015-07-12 15:48:00
         compiled from "F:\MyLocalPHP\AMySite\12349bk\backend\view\common\handle.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3029055a21bb0d45216_42810151%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '906485b8438122189f58fe77960f78840ab0a821' => 
    array (
      0 => 'F:\\MyLocalPHP\\AMySite\\12349bk\\backend\\view\\common\\handle.tpl',
      1 => 1436614210,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3029055a21bb0d45216_42810151',
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
  'unifunc' => 'content_55a21bb0d50d92_33346246',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55a21bb0d50d92_33346246')) {
function content_55a21bb0d50d92_33346246 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3029055a21bb0d45216_42810151';
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