<?php /* Smarty version 3.1.27, created on 2015-07-01 17:08:17
         compiled from "E:\myphp\www\12349bk\view\index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:685593ae0118ccd4_30486464%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb0484128314bcff76ff85ad52f1edb370387579' => 
    array (
      0 => 'E:\\myphp\\www\\12349bk\\view\\index.tpl',
      1 => 1435741695,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '685593ae0118ccd4_30486464',
  'variables' => 
  array (
    '_s' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5593ae011c37e0_35503851',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5593ae011c37e0_35503851')) {
function content_5593ae011c37e0_35503851 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '685593ae0118ccd4_30486464';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>楼口12349 后台管理系统</title>

<!-- Begin styles Rendering -->
<?php echo $_smarty_tpl->tpl_vars['_s']->value->cssHeader;?>

<!-- End styles Rendering -->


<!--[if lte IE 8]><?php echo '<script'; ?>
 language="javascript" type="text/javascript" src="/public/js/plugins/excanvas.min.js"><?php echo '</script'; ?>
><![endif]-->
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="/public/css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="/public/css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="/public/js/plugins/css3-mediaqueries.js"><?php echo '</script'; ?>
>
<![endif]-->
</head>

<body class="withvernav">
<div class="bodywrapper">
    <div class="topheader">
        <div class="left">
           <h1 class="logo">楼口<span>12349</span></h1>
            <span class="slogan">后台管理系统</span>
            <br clear="all" />
        </div><!--left-->
        
        <div class="right">
            <div class="userinfo">
                <span><?php echo $_smarty_tpl->tpl_vars['_s']->value->login_user;?>
</span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">
                <div class="userdata">
                    <h4><?php echo $_smarty_tpl->tpl_vars['_s']->value->login_user;?>
</h4>
                    <ul>
                        <li><a href="editprofile.html">Edit Profile</a></li>
                        <li><a href="accountsettings.html">Account Settings</a></li>
                        <li><a href="help.html">Help</a></li>
                        <li><a href="index.html">Sign Out</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    
    <!-- Begin Top-Menu Rendering -->
    <div class="vernav2 iconmenu">
        <ul>
            <?php echo $_smarty_tpl->tpl_vars['_s']->value->leftMenu;?>

        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div>
    <!-- End Top-Menu Rendering -->
    
    <div class="centercontent">
    
        <!-- Begin Content Rendering -->
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['_s']->value->mainContentLink), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0);
?>

        <!-- End Content Rendering -->
        
        <br clear="all" />
        
    </div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

<!-- Begin Javascript Renderring -->
<?php echo $_smarty_tpl->tpl_vars['_s']->value->jsHeader;?>

<!-- End Javascript Renderring -->

</body>
</html>
<?php }
}
?>