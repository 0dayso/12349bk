$(function() {


    /*时间选择*/
    var yy = new Date().getFullYear();
    var mm = new Date().getMonth() + 1;
    var dd = new Date().getDate();
    var hh = new Date().getHours();
    var min = new Date().getMinutes();
    var ddN = 0;
    var hhN = 0;

    dayDelay = $("#services").attr("data-time");

    if (dayDelay > 23) {
        dayDelay = parseInt(dayDelay / 24);
        ddN = dd + dayDelay;
        hhN = 0;
    } else {
        ddN = dd;
        hhN = hh + parseInt(dayDelay);
    }

    var mD = new Date(yy, mm - 1, ddN, hhN, 0);

    var opt = {
        display: 'modal', //显示方式
        preset: 'datetime',
        minDate: mD,
        maxDate: new Date(yy + 1, 12, 30, 15, 44),
        stepMinute: 15,
        setText: '确定',
        cancelText: '取消',
        　dayText: '日',
        monthText: '月',
        yearText: '年',
        hourText: "时",
        minuteText: "分",
        dateFormat: 'yy-mm-dd',
        dateOrder: 'yy mm dd',
        timeWheels: 'HHii'
    }

    $('#time1').mobiscroll(opt);

    $("#time1").change(function() {})


    /**
     * 备注处理
     */

    $(".comment-info textarea").val("");

    $(document).on("click", ".comment-attr a", function() {
        var text = $(".comment-info textarea").val();
        var val = $(this).text();
        $(".comment-info textarea").val(text + "  " + val);
        $(this).remove();
    })


    /*检测表单字段是否合法*/

    function checkInputValidate() {
        var c_doAdd = $.trim($(".do_address").val()).length;
        var c_doUser = $.trim($(".do_users").val()).length;
        var c_doTime = $.trim($(".do_time").val()).length;
        var c_doTel = $.trim($(".do_tel").val()).length;
        if (c_doAdd && c_doUser && c_doTime && c_doTel == 11 && (/^[0-9]*$/.test($.trim($(".do_tel").val())))) {
            $(".btn-submit").addClass("active");
            return true;
        } else {
            $(".btn-submit").removeClass("active");
            return false;
        }
    }

    /*文本框输入监听*/

    $(document).on("keyup , change", ".do_address , .do_users , .do_time , .do_tel", function() {
        checkInputValidate();
    })

    /*提交订单*/

    $(document).on("click", ".btn-submit", function() {

        if(  $(this).hasClass("active") ){
       
            if (checkInputValidate()) {
              
                var userId = $("body").attr("data-userid"),
                    reTime = $(".do_time").val(),
                    reName = $(".do_users").val(),
                    reAdd  = $(".do_address").val(),
                    reCmt  = $(".comment-info textarea").val(),
                    reSId  = $("#services").attr("data-iid"),
                    reTel  = $(".do_tel").val();
                
                $.ajax({
                    url: "/MW.php",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        "app"       : "service",
                        "act"       : "sendService",
                        "user_id"   : userId,
                        "item_id"   : reSId,
                        "need_time" : reTime,
                        "contact"   : reName,
                        "phone_mob" : reTel,
                        "address"   : reAdd,
                        "remark"    : reCmt
                    },
                    success: function(data) {
                        //alert(JSON.stringify(data));
                        if (data['success'] == true) {
                            mh_dialogShow("mh_success","订单提交成功，请耐心等待",2,true,'./home.php#&order');
                        } else {
                            mh_dialogShow("mh_error",data['msg'],3,true);
                        }

                    },
                    error: function(err) {
                      //  alert(JSON.stringify(err));
                        alert("提交订单失败");
                    }
                })

            } else {
                $(".btn-submit").removeClass("active");
            }


        }else{
            return 0;
        }
    })



})