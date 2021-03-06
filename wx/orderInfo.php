<?php
include "./bInit.php";

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
$user_id = Session::get("userid");
$order_sn= $_GET['oid'];
$time = date('Y-m-d H:i:s');
$res = $database->query("SELECT A.*, B.*, C.*, D.phone_mob as staff_phone FROM lk_order A 
LEFT JOIN lk_order_address B ON A.order_sn = B.order_sn 
LEFT JOIN lk_order_service C ON A.order_sn = C.order_sn 
LEFT JOIN lk_shopstaff D ON A.staff_id = D.staff_id 
WHERE A.buyer_id = {$user_id} AND A.order_sn = '{$order_sn}'")->fetchAll();

$status = $res[0]['status'];
$orderItem = $res[0]['item_id'];

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>楼口12349</title>
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
        <link type="text/css" rel="stylesheet" href="./assets/css/base.css" />
        <link type="text/css" rel="stylesheet" href="./assets/css/mobilebone.animate.css" />
        <link type="text/css" rel="stylesheet" href="./assets/css/mobilebone.css" />
    </head>
    <body data-userid="<?php echo $user_id ?>">
        <div id="orderInfo" data-reload class="page OutPage orderInfo in" >
            <div class="headerInner">
                <a class="icon_left" href='javascript:void(0)' data-rel="back">
                    <img class="back" src="./assets/images/icon_back.png" width="20" />
                    <span>返回</span>
                </a>
                <div class="title">订单详情</div>
                <?php
                    if( $status < 3 ){
                ?>
                <div class="icon_right"><a href="javascript:void(0)" class="btn-cancel-order">取消</a></div>
                <?php
                    }
                ?>
            </div>
            <div class="ic1" id="c19">
                <div class="ic2 C">
                    <table class="orderInfoTable">
                        <tr>
                        <td class="dk">订单号 :</td>
                        <td>
                            <span class="oID"><?php echo $res[0]['order_sn'] ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="dk">订单状态 :</td>
                        <td><?php echo  $orderStatus[$res[0]['status']] ?></td>
                    </tr>
                    <tr>
                        <td class="dk">预约时间 :</td>
                        <td><?php echo date("Y-m-d H:i",$res[0]['need_time']) ?></td>
                    </tr>
                    <tr>
                        <td class="dk">预约类目 :</td>
                        <td><?php  echo $res[0]['service_name'] . " - " . $res[0]['item_name'] ?></td>
                    </tr>
                    <tr>
                        <td class="dk">预约信息 :</td>
                        <td>
                            <?php
                                if( $res[0]['phone_tel'] ){
                                    $cMobile  =$res[0]['phone_tel'];
                                }else{
                                    $cMobile  =$res[0]['phone_mob'];
                                }
                            ?> 

                            <p><?php echo $res[0]['contact'] ."(" . $cMobile . ")" ?></p>
                            <p><?php echo $res[0]['address'] ?></p>
                        </td>
                    </tr>
                    <?php  if($status == 4 || $status == 5 || $status == 6 || $status == 7){  ?>
                    <tr>
                        <td class="dk">服务商 :</td>
                        <td>
                            <p><?php echo $res[0]['staff_name'] . "(" . $res[0]['staff_phone'] . ")" ?></p>
                            <p><?php echo $res[0]['shop_name'] ?></p>
                        </td>
                    </tr>
                    <?php } ?>
                    </table>
               </div>
           </div>
           <?php  if($status == 4 || $status == 5){ ?>
                <div class="fxBtnGroup">
                    <a href="./pay/payment.php?oid=<?php  echo $_GET['oid'] ?>" data-ajax="false"   data-reload class="goToPay">去支付</a>
                </div>
           <?php } ?>
        </div>
 
    <script type="text/javascript" src="./assets/js/lib/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="./assets/js/lib/mobilebone.js"></script>
    <script type="text/javascript" src="./assets/js/lib/dialog.js"></script>
    <script type="text/javascript" src="./assets/js/lib/fastclick.min.js"></script>
    <script type="text/javascript" src="./assets/js/lib/iscroll.js"></script>
    <script type="text/javascript" src="./assets/js/module/init.js"></script>
    <script type="text/javascript">
    $(function(){

        //取消订单
        $(document).on("click",".btn-cancel-order",function(){


            showDialog({
                content : "是否取消该订单?",
                okFunction : function(){


                        $(".JS_MASK , .JS_ALERT").animate({opacity:0},300,function(){
                            $(".JS_MASK , .JS_ALERT").remove();
                        });

                        $.ajax({
                            url      : 'MW.php',
                            type     : "POST",
                            dataType : "json",
                            data     : {
                                "order_sn" : "<?php echo $_GET['oid'] ?>",
                                "user_id"  : "<?php echo Session::get('userid') ?>", 
                                "app"      : "Order",
                                "act"      : "orderCancel"
                            },
                            success : function(data){
                                //alert(JSON.stringify(data));
                                if( data['success'] == "true" ){
                                    mh_dialogShow("mh_success","订单取消成功",2,true,'home.php');
                                }else if( data['success'] == "false" ){
                                    mh_dialogShow("mh_error",data['msg'],2,true);
                                }
                            },
                            error   : function(err){
                                alert("订单取消失败,请重新取消!");
                            }
                        })
                }
            });

        
        
        })
 
        

    })
    </script>
    <?php require_once "./shareConf.php" ?>
    </body>
</html>