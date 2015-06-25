<?php /* Smarty version 3.1.27, created on 2015-06-25 21:14:23
         compiled from "E:\myphp\www\12349bk\view\user\login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:23554558bfeaf59a405_26632531%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbc9d631ae80a3de636c4eb9110f1211e68a1d9f' => 
    array (
      0 => 'E:\\myphp\\www\\12349bk\\view\\user\\login.tpl',
      1 => 1435200384,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23554558bfeaf59a405_26632531',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_558bfeaf709765_48817001',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_558bfeaf709765_48817001')) {
function content_558bfeaf709765_48817001 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '23554558bfeaf59a405_26632531';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>登录 - 楼口12349</title>
<link rel="stylesheet" href="/public/css/style.default.css" type="text/css" />
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
 type="text/javascript" src="/public/js/custom/general.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/public/js/custom/index.js"><?php echo '</script'; ?>
>
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
                <div class="loginmsg">密码不正确.</div>
            </div><!--nousername-->
            
            <div class="nopassword">
                <div class="loginmsg">密码不正确.</div>
                <div class="loginf">
                    <div class="thumb"><img alt="" src="images/thumbs/avatar1.png" /></div>
                    <div class="userlogged">
                        <h4></h4>
                        <a href="index.html">Not <span></span>?</a> 
                    </div>
                </div><!--loginf-->
            </div><!--nopassword-->
            
            <form id="login" action="#" method="post">
                
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
                
                <button>登录</button>
                
                <div class="keep"><input type="checkbox" /> 记住密码</div>
            
            </form>
            
        </div><!--loginboxinner-->
    </div><!--loginbox-->


</body>
</html>
<?php }
}
?>