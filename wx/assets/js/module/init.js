/* php time  2 js date */
function Trans_php_time_to_str(timestamp, n) {
        update = new Date(timestamp * 1000); //时间戳要乘1000
        year = update.getFullYear();
        month = (update.getMonth() + 1 < 10) ? ('0' + (update.getMonth() + 1)) : (update.getMonth() + 1);
        day = (update.getDate() < 10) ? ('0' + update.getDate()) : (update.getDate());
        hour = (update.getHours() < 10) ? ('0' + update.getHours()) : (update.getHours());
        minute = (update.getMinutes() < 10) ? ('0' + update.getMinutes()) : (update.getMinutes());
        second = (update.getSeconds() < 10) ? ('0' + update.getSeconds()) : (update.getSeconds());
        if (n == 1) {
            return (year + '-' + month + '-' + day + ' ' + hour + ':' + minute + ':' + second);
        } else if (n == 2) {
            return (year + '-' + month + '-' + day);
        } else {
            return 0;
        }
}

function showDialog(options){
    var defaultOptions = {
        content : "暂无信息",
        keys : ['取消','确定'],
        showMethod : 'normal',
        needMask : true,
        okFunction : function(){},
        cancelFunction : function(){
            $(".JS_MASK , .JS_ALERT").animate({opacity:0},300,function(){
                $(".JS_MASK , .JS_ALERT").remove();
            });
        },
        maskClickFunction : function(){
            $(".JS_MASK , .JS_ALERT").animate({opacity:0},300,function(){
                $(".JS_MASK , .JS_ALERT").remove();
            });
        }
    };


        defaultOptions=$.extend({},defaultOptions,options);
        
        var obj_key = "";
        for(var i = 0 ; i < defaultOptions.keys.length;i++){
            obj_key += "<a href='javascript:void(0)'>"+defaultOptions.keys[i]+"</a>";
        }

        if(defaultOptions.needMask){
            var obj_mask = "<div class='JS_MASK'></div>";
        }
        
        
        var obj_alert = "<div class='JS_ALERT'><div class='JS_CONTENT'>"+defaultOptions.content+"</div><div class='JS_BTNGROUP'>"+obj_key+"</div></div>";

        $("body").append(obj_mask , obj_alert);

        if(defaultOptions.keys.length == 1){
            $(".JS_BTNGROUP a").eq(0).click(defaultOptions.okFunction);
            $(".JS_BTNGROUP a").eq(0).css({border:"none",width:'100%'});
        }else{
            $(".JS_BTNGROUP a").eq(0).click(defaultOptions.cancelFunction);
            $(".JS_BTNGROUP a").eq(1).click(defaultOptions.okFunction);
            $(".JS_MASK").click(defaultOptions.cancelFunction);
        }
    }

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

function hideMask(callback){
    $(".JS_MASK").animate({opacity:0},300,function(){
        if(callback){
            callback();
        }
        $(".JS_MASK").remove();  
    });
}



/*订单状态*/
var orderStatus = {
    "0": "待审核",
    "1": "待分配",
    "2": "打回",
    "3": "无效",
    "4": "已分配",
    "5": "待支付",
    "6": "已完成",
    "7": "已完成"
};

