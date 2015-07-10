<?php
    include "info.php";
    $type        = $_REQUEST['type'];
    $time        = $_REQUEST['time'];
    $reserveTime = 0;
    $title       = $_REQUEST['title'];

?>

 
<?php

    if( $time > 23 ){
        $reserveTime = ($time / 24) . "天";
    }else{
        $reserveTime = $time . "小时";
    }
    
    $type = $_REQUEST['type'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>楼口12349</title>
    <!--meta标签-->
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no, email=no" />
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="MobileOptimized" content="320" />
    <meta name="screen-orientation" content="portrait" />
    <meta name="x5-orientation" content="portrait" />
    <meta name="full-screen" content="yes" />
    <meta name="x5-fullscreen" content="true" />
    <meta name="browsermode" content="application" />
    <meta name="x5-page-mode" content="app" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="author" content="glivia | 286864566" />
    <meta name="application-name" content="楼口12349" />
    <meta name="keywords" content="楼口12349" />
    <meta name="description" content="楼口12349" />

    <!--
    ################################################
    IOS图标
    ################################################
    -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="#" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="#" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="#" />
    <link rel="apple-touch-icon-precomposed" href="#" />
    <link rel="shortcut icon" href="#" />
    <!--
    ################################################
    css
    ################################################
    -->
    <link type="text/css" rel="stylesheet" href="./assets/css/base.css" />
    <link type="text/css" rel="stylesheet" href="./assets/css/mobiscroll.custom-2.5.0.min.css" />
    <link type="text/css" rel="stylesheet" href="./assets/css/mobilebone.animate.css" />
    <link type="text/css" rel="stylesheet" href="./assets/css/mobilebone.css" />
</head>

<body>


<div id="services" data-reload class="page OutPage services in" data-time="<?php  echo $_GET['time'] ?>" data-tid="<?php echo $_GET['tid']  ?>">
    <div class="headerInner">
            <a class="icon_left" href='javascript:void(0)' data-rel="back">
                <img class="back" src="./assets/images/icon_back.png" width="20" />
                <span>返回</span>
            </a>
            <div class="title"><?php echo $title ?></div>
            <div class="icon_right">
                <a href='#servicesContent'>服务说明</a>
            </div>
    </div>
    <div class="content2">
     <div id="containerOut1" class="container-outer">
            <div id="containerIn1" class="container-inner">
                <div class="container C">
                    <!--费用信息-->
                    <!-- <a class="service-info" href='./reserver-info-fix-mqz.html' style="display:block">
                        <p>费用 :人工费<span>30元-80元</span><i class="icon icon-chevron-right r"></i></p>
                    </a> -->
                    <!--填的基本信息-->
                    <div class="basic-info mt20 reserve">
                        <div class="contact-info mt20 reserve">
                        <div class="title"><span>联系人信息</span></div>
                         <div class="row">
                            <span><i class="icon icon-map-marker"></i>预约地址</span>
                            <input type="text" value="" name="" />
                        </div>
                        <div class="row">
                            <span><i class="icon icon-time"></i>预约时间</span>
                            <input type="text" value="" name="reserver-time" id="time1" placeholder="请至少提前<?php  echo $reserveTime ?>预定" />
                        </div>
                        <div class="row">
                            <span><i class="icon icon-user"></i>联系人</span>
                            <input type="tel" value="" name="username" />
                        </div>
                        <div class="row">
                            <span><i class="icon icon-phone"></i>电话</span>
                            <input type="text" value="" name="phone" />
                        </div>
                    </div>

                        <div class="comment-info mt20 reserve js_comment_info">
                            <!--联系人信息-->
                    

                            <div class="row">
                                <span><i class="icon icon-comment"></i>备注信息</span>
                                <textarea></textarea>
                            </div>

                            <!--煤气灶-->
                            <div class="comment-attr js_rst_item js_rst_mqz C">
                                
                                <!--添加快捷标签-->

                                <?php

                               

                                    for( $i = 0; $i < count($info[$type]['commentChoose']) ; $i+=1 ){

                                            echo "<a href='javascript:void(0)'><i class='icon icon-plus'></i>".$info[$type]['commentChoose'][$i]."</a>";

                                    }

                                

                                ?> 
                               
                            </div>
                    </div>
                    </div>
                    
                </div>
        </div>
        </div>
    </div>
    <a href="#" class="btn-submit">立即下单</a>

</div>



<div id="servicesContent" data-reload class="page OutPage servicesContent out" >
    <div class="headerInner">
            <a class="icon_left" href='javascript:void(0)' data-rel="back">
                <img class="back" src="./assets/images/icon_back.png" width="20" />
                <span>返回</span>
            </a>
        <div class="title">服务说明</div>
    </div>
   <div class="content3 C">
                <div class="container C">
                    
                <div class="title-nav"><i class="icon icon-yen"></i> 费用透明</div>
                <div class="descrition-content C">
                     <?php
                        echo $info[$type]['fee'];
                     ?>
                </div>
                <div class="title-nav"><i class="icon icon-transfer"></i> 服务流程</div>
                <div class="descrition-content C">
                     <?php
                        echo $info[$type]['process'];
                     ?>
                </div>
                <div class="title-nav"><i class="icon icon-thumbs-up"></i> 温馨提示</div>
                <div class="descrition-content C">
                     <?php
                        echo $info[$type]['notice'];
                     ?>
                </div>
        </div>
    </div>


</div>



<script type="text/javascript" src="./assets/js/sea.js"></script>
<script type="text/javascript">
    seajs.use("./assets/js/seaConfig.js",function(){
        seajs.use("./assets/js/services.js");
    });
</script>
</body>
</html>