$(function() {
    var oid = $(".oID").text(),
        uid = 1,
        iid = 1,
        pMoney = 1,
        pUseCoup = 1;

    /**
     * 支付订单
     */

    function pagOrder() {
        $.ajax({
            url: api['payOrder'],
            type: 'post',
            dataType: 'json',
            data: {
                orderid: oid,
                uid: uid
            },
            success: function(data) {



            },
            error: function(err) {

            }

        })
    }

    $(document).on("click", ".payMoeny", function() {

            pMoney = $.trim($(".inputMoney").val()));



        if (pMoney) {




        } else {
            notice("请输入订单金额");
        }

    })


/**
 * 查看是否有该分类下的优惠券
 */

function hasCoup() {
    $.ajax({
        url: api['hasCoup'],
        type: 'post',
        dataType: 'json',
        data: {
            userid: uid,
            itemid: iid
        },
        success: function(data) {



        },
        error: function(err) {

        }

    })
}

/**
 * 使用免费券去支付
 */
$(document).on("click", "", function() {

})
})
