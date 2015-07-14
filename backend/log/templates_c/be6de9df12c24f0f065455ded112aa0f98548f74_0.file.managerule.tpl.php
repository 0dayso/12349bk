<?php /* Smarty version 3.1.27, created on 2015-07-14 11:54:27
         compiled from "E:\myphp\www\12349bk\backend\view\marketing\managerule.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1023755a487f36fea27_66374492%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be6de9df12c24f0f065455ded112aa0f98548f74' => 
    array (
      0 => 'E:\\myphp\\www\\12349bk\\backend\\view\\marketing\\managerule.tpl',
      1 => 1436771309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1023755a487f36fea27_66374492',
  'variables' => 
  array (
    'type' => 0,
    'ser_items' => 0,
    'rule' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55a487f37c9c56_01953126',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55a487f37c9c56_01953126')) {
function content_55a487f37c9c56_01953126 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'E:\\myphp\\www\\12349bk\\backend\\vender\\smarty\\plugins\\function.html_options.php';

$_smarty_tpl->properties['nocache_hash'] = '1023755a487f36fea27_66374492';
if ($_smarty_tpl->tpl_vars['type']->value == 'add') {?>

<div class="contentwrapper">
	
	<form class="stdform stdform2" action="../marketing/addRule" method="post">
        <p>
        	<label>券码名称：</label>
            <span class="field"><input type="text" name="coupon_name" class="smallinput" /></span>
        </p>
        <p>
            <label>券码类型</label>
            <span class="field">
                <select name="coupon_type" id="coupon_type"  data-placeholder="请选择券码类型" class="chzn-select" style="width:350px;" tabindex="2">
                    <option value="0">现金券</option>
                    <option value="1">满减券</option>
                    <option value="2">服务抵消券</option>
                </select>
            </span>
        </p>
        <p class="p_items">
            <label>服务类型(可多选)：</label>
            <span class="field">
                <select name="item_ids[]" id="item_ids" data-placeholder="请选择类型" class="chzn-select" multiple="multiple" style="width:350px;" tabindex="4">
                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ser_items']->value),$_smarty_tpl);?>

                </select>
            </span>
        </p>
        <p class="p_money">
            <label for="">优惠金额</label>
            <span class="field">
                <input type="text" name="money" id="money" class="smallinput" />
            </span>
        </p>
        <p class="p_minprice">
            <label for="">最低消费金额</label>
            <span class="field">
                <input type="text" name="minprice" id="minprice" class="smallinput" />
            </span>
        </p>
        <p>
            <label for="">有效期类型</label>
            <span class="field">
                <select name="canusetype" id="canusetype"  data-placeholder="请选择有效期类型" class="chzn-select" style="width:350px;" tabindex="2">
                    <option value="0">开始 ~ 结束</option>
                    <option value="1">N天有效</option>
                </select>
            </span>
        </p>
        <p class="p_canuseday">
            <label for="">有效天数</label>
            <span class="field">
                <input type="text" name="canuseday" id="canuseday" class="smallinput" />
            </span>
        </p>
        <p class="p_begintime">
            <label for="">开始时间</label>
            <span class="field">
                <input id="begintime" name="begintime" type="text" class="width100">
            </span>
        </p>
        <p class="p_endtime">
            <label for="">结束时间</label>
            <span class="field">
                <input id="endtime" name="endtime" type="text" class="width100">
            </span>
        </p>
        <p>
            <label for="">最大发放量(0不限制)</label>
            <span class="field">
                <input type="text" name="maxnum" class="smallinput" />
            </span>
        </p>
        <p>
            <label for="">券码前缀</label>
            <span class="field">
                <input type="text" name="prefix" class="smallinput" />
            </span>
        </p>
        <p>
        	<label>是否启用：</label>
            <span class="field formwrapper">
            	<input type="radio" name="isuse" value="1" checked="checked" /> 是 &nbsp; &nbsp;
            	<input type="radio" name="isuse" value="0" /> 否 &nbsp; &nbsp;
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
    
    <form class="stdform stdform2" action="../marketing/editRule" method="post">
        <input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['rule']->value['id'];?>
">
        <p>
            <label>券码名称：</label>
            <span class="field"><input type="text" name="coupon_name" class="smallinput" value="<?php echo $_smarty_tpl->tpl_vars['rule']->value['coupon_name'];?>
"/></span>
        </p>
        <p>
            <label>券码类型</label>
            <span class="field">
                <select name="coupon_type" id="coupon_type"  data-placeholder="请选择券码类型" class="chzn-select" style="width:350px;" tabindex="2">
                    <option value="0" <?php if ($_smarty_tpl->tpl_vars['rule']->value['coupon_type'] == '0') {?>selected="selected"<?php }?>>现金券</option>
                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['rule']->value['coupon_type'] == '1') {?>selected="selected"<?php }?>>满减券</option>
                    <option value="2" <?php if ($_smarty_tpl->tpl_vars['rule']->value['coupon_type'] == '2') {?>selected="selected"<?php }?>>服务抵消券</option>
                </select>
            </span>
        </p>
        <input type="hidden" id="hiden_types" value="<?php echo $_smarty_tpl->tpl_vars['rule']->value['item_ids'];?>
" />
        <p class="p_items">
            <label>服务类型(可多选)：</label>
            <span class="field">
                <select name="item_ids[]" id="item_ids" data-placeholder="请选择类型" class="chzn-select" multiple="multiple" style="width:350px;" tabindex="4">
                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ser_items']->value),$_smarty_tpl);?>

                </select>
            </span>
        </p>
        <p class="p_money">
            <label for="">优惠金额</label>
            <span class="field">
                <input type="text" name="money" id="money" class="smallinput" value="<?php echo $_smarty_tpl->tpl_vars['rule']->value['money'];?>
"/>
            </span>
        </p>
        <p class="p_minprice">
            <label for="">最低消费金额</label>
            <span class="field">
                <input type="text" name="minprice" id="minprice" class="smallinput" value="<?php echo $_smarty_tpl->tpl_vars['rule']->value['minprice'];?>
" />
            </span>
        </p>
        <p>
            <label for="">有效期类型</label>
            <span class="field">
                <select name="canusetype" id="canusetype"  data-placeholder="请选择有效期类型" class="chzn-select" style="width:350px;" tabindex="2">
                    <option value="0" <?php if ($_smarty_tpl->tpl_vars['rule']->value['canusetype'] == "0") {?>selected<?php }?>>开始 ~ 结束</option>
                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['rule']->value['canusetype'] == "1") {?>selected<?php }?>>N天有效</option>
                </select>
            </span>
        </p>
        <p class="p_canuseday">
            <label for="">有效天数</label>
            <span class="field">
                <input type="text" name="canuseday" id="canuseday" class="smallinput"value="<?php echo $_smarty_tpl->tpl_vars['rule']->value['canuseday'];?>
"  />
            </span>
        </p>
        <p class="p_begintime">
            <label for="">开始时间</label>
            <span class="field">
                <input id="begintime" name="begintime" type="text" class="width100" value="<?php echo $_smarty_tpl->tpl_vars['rule']->value['begintime'];?>
" >
            </span>
        </p>
        <p class="p_endtime">
            <label for="">结束时间</label>
            <span class="field">
                <input id="endtime" name="endtime" type="text" class="width100" value="<?php echo $_smarty_tpl->tpl_vars['rule']->value['endtime'];?>
" >
            </span>
        </p>
        <p>
            <label for="">最大发放量(0不限制)</label>
            <span class="field">
                <input type="text" name="maxnum" class="smallinput" value="<?php echo $_smarty_tpl->tpl_vars['rule']->value['maxnum'];?>
"/>
            </span>
        </p>
        <p>
            <label for="">券码前缀</label>
            <span class="field">
                <input type="text" name="prefix" class="smallinput" value="<?php echo $_smarty_tpl->tpl_vars['rule']->value['prefix'];?>
" />
            </span>
        </p>
        <p>
            <label>是否启用：</label>
            <span class="field formwrapper">
                <input type="radio" name="isuse" value="1" <?php if ($_smarty_tpl->tpl_vars['rule']->value['isuse'] == "1") {?>checked="checked"<?php }?> /> 是 &nbsp; &nbsp;
                <input type="radio" name="isuse" value="0" <?php if ($_smarty_tpl->tpl_vars['rule']->value['isuse'] == "0") {?>checked="checked"<?php }?>/> 否 &nbsp; &nbsp;
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