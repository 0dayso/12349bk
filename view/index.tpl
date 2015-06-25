<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>楼口12349 后台管理系统</title>

<!-- Begin styles Rendering -->
{$_s->cssHeader}
<!-- End styles Rendering -->


<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="/public/js/plugins/excanvas.min.js"></script><![endif]-->
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="/public/css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="/public/css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
    <script src="/public/js/plugins/css3-mediaqueries.js"></script>
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
                <span>{$_s->login_user}</span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">
                <div class="userdata">
                    <h4>{$_s->login_user}</h4>
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
    {$_s->leftMenu}
    <!-- End Top-Menu Rendering -->
    
    <div class="vernav2 iconmenu">
        <ul>
            <li><a href="#formsub" class="editor">基本设置</a>
                <span class="arrow"></span>
                <ul id="formsub">
                    <li><a href="#">管理员设置</a></li>
                    <li><a href="#">密码修改</a></li>
                    <li><a href="#">用户组管理</a></li>
                </ul>
            </li>
            <li><a href="#formsub2" class="gallery">订单管理</a>
                <span class="arrow"></span>
                <ul id="formsub2">
                    <li><a href="#">待审核订单</a></li>
                    <li><a href="#">待接单订单</a></li>
                    <li><a href="#">投诉订单</a></li>
                    <li><a href="#">全部订单</a></li>
                </ul>
            </li>
            <li><a href="#formsub3" class="inbox">财务管理</a>
                <span class="arrow"></span>
                <ul id="formsub3">
                    <li><a href="#">商家报表</a></li>
                    <li><a href="#">对账管理</a></li>
                    <li><a href="#">退款处理</a></li>
                    <li><a href="#">保证金管理</a></li>
                </ul>
            </li>
             <li><a href="#formsub4" class="support">营销管理</a>
                <span class="arrow"></span>
                <ul id="formsub4">
                    <li><a href="#">优惠券管理</a></li>
                    <li><a href="#">券码类型管理</a></li>
                </ul>
            </li>
            <li><a href="#formsub5" class="elements">商家管理</a>
                <span class="arrow"></span>
                <ul id="formsub5">
                    <li><a href="#">待审核商家</a></li>
                    <li><a href="#">商家列表</a></li>
                    <li><a href="#">商家类型</a></li>
                    <li><a href="#">回收站</a></li>
                </ul>
            </li>
            <li><a href="#formsub6" class="addons">统计管理</a>
                <span class="arrow"></span>
                <ul id="formsub6">
                    <li><a href="#">商家接单排名</a></li>
                    <li><a href="#">商家评价排名</a></li>
                    <li><a href="#">下单用户排名</a></li>
                    <li><a href="#">服务类型排名</a></li>
                    <li><a href="#">下单地址排名</a></li>
                </ul>
            </li>
            <li><a href="#formsub7" class="tables">手机APP</a>
                <span class="arrow"></span>
                <ul id="formsub7">
                    <li><a href="#">广告位管理</a></li>
                </ul>
            </li>
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->
        
    <div class="centercontent">
    
        <!-- Begin Content Rendering -->
        {include file="{$_s->mainContentLink}" title=foo}
        <!-- End Content Rendering -->
        
        <br clear="all" />
        
    </div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

<!-- Begin Javascript Renderring -->
{$_s->jsHeader}
<!-- End Javascript Renderring -->

</body>
</html>
