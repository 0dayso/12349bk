$(function() {

    /*Banner图初始化*/
    var sW = $(window).width();
    $(".slider").yxMobileSlider({
        width: sW,
        height: 150,
        during: 3000
    });

    /*底部按钮*/
    $(".footer h4").click(function() {
        $(".footer h4").removeClass('active');
        $(this).addClass('active');
    });


    /*评论监听*/
    $(document).on("keyup", ".feedbackText", function() {
        var len = $.trim($(this).val()).length;
        if (len > 6) {
            $(".feebackUp").addClass('active');
        } else {
            $(".feebackUp").removeClass('active');
        }
    })
 
    /*提交评论*/
    $(document).on("click", ".feebackUp", function() {

        var cnt    = $.trim($(".feedbackText").val())
        ,   userid = $("body").attr("data-userid");
        
        if (cnt == "" || cnt.length < 6) {
            alert("输入的评论内容请大于6个汉字！谢谢!");
            return 0;
        }

        $.ajax({
            url: "/MW.php",
            type: 'post',
            dataType: 'json',
            data: {
                "app"      : 'My',
                "act"      : 'submitComment',
                "content"  : cnt,
                "user_id"  : userid
            },
            success: function(data) {
                //alert(JSON.stringify(data));
                if (data['success'] == "true") {
                    alert("谢谢您的建议!");
                    $(".feedbackText").val("");
                    $(".feebackUp").removeClass('active');
                }else{
                    alert("提交失败,请重新提交!");
                }
            },
            error: function(err) {
               // alert(JSON.stringify(err));
                alert("提交失败,请重新提交!");
                //console.dir(err);
            }

        })

    })

})

