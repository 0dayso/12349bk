<?php /* Smarty version 3.1.27, created on 2015-07-06 16:24:49
         compiled from "E:\myphp\www\12349bk\backend\view\dashboard\managegroup.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:4449559a3b517f08a3_97762456%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3961783cc001b6803b624af537cb130497726031' => 
    array (
      0 => 'E:\\myphp\\www\\12349bk\\backend\\view\\dashboard\\managegroup.tpl',
      1 => 1436167964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4449559a3b517f08a3_97762456',
  'variables' => 
  array (
    'type' => 0,
    'pers' => 0,
    'item' => 0,
    'mainkey' => 0,
    'key' => 0,
    'sub' => 0,
    'group_id' => 0,
    'group_name' => 0,
    'permissions' => 0,
    'is_use' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_559a3b51836db1_69068779',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559a3b51836db1_69068779')) {
function content_559a3b51836db1_69068779 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '4449559a3b517f08a3_97762456';
if ($_smarty_tpl->tpl_vars['type']->value == 'add') {?>

<div class="contentwrapper">
    
    <form class="stdform" action="../dashboard/addgroup" method="post">
        <p>
            <label>用户名：</label>
            <span class="field"><input type="text" name="group_name" class="smallinput" /></span>
        </p>
        <p>
            <label>权限设置：</label>
            <span class="formwrapper">
                <table border="0" cellspacing="0" colspacing="0" style="width: 50%;">
                    <?php
$_from = $_smarty_tpl->tpl_vars['pers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item']->_loop = false;
$_smarty_tpl->tpl_vars['mainkey'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['mainkey']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars['item'];
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</td>
                        <?php
$_from = $_smarty_tpl->tpl_vars['item']->value['subs'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['sub'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['sub']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['sub']->value) {
$_smarty_tpl->tpl_vars['sub']->_loop = true;
$foreach_sub_Sav = $_smarty_tpl->tpl_vars['sub'];
?>
                        <td><input type="checkbox" name="check[<?php echo $_smarty_tpl->tpl_vars['mainkey']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]" /> <?php echo $_smarty_tpl->tpl_vars['sub']->value;?>
 </td>
                        <?php
$_smarty_tpl->tpl_vars['sub'] = $foreach_sub_Sav;
}
?>
                    </tr>
                    <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
                </table>
            </span>
        </p>
        <p>
            <label>是否启用：</label>
            <span class="formwrapper">
                <input type="radio" name="is_use" value="1" checked="checked" /> 是 &nbsp; &nbsp;
                <input type="radio" name="is_use" value="0" /> 否 &nbsp; &nbsp;
            </span>
        </p>

        <br>
        <p class="stdformbutton">
            <button id="submitBtn" class="submit radius2">提交</button>
            <input type="reset" class="reset radius2" value="重置">
        </p>
    </form>

</div>

<?php } else { ?>
<div class="contentwrapper">
    
    <form class="stdform" action="../dashboard/editgroup" method="post">
        <input type="hidden" name="group_id" id="group_id" value="<?php echo $_smarty_tpl->tpl_vars['group_id']->value;?>
">
        <p>
            <label>用户名：</label>
            <span class="field"><input type="text" name="group_name" class="smallinput" value="<?php echo $_smarty_tpl->tpl_vars['group_name']->value;?>
"/></span>
        </p>
        <p>
            <label>权限设置：</label>
            <span class="formwrapper">
                <table border="0" cellspacing="0" colspacing="0" style="width: 50%;">
                    <?php
$_from = $_smarty_tpl->tpl_vars['pers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item']->_loop = false;
$_smarty_tpl->tpl_vars['mainkey'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['mainkey']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars['item'];
?>
                    <?php if (isset($_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['mainkey']->value])) {?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</td>
                        <?php
$_from = $_smarty_tpl->tpl_vars['item']->value['subs'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['sub'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['sub']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['sub']->value) {
$_smarty_tpl->tpl_vars['sub']->_loop = true;
$foreach_sub_Sav = $_smarty_tpl->tpl_vars['sub'];
?>
                        <?php if (in_array($_smarty_tpl->tpl_vars['key']->value,$_smarty_tpl->tpl_vars['permissions']->value[$_smarty_tpl->tpl_vars['mainkey']->value])) {?>
                            <td><input type="checkbox" name="check[<?php echo $_smarty_tpl->tpl_vars['mainkey']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]" checked="checked" /> <?php echo $_smarty_tpl->tpl_vars['sub']->value;?>
 </td>
                        <?php } else { ?>
                            <td><input type="checkbox" name="check[<?php echo $_smarty_tpl->tpl_vars['mainkey']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]" /> <?php echo $_smarty_tpl->tpl_vars['sub']->value;?>
 </td>
                        <?php }?>
                        <?php
$_smarty_tpl->tpl_vars['sub'] = $foreach_sub_Sav;
}
?>
                    </tr>
                    <?php } else { ?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</td>
                        <?php
$_from = $_smarty_tpl->tpl_vars['item']->value['subs'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['sub'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['sub']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['sub']->value) {
$_smarty_tpl->tpl_vars['sub']->_loop = true;
$foreach_sub_Sav = $_smarty_tpl->tpl_vars['sub'];
?>
                            <td><input type="checkbox" name="check[<?php echo $_smarty_tpl->tpl_vars['mainkey']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]" /> <?php echo $_smarty_tpl->tpl_vars['sub']->value;?>
 </td>
                        <?php
$_smarty_tpl->tpl_vars['sub'] = $foreach_sub_Sav;
}
?>
                    </tr>
                    <?php }?>
                    <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
                </table>
            </span>
        </p>
        <p>
            <label>是否启用：</label>
            <span class="formwrapper">
                <input type="radio" name="is_use" value="1" <?php if ($_smarty_tpl->tpl_vars['is_use']->value == '1') {?>checked="checked"<?php }?> /> 是 &nbsp; &nbsp;
                <input type="radio" name="is_use" value="0" <?php if ($_smarty_tpl->tpl_vars['is_use']->value == '0') {?>checked="checked"<?php }?> /> 否 &nbsp; &nbsp;
            </span>
        </p>

        <br>
        <p class="stdformbutton">
            <button id="submitBtn" class="submit radius2">提交</button>
            <input type="reset" class="reset radius2" value="重置">
        </p>
    </form>

</div>
<?php }
}
}
?>