$(function() {
    //mobilebone初始化
    Mobilebone.init();
    //fastclick初始化
    FastClick(document.body);
    document.addEventListener('touchmove', function(e) {
        e.preventDefault();
    }, false);
    //得到hash
    function getHash() {
        var hash = window.location.hash;
        var hashID = '';
        if (hash.indexOf(".php") != -1) {
            hashID = (window.location.hash.split("#&")[1]).split(".php")[0];
        } else {
            hashID = window.location.hash.split("#&")[1];
        }
        return hashID;
    }




    //生成ISCROLL
    var GPA = [];

    $(".page .ic1").each(function() {
        var idNum = $(this).attr("id") + '';
        var i = idNum.split("c")[1];

        GPA[i] = new IScroll('#c' + i, {
            scrollbars: true,
            mouseWheel: true,
            interactiveScrollbars: true,
            shrinkScrollbars: 'scale',
            fadeScrollbars: true
        });
        GPA[i]._resize();
    })

 
    /*检测hash变化*/
    function doCheck(page_in) {
        var pageID = page_in;
        $(".footer h4").removeClass('active');
        if (pageID == "home") {
            $(".footer h4").eq(0).addClass('active');
        } else if (pageID == "order") {
            $(".footer h4").eq(1).addClass('active');
        } else if (pageID == "my") {
            $(".footer h4").eq(2).addClass('active');
        }
        $(".page").removeClass("in").addClass('out');
        $("#" + pageID).removeClass("out").addClass('in');
    }


    //得到订单列表
    function AJAX_GET_ORDER_LIST(){

        $.ajax({
            url: '/MW.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "user_id": $("body").attr("data-userid"),
                "app": 'order',
                "act": 'getOrderList'
            },
            success: function(data) {
                //alert(JSON.stringify(data));
                if (data['success'] == "true") {
                    $("#order .container").removeClass("none");
                    var dom = "";
                    $("#order .container").empty();
                    for (var i = 0; i < data['data'].length; i += 1) {
                        var mobile = data['data'][i]['phone_mob'] ? data['data'][i]['phone_mob'] : data['data'][i]['phone_tel'] ;
                        var strVar = "";
                        strVar += "<div class=\"order-item\" data-oid="+data['data'][i]['order_sn']+">";
                        strVar += " <p class=\"row2 C\">";
                        strVar += "     <span class=\"l\"><i class=\"icon icon-th\"><\/i>类型:<b>" + data['data'][i]['service_name'] + "-" + data['data'][i]['item_name'] + "<\/b><\/span>";
                        strVar += "     <span class=\"r\"><i class=\"icon icon-bookmark\"><\/i>状态:<b>" + orderStatus[data['data'][i]['status']] + "<\/b><\/span>";
                        strVar += " <\/p>";
                        strVar += " <p class=\"row2\">";
                        strVar += "     <i class=\"icon icon-time\"><\/i>预约时间:<b>"+Trans_php_time_to_str(data['data'][i]['need_time'],2)+"<\/b>";
                        strVar += " <\/p>";
                        strVar += " <p class=\"row2\">";
                        strVar += "     <i class=\"icon icon-map-marker\"><\/i>地址:<b>"+ data['data'][i]['address']  +"<\/b>";
                        strVar += " <\/p>";
                        strVar += " <p class=\"row2\">";
                        strVar += "     <i class=\"icon icon-user\"><\/i>联系人:<b>" + data['data'][i]['contact'] + "(" + mobile + ")<\/b>";
                        strVar += " <\/p>";

                        if( data['data'][i]['status'] == '0' || data['data'][i]['status'] == '1' || data['data'][i]['status'] == '6' || data['data'][i]['status'] == '7' || data['data'][i]['status'] == '3' || data['data'][i]['status'] == '2' ){
                            //待审核 / 待分配 / 已完成 / 已回访
                            strVar += " <p class=\"row2 smBtn-Group\">";
                      
                            strVar += "     <a data-ajax=\"false\" data-reload href=\"./orderInfo.php?oid="+data['data'][i]['order_sn']+"\">详情<\/a>";
                            strVar += " <\/p>";
                  
                        }else if( data['data'][i]['status'] == '4' || data['data'][i]['status'] == '5' ){
                            //待支付
                            strVar += " <p class=\"row2 smBtn-Group\">";
                            strVar += "     <a data-ajax=\"false\" data-reload href=\"./pay/payment.php?oid="+data['data'][i]['order_sn']+"\">支付<\/a>";
                            strVar += "     <a data-ajax=\"false\" data-reload href=\"./orderInfo.php?oid="+data['data'][i]['order_sn']+"\">详情<\/a>";
                            strVar += " <\/p>";

                        }

                        strVar += "<\/div>";
                        dom += strVar;
                    }
                    $("#order .container").append(dom);
                    GPA[30]._resize();
                }else{
                    //alert("没有订单");
                    $("#order .container").addClass("none");
                }
            },
            error: function(err) {
                //alert(JSON.stringify(err));
                //alert("订单列表获取失败");
            }
        })
    }
    //得到优惠券列表
    function AJAX_GET_COUP_LIST(){
        $.ajax({
            url  : '../../../MW.php',
            type : 'POST',
            dataType : 'json',
            data : {
                "app" : "My",
                "act" : "getCoupList",
                "user_id" : $("body").attr("data-userid")
            },
            success : function(data){
               //alert(JSON.stringify(data));
                if( data['success'] == "true" ){
                    //alert("优惠券获取成功");
                    $("#coup .ic2").removeClass("none");
                    var dom = "";
                    $("#coup .ic2").empty();

                    for( var i = 0; i < data['data'].length; i+=1){
                        
                        var str = "";

                        var iid = data['data'][i]['item_id'];

                        if(  iid == 31 ){

                            str += "<a class='cop-item-a' href='./do.php?type=bnLock&time=3&title=(包年)锁具保养&tid=31' data-ajax='false' data-reload >";
                             
                            str += "<p class='cType'><b>券码类型 : </b>家庭服务包年套餐</p>";
                            str += "<p class='cType2'><b>服务项目 : </b>"+ data['data'][i]['ser_name'] + " / " + data['data'][i]['item_name'] +"</p>";
                            str += "<p class='cType2'><b>有效时间 : </b>"+data['data'][i]['begintime']+"至"+data['data'][i]['endtime']+"</p>";
                            str += "<p class='cType2'><b>卡号 : </b>"+data['data'][i]['commoncode']+"</p>";
                            str += "<p class='cType2'><b>密码 : </b>"+data['data'][i]['codepassword']+"</p>";
                            str += "<span class='cTypeIndi'>立即去使用</span>";
                            str += "</a>";

                        }else if( iid == 32 ){

                            str += "<a class='cop-item-a' href='./do.php?type=bnPipe&time=3&title=(包年)管道疏通&tid=32' data-ajax='false' data-reload >"

                            str += "<p class='cType'><b>券码类型 : </b>家庭服务包年套餐</p>";
                            str += "<p class='cType2'><b>服务项目 : </b>"+ data['data'][i]['ser_name'] + " / " + data['data'][i]['item_name'] +"</p>";
                            str += "<p class='cType2'><b>有效时间 : </b>"+data['data'][i]['begintime']+"至"+data['data'][i]['endtime']+"</p>";
                            str += "<p class='cType2'><b>卡号 : </b>"+data['data'][i]['commoncode']+"</p>";
                            str += "<p class='cType2'><b>密码 : </b>"+data['data'][i]['codepassword']+"</p>";
                            str += "<span class='cTypeIndi'>立即去使用</span>";
                            str +="</a>";

                        }else if( iid ==  33){

                            str += "<a class='cop-item-a' href='./do.php?type=bnYYJ&time=24&title=(包年)油烟机清洗&tid=33' data-ajax='false' data-reload >"

                            str += "<p class='cType'><b>券码类型 : </b>家庭服务包年套餐</p>";
                            str += "<p class='cType2'><b>服务项目 : </b>"+ data['data'][i]['ser_name'] + " / " + data['data'][i]['item_name'] +"</p>";
                            str += "<p class='cType2'><b>有效时间 : </b>"+data['data'][i]['begintime']+"至"+data['data'][i]['endtime']+"</p>";
                            str += "<p class='cType2'><b>卡号 : </b>"+data['data'][i]['commoncode']+"</p>";
                            str += "<p class='cType2'><b>密码 : </b>"+data['data'][i]['codepassword']+"</p>";
 							str += "<span class='cTypeIndi'>立即去使用</span>";
                            str +="</a>";

                        }else if( iid == 34){

                            str += "<a class='cop-item-a' href='./do.php?type=bnClean&time=24&title=(包年)两小时保洁&tid=34' data-ajax='false' data-reload >"

                            str += "<p class='cType'><b>券码类型 : </b>家庭服务包年套餐</p>";
                            str += "<p class='cType2'><b>服务项目 : </b>"+ data['data'][i]['ser_name'] + " / " + data['data'][i]['item_name'] +"</p>";
                            str += "<p class='cType2'><b>有效时间 : </b>"+data['data'][i]['begintime']+"至"+data['data'][i]['endtime']+"</p>";
                            str += "<p class='cType2'><b>卡号 : </b>"+data['data'][i]['commoncode']+"</p>";
                            str += "<p class='cType2'><b>密码 : </b>"+data['data'][i]['codepassword']+"</p>";
                            str += "<span class='cTypeIndi'>立即去使用</span>";
                            str +="</a>";

                        }else if( iid == 35){

                            str += "<a class='cop-item-a' href='./do.php?type=bnAirCondition&time=24&title=(包年)空调保养&tid=35' data-ajax='false' data-reload >"

                            str += "<p class='cType'><b>券码类型 : </b>家庭服务包年套餐</p>";
                            str += "<p class='cType2'><b>服务项目 : </b>"+ data['data'][i]['ser_name'] + " / " + data['data'][i]['item_name'] +"</p>";
                            str += "<p class='cType2'><b>有效时间 : </b>"+data['data'][i]['begintime']+"至"+data['data'][i]['endtime']+"</p>";
                            str += "<p class='cType2'><b>卡号 : </b>"+data['data'][i]['commoncode']+"</p>";
                            str += "<p class='cType2'><b>密码 : </b>"+data['data'][i]['codepassword']+"</p>";
                            str += "<span class='cTypeIndi'>立即去使用</span>";
                            str +="</a>";
                        
                        }
                       
                        
                        str += "</div>";

                        dom += str;
                    }
 
                    $("#coup .ic2").append(dom);
                    GPA[10]._resize();

                }else{
                   // alert("没有优惠券记录");
                    //alert("没有优惠券记录");
                    $("#coup .ic2").addClass("none");
                }
            },
            error : function(error){
               // alert(JSON.stringify(error));
               // alert("优惠券列表获取失败");
            }
        })
    }
    //得到优惠券使用记录
    function AJAX_GET_COUP_LOG(){
      $.ajax({
            url  : '../../../MW.php',
            type : 'POST',
            dataType : 'json',
            data : {
                "app" : "My",
                "act" : "getCoupenUse",
                "user_id" : $("body").attr("data-userid")
            },
            success : function(data){
               // alert(JSON.stringify(data));
                if( data['success'] == true ){
                    //alert("得到优惠券使用记录");
                    $("#useLog .ic2").empty();
                    $("#useLog .ic2").removeClass("none");
                    //有优惠券
                    var dom = "";
                    for(var i = 0 ; i < data['data'].length ; i+=1 ){
                        dom += "<p class='coup_use_log_info'>你在"+data['data'][i]['usedtime'] + "使用了一张"+data['data'][i]['coupon_name']+"</p>";
                    }
                   // alert(dom);
                    
                    $("#useLog .ic2").append(dom);
                    GPA[11]._resize();
                }else if(data['success'] == false && data['msg'] == '找不到已使用记录'){
                   //alert("没有优惠券使用记录");
                   $("#useLog .ic2").addClass("none");
                    //没有优惠券
                }
            },
            error : function(error){
               // alert(JSON.stringify(error));
                //alert("优惠券使用记录获取失败!");
            }
        })
    }

    AJAX_GET_ORDER_LIST();
    AJAX_GET_COUP_LIST();
    AJAX_GET_COUP_LOG();



    



    Mobilebone.callback = function(page_in) {

        doCheck(getHash());
        var demo = $(".page.in").find(".ic1").attr("id") + '';
        demo = demo.split("c")[1];
        GPA[demo]._resize();

        if (page_in.id == 'order') {
            //得到订单列表
            AJAX_GET_ORDER_LIST();
        }else if( page_in.id == 'coup' ){
            //alert("coup");
            //得到我的优惠券
            AJAX_GET_COUP_LIST();
        }else if( page_in.id == 'useLog' ){
           // alert("useLog");
            //获取使用记录
            AJAX_GET_COUP_LOG();
        }
    } 
 
    doCheck(getHash());

    //更新
    $(".page .ic1").each(function() {
        var idNum = $(this).attr("id") + '';
        var i = idNum.split("c")[1];
        GPA[i]._resize();
    })
    
})
