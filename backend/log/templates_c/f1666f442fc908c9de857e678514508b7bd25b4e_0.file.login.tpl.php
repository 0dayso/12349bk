<?php /* Smarty version 3.1.27, created on 2015-07-12 14:47:21
         compiled from "F:\MyLocalPHP\AMySite\12349bk\backend\view\user\login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1122755a20d794b95a1_31756835%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1666f442fc908c9de857e678514508b7bd25b4e' => 
    array (
      0 => 'F:\\MyLocalPHP\\AMySite\\12349bk\\backend\\view\\user\\login.tpl',
      1 => 1436614210,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1122755a20d794b95a1_31756835',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55a20d79663286_89342428',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55a20d79663286_89342428')) {
function content_55a20d79663286_89342428 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1122755a20d794b95a1_31756835';
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