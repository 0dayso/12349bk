<?php
header( 'Content-Type:text/html;charset=utf-8 ');  
include "../bInit.php";
require_once "./lib/WxPay.Api.php";
require_once "./WxPay.JsApiPay.php";
require_once './log.php';
$logHandler= new CLogFileHandler("./logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);
$tools = new JsApiPay();
$openId = $tools->GetOpenid();


if( !$openId ){
    $openId = Session::get("openid");
}


// file_put_contents("g.log", $openId);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>家庭服务包年套餐-楼口12349</title>
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
        <link type="text/css" rel="stylesheet" href="../assets/css/base.css" />
        <style type="text/css">
            body{background:#fff9d4; font-family:"Microsoft Yahei";}
            .zt100{ width: 100%;}
            img.lazy{ }
            .ipt-area{ margin:10px auto; width:95%; border-radius:10px; background:#4184fb;padding:20px;}
            .ipt-area .p1{color:#fff; font-size:11pt;}
            .ipt-area .p2{color:#fff; font-size:9pt;}
            .ipt-area .tel-ipt{ border-radius:5px; display:inline-block; display: block;width:100%; height:45px; line-height: 45px; margin:15px auto; font-family:"Microsoft Yahei"; padding-left:20px; color:#333;}
            .ipt-area .btn-buy{ display: block; width:100%; height:40px; line-height:40px; background:#999; color:#fff; text-align: center; margin:15px auto 10px auto; border-radius:10px; font-size:11pt; }
            .ipt-area .btn-buy.active{ background:#e8340c;}
            #paySuccessPic{ position: absolute; z-index: 10000; left: 0; top:0; width:100%; }

        </style>
    </head>
    <body>

        <div class="zt100">
           <img src="../assets/images/os.png" width="100%" id="paySuccessPic" style="display:none" />
           <img  class="lazy" data-original="../assets/images/zt100/01.jpg" width="100%" />
           <div class="ipt-area">
                <p class="p1">给自己购买/给父母购买/给员工购买</p>
                <p><input type="tel" class="tel-ipt" placeholder="请输入手机号码" /></p>
                <p class="p2">请输入正确的手机号码，以手机号为用户名</p>
                <a href="javascript:void(0)" class="btn-buy">现在购买</a>
           </div>
           <img  class="lazy" data-original="../assets/images/zt100/02.jpg" width="100%" />
           <img class="lazy" data-original="../assets/images/zt100/03.jpg" width="100%" />
           <img  class="lazy" data-original="../assets/images/zt100/04.jpg" width="100%" />
           <img  class="lazy" data-original="../assets/images/zt100/05.jpg" width="100%" />
        </div>
       
           <script type="text/javascript" src="../assets/js/lib/jquery-2.1.1.min.js"></script>
           <script type="text/javascript" src="../assets/js/lib/jquery.lazyload.min.js"></script>
           <script type="text/javascript">

            
            $(function(){

                function showMask(callback){
                    var obj_mask = "<div class='JS_MASK'></div>";
                    $("body").append(obj_mask);
                    $(".JS_MASK").click(function(){
                        if(callback){
                            callback();
                        }
                        hideMask();
                    })
                }


                var openID = "<?php echo $openId ?>";
                //判断字符串是否为数字  
                function checkTel(value){  
                    var temp=/^\d+(\.\d+)?$/;
                    if(temp.test(value)==false){
                        return false;
                    }else{
                        return true;
                    }
                }  

                //lazyload
                $("img.lazy").lazyload();
                //手机号码
                $(".tel-ipt").bind("keyup",function(){
                    var tmp =  $(".tel-ipt").val();
                    if(  $.trim($(".tel-ipt").val()).length == 11  && checkTel( tmp )){
                        $(".btn-buy").addClass("active");
                    }else{
                        $(".btn-buy").removeClass("active");
                    }
                });
           
                var smsMsg    = "亲，您的100元家庭服务包年套餐已购买成功，关注微信公众号(loukou12349)后点击我的包年券进行查看，通过公众号或者致电12349可预约服务。";
                //提交购买
                $(".btn-buy").click(function(){

                    var tel = $(".tel-ipt").val();

                    if( $(this).hasClass("active") ){

                        //购买
                        $.ajax({
                            url  : "MW.php",
                            type : 'post',
                            data : {
                                "app"       : 'Service',
                                "act"       : 'recharge',
                                "phone_mob"  : tel,
                                "open_id"    : openID
                            },
                            dataType : 'json',
                            success : function(data){
                                // alert(tel);
                                if( data['success'] == true ){

                                       var rid = data['r_order_sn'];
                                       //alert(rid);
                                       $.ajax({
                                            url : 'JK.php',
                                            type:"post",
                                            dataType :'json',
                                            data :{
                                                "rid"    : rid,
                                                "openid" : openID,
                                                "mey"    : 100,
                                                "bdy"    : "楼口12349家庭服务包年套餐",
                                                "payType" : 2 
                                            },
                                            success :function(data){
                                                   // alert(5);
                                                   // alert(JSON.stringify(data));
                                                     //调用微信支付接口
                                                    function jsApiCall(){
                                                        WeixinJSBridge.invoke(
                                                            'getBrandWCPayRequest',
                                                            data,
                                                            function(res){
                                                                        if (res.err_msg == "get_brand_wcpay_request:ok") {
                                                                            

                                                                        $.ajax({
                                                                            url : "MW.php",
                                                                            type : "post",
                                                                            dataType : 'json',
                                                                            data :{
                                                                                app : "My",
                                                                                act : "paySuccessLog",
                                                                                type: 1,
                                                                                phone_mob : tel,
                                                                                order_sn  : rid
                                                                            },
                                                                            success : function(){

                                                                            }
                                                                        })


                                                                        //发送短信
                                                                        $.ajax({
                                                                             url: 'MW.php',
                                                                             type: "post",
                                                                             dataType: 'json',
                                                                             data: {
                                                                                "app" : "Sms",
                                                                                "act" : "sendMsg",
                                                                                "phone_mob" : tel,
                                                                                "message" : smsMsg,
                                                                                "type" : 2
                                                                             }, 
                                                                             success: function(data) {
                                                                               // alert(JSON.stringify(data));
                                                                             },
                                                                             error : function(err){
                                                                               // alert(JSON.stringify(err));
                                                                             }
                                                                        })
                                                                        $(".tel-ipt").val("");
                                                                        $(".btn-buy").removeClass("active");
                                                                        // mh_dialogShow("mh_success","购买成功!请进入微信公众平台进行预约服务!",2,true);
                                                                        $("body").animate({scrollTop:0},1);
                                                                        $("#paySuccessPic").css({display:"block"});
                                                                        showMask(function(){
                                                                            $("#paySuccessPic").css({display:"none"});
                                                                            $(".JS_MASK , .JS_ALERT").animate({opacity:0},300,function(){
                                                                                    $(".JS_MASK , .JS_ALERT").remove();
                                                                            });
                                                                        });

                                                                        }else if (res.err_msg == "get_brand_wcpay_request:cancel")  {
                                                                           // alert("支付过程中用户取消");
                                                                        }else{
                                                                            alert("支付失败,请重新支付");
                                                                        }
                                                                    }
                                                            );
                                                    }

                                                    function callpay(){
                                                        if (typeof WeixinJSBridge == "undefined"){
                                                            if( document.addEventListener ){
                                                                document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                                                            }else if (document.attachEvent){
                                                                document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
                                                                document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                                                            }
                                                        }else{
                                                            jsApiCall();
                                                        }
                                                    }
                                                    callpay();
                                            },
                                            error : function(err){
                                                //alert(6);
                                                alert( "购买失败,请重新支付!" );
                                            }

                                       })

                                }else{
                                     alert(data.msg);
                                }
                               

                            },
                            error : function(err){
                                alert("购买失败,请重新支付!");
                            }
                        })

                    }
                    return 0;
                })
            })
    
    </script>
    <?php require_once "./shareConf.php" ?>
    </body>
</html>