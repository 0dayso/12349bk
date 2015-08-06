<?php
ini_set('date.timezone','Asia/Shanghai');
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

?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>楼口12349</title>
        <!--meta标签-->
        <!--测试阶段-->
      <!--   <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" /> -->
        <!--测试阶段-->
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
        <meta name="keywords" content="楼口12349" />
        <meta name="description" content="楼口12349" />
        <link type="text/css" rel="stylesheet" href="../assets/css/base.css" />
        <link type="text/css" rel="stylesheet" href="../assets/css/mobilebone.animate.css" />
        <link type="text/css" rel="stylesheet" href="../assets/css/mobilebone.css" />
    </head>
    <body data-userid="<?php echo Session::get("userid") ?>">  
        <?php

                    $orderStatus = array(
                        "0" => '待审核',
                        "1" => '待分配',
                        "2" => '打回',
                        "3" => '无效',
                        "4" => '已分配',
                        "5" => '待支付',
                        "6" => '已完成',
                        "7" => '已完成'
                    );
                    $user_id  = Session::get("userid");
                    $order_sn = $_GET['oid'];
                    $time     = date('Y-m-d H:i:s');


                    $res = $database->query("SELECT A.*, B.*, C.*, D.phone_mob as staff_phone FROM lk_order A 
            LEFT JOIN lk_order_address B ON A.order_sn = B.order_sn 
            LEFT JOIN lk_order_service C ON A.order_sn = C.order_sn 
            LEFT JOIN lk_shopstaff D ON A.staff_id = D.staff_id 
            WHERE A.buyer_id = {$user_id} AND A.order_sn = '{$order_sn}'")->fetch();
                    
                    $status    = $res['status'];
                    $orderItem = $res['item_id'];
                    $sName     = $res['service_name'];
                    $iName     = $res['item_name'];
                    $res2 = $database->select("lk_coup_list", "*", array(
                        "AND" => array(
                            "user_id" => $user_id, 
                            "item_id" => $orderItem,
                            "isuse" => 1,
                            "order_sn" => $order_sn,
                            "pay_confirm" => 0
                        )
                    )); 
               //     file_put_contents("g.log",print_r($database,1));

        ?>
        <!--订单支付-->
        <div id="orderPay" data-reload class="page OutPage orderPay ">
            <div class="headerInner">
                <a class="icon_left" href='javascript:void(0)' data-rel="back">
                    <img class="back" src="../assets/images/icon_back.png" width="20" />
                    <span>返回</span>
                </a>
                <div class="title">订单支付</div>
            </div>
            <div class="ic1 C" id="c20">
            <div class="ic2 C">
                
                <table class="orderInfoTable">
                    <tr>
                        <td class="dk">订单号 :</td>
                        <td>
                            <span class="oID"><?php echo $res['order_sn'] ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="dk">订单状态 :</td>
                        <td><?php echo  $orderStatus[$res['status']] ?></td>
                    </tr>
                    <tr>
                        <td class="dk">预约时间 :</td>
                        <td><?php echo date("Y-m-d H:i",$res['need_time']) ?></td>
                    </tr>
                    <tr>
                        <td class="dk">预约类目 :</td>
                        <td><?php  echo $res['service_name'] . " - " . $res['item_name'] ?></td>
                    </tr>
                    <tr>
                        <td class="dk">预约信息 :</td>
                        <td>
                            <?php

                                    if( $res['phone_mob'] ){
                                        $mobile = $res['phone_mob'];
                                    }else{
                                        $mobile = $res['phone_tel'];
                                    }

                            ?>

                            <p><?php echo $res['contact'] ."(" . $mobile . ")" ?></p>
                            <p><?php echo $res['address'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="dk">服务商 :</td>
                        <td>
                            <p><?php echo $res['staff_name'] . "(" . $res['staff_phone'] . ")" ?></p>
                            <p><?php echo $res['shop_name'] ?></p>
                        </td>
                    </tr>
                

                </table>
            </div>
            </div>

            <div class="fxBtnGroup2">
                <?php

                    if( $res2 ){
                    
                ?>
                    <a href="javascript:void(0)"  data-coupid="<?php  echo $res2[0]['id'] ?>" class="list-item useFreeCoup">您有一张<?php echo $iName ?>包年券,<b>立即使用</b></a>
                <?php
                    }
                ?>
                <div class="inputMoneyOut l">
                    <input type="tel" class="inputMoney" placeholder="服务金额" /><span>元</span>
                </div>
                
                <a href="javascript:void(0)" class="payMoeny r">去支付</a>
                <a href="#orderPaySuccess" class="demoClick"></a>
            </div>
        </div>
        
        <!--支付成功-->
        <div id="orderPaySuccess" data-reload class="page OutPage orderPaySuccess out" >
            <div class="headerInner">
                <a class="icon_left" href='javascript:void(0)' data-rel="back">
                    <img class="back" src="./assets/images/icon_back.png" width="20" />
                    <span>返回</span>
                </a>
                <div class="title">支付成功</div>
            </div>
            <div class="ic1 C" id="c21">
            <div class="ic2">
                    <img src="./assets/images/icon_pay_ok.png" width="60%" />
                    <a href="./index.php">返回首页</a>
                    </div>
            </div>
        </div>


    
    <script type="text/javascript" src="../assets/js/lib/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../assets/js/lib/mobilebone.js"></script>
    <script type="text/javascript" src="../assets/js/lib/iscroll.js"></script>
    <script type="text/javascript" src="../assets/js/lib/dialog.js"></script>
    <script type="text/javascript" src="../assets/js/lib/fastclick.min.js"></script>
    <script type="text/javascript" src="../assets/js/module/init.js"></script>
 
    <script type="text/javascript">
    $(function(){
        var oid       = "<?php echo $_GET['oid'] ?>";
        var phone_mob = "<?php echo $res['staff_phone'] ?>";
        var smsMsg    = "您服务的订单【"+oid+"】已支付完成，感谢您的倾力服务.";
        var openID = "<?php echo $openId ?>";

        //支付在线支付
        $(document).on("click",".payMoeny",function(){
            if( !$.trim( $(".inputMoney").val() ) || !(/^[0-9]*$/.test($.trim($(".inputMoney").val())))){
                $(".inputMoney").val("");
                alert("请输入金额");
                return 0;
            }
        
            // $order_sn , $user_id , $coupon_id $money
            var mey = $.trim( $(".inputMoney").val() );
            $.ajax({
                url : "MW.php",
                type : "POST",
                dataType : 'json',
                data : {
                    "order_sn" : "<?php echo $_GET['oid'] ?>",
                    "user_id"  : "<?php echo Session::get('userid') ?>",
                    "money"    : mey,
                    "app"      : "Order",
                    "act"      : "orderPay"
                },
                success : function(data){
                   // alert(JSON.stringify(data));
                    var price = data['order_amount'];
                    var oid   = data['order_sn'];
                    //alert('订单生成成功');
                    //订单生成成功
                    $.ajax({
                        url      : "JK.php",
                        type     : "POST", 
                        dataType : 'json',
                        data     : {
                            "oid"     : oid,
                            "mey"     : price,
                            "bdy"     : "楼口12349服务",
                            "openid"  : openID,
                            "payType" : 1
                        },
                        success : function(data){
                            //alert(JSON.stringify(data));
                            function jsApiCall(){
                                WeixinJSBridge.invoke(
                                    'getBrandWCPayRequest',
                                    data,
                                    function(res){
                                        //alert(JSON.stringify(res));
                                        if (res.err_msg == "get_brand_wcpay_request:ok") {

                                            $.ajax({
                                                url : "MW.php",
                                                type : "post",
                                                dataType : 'json',
                                                data :{
                                                    app : "My",
                                                    act : "paySuccessLog",
                                                    type: 2,
                                                    phone_mob : "<?php echo $mobile ?>",
                                                    order_sn  : oid
                                                },
                                                success : function(){

                                                }
                                            })

                                            $.ajax({
                                                 url: 'MW.php',
                                                 type: "post",
                                                 dataType: 'json',
                                                 data: {
                                                    "app" : "Sms",
                                                    "act" : "sendMsg",
                                                    "phone_mob" : phone_mob,
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


                                            mh_dialogShow("mh_success","订单支付成功!",2,true,'../home.php');
                                        }else if (res.err_msg == "get_brand_wcpay_request:cancel")  {
                                            //alert("支付过程中用户取消");
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
                           //alert(JSON.stringify(err));
                           // alert("<?php echo $_GET['oid'] ?> " + openID + "  "+ mey);
                           alert( "支付失败,请重新支付!" );
                        }
                    })
                },
                error : function(err){
                    alert("支付失败,请重新支付!");
                }
            })
        })
    


    


         $(document).on("click",".useFreeCoup",function(){
            var code = $(this).attr("data-coupid");
            //确认是否使用优惠券
            showDialog({
                content : "确认使用包年券?",
                okFunction : function(){
                    $(".JS_MASK , .JS_ALERT").animate({opacity:0},300,function(){
                        $(".JS_MASK , .JS_ALERT").remove();
                    });

                    

                    $.ajax({
                        url      : "MW.php",
                        type     : "POST",
                        dataType : 'json',
                        data     : {
                            "order_sn" : "<?php echo $_GET['oid'] ?>",
                            "coupon_id" : code,
                            "user_id"  : "<?php echo Session::get('userid') ?>",
                            "money"    : 0,
                            "app"      : "Order",
                            "act"      : "orderPay"
                        },
                        success : function(data){
                            if( data['success'] == true ){

                                 $.ajax({
                                    url : "MW.php",
                                    type : "post",
                                    dataType : 'json',
                                    data :{
                                        app : "My",
                                        act : "paySuccessLog",
                                        type: 3,
                                        phone_mob : "<?php echo $mobile ?>",
                                        order_sn  : oid
                                    },
                                    success : function(){

                                    }
                                })

                                 $.ajax({
                                     url: 'MW.php',
                                     type: "post",
                                     dataType: 'json',
                                     data: {
                                        "app" : "Sms",
                                        "act" : "sendMsg",
                                        "phone_mob" : phone_mob,
                                        "message" : smsMsg,
                                        "type" : 2
                                     },
                                     success: function(data) {
                                        //alert(JSON.stringify(data));
                                     },
                                     error : function(err){
                                        //alert(JSON.stringify(err));
                                     }
                                 })
                                

                                mh_dialogShow("mh_success","订单支付成功!",2,true,'../home.php');
                             
                               
                            }else{
                                alert(data['msg']);
                            }

                        },
                        error : function(err){
                            alert("使用失败,请重新使用!");
                        }
                    });
                }
            });   

        })
     
    })
    </script>
    <?php require_once "../shareConf.php" ?>
    </body>
</html>