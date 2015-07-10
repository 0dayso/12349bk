<?php /* Smarty version 3.1.27, created on 2015-07-10 09:05:50
         compiled from "E:\myphp\www\12349bk\backend\view\user\login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3274559f1a6e0d7ff5_35282817%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '460ee893b5a7ce097005696a21a6f5f585e36452' => 
    array (
      0 => 'E:\\myphp\\www\\12349bk\\backend\\view\\user\\login.tpl',
      1 => 1436144743,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3274559f1a6e0d7ff5_35282817',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_559f1a6e227f48_43940928',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559f1a6e227f48_43940928')) {
function content_559f1a6e227f48_43940928 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3274559f1a6e0d7ff5_35282817';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>登录 - 楼口12349</title>
<link rel="stylesheet" href="/public/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="/public/css/plugins/jquery.loadmask.spin.css" type="text/css" />
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

<body class="loginpage">
    <div class="loginbox">
        <div class="loginboxinner">
            
            <div class="logo">
                <h1 class="logo">楼口<span>12349</span></h1>
                <span class="slogan">后台管理系统</span>
            </div><!--logo-->
            
            <br clear="all" /><br />
            
            <div class="nousername">
                <div class="loginmsg">请填写用户名.</div>
            </div><!--nousername-->
            
            <div class="username">
                <div class="usernameinner">
                    <input type="text" name="username" id="username" />
                </div>
            </div>
            
            <div class="password">
                <div class="passwordinner">
                    <input type="password" name="password" id="password" />
                </div>
            </div>  
            
            <button id="login_btn">登录</button>
            
            <div class="keep"><input type="checkbox" name="remember_me" id="remember_me"/> 记住密码</div>
            
            
        </div><!--loginboxinner-->
    </div><!--loginbox-->

    <?php echo '<script'; ?>
 type="text/javascript" src="/public/js/plugins/jquery-1.7.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/public/js/plugins/jquery-ui-1.8.16.custom.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/public/js/plugins/jquery.cookie.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/public/js/plugins/jquery.uniform.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/public/js/plugins/spin.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/public/js/plugins/jquery.loadmask.spin.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/public/js/custom/general.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/public/js/custom/login.js"><?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
?>