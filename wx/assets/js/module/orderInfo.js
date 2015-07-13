$(function() {
    var oid = $(".oID").text(),
        uid = 1;

    getOrderInfo(oid, uid);
    /**
     * 得到订单详情
     */

    function getOrderInfo(id) {

        $.ajax({
            url: api['orderInfo'],
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

    /**
     * 取消订单
     */
    function cancelOrder() {
        $.ajax({
            url: api['orderInfo'],
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
})
