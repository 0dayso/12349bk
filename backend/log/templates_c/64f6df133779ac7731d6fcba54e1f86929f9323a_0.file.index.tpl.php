<?php /* Smarty version 3.1.27, created on 2015-07-12 23:02:43
         compiled from "F:\MyLocalPHP\AMySite\12349bk\backend\view\index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2940955a28193072b62_94862628%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64f6df133779ac7731d6fcba54e1f86929f9323a' => 
    array (
      0 => 'F:\\MyLocalPHP\\AMySite\\12349bk\\backend\\view\\index.tpl',
      1 => 1436614210,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2940955a28193072b62_94862628',
  'variables' => 
  array (
    '_s' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55a281930a1976_81063507',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55a281930a1976_81063507')) {
function content_55a281930a1976_81063507 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2940955a28193072b62_94862628';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
                        <li><a href="/user/accountsetting">账号设置</a></li>
                        <li><a href="/user/logout">退出登录</a></li>
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
    
    <div class="centercontent tables">
    
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


<!-- 通用方法， 检查浏览器是否支持WebSocket技术，并建立Socket链接 -->
<!-- 广播接收机，用于接受及时消息 -->
<?php echo '<script'; ?>
 type="text/javascript">
    
    jQuery(document).ready(function($) {
        
        window.WebSocket = window.WebSocket || window.MozWebSocket;
        if(!window.WebSocket) {
            jAlert("您的浏览器并不支持WebSocket，请更换新式浏览器访问，不然您将不能收到及时消息通知");
            return;
        }

        var socket = new WebSocket("ws://<?php echo $_smarty_tpl->tpl_vars['_s']->value->websocket_url;?>
:<?php echo $_smarty_tpl->tpl_vars['_s']->value->websocket_port;?>
");
        socket.onopen    = function(msg) { 
           // jAlert("Welcome - status "+this.readyState);
           //建立成功
        };

        socket.onmessage = function(msg) { 
            // 广播消息
           jAlert("Received: "+msg.data); 
        };

        socket.onclose   = function(msg) { 
            // 失去链接
           // jAlert("后台消息通知服务停止，代码："+this.readyState); 
        };

    });

<?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
?>