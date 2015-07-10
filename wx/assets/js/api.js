define(function(require,exports){
	var baseUrl = 'http://api.lk12349.com/';
	return {
		//取消订单
		"cancelOrder"   : baseUrl + "order/cancelOrder",
		//得到订单
		"getOrder"      : baseUrl + "order/getOrder",
		//支付订单
		"payOrder"      : baseUrl + "order/payOrder",
		//再来一次
		"orderOneMore"  : baseUrl + "order/orderOneMore",
		//评论订单
		"orderComment"  : baseUrl + "order/orderComment",
		//得到大类
		"getBigType"    : baseUrl + "service/getBigType",
		//得到小类
		"getSmallType"  : baseUrl + "service/getSmallType",
		//得到相应的备注信息
		"getCommnetItem": baseUrl + "service/getCommnetItem" ,
		//得到服务信息
		"getServiceInfo": baseUrl + "service/getServiceInfo",
		//提交订单
		"sendService"   : baseUrl + "service/sendService",
		//绑定手机
		"bindMobile"    : baseUrl + "login/bindMobile",
		//检测是否绑定手机
		"checkBind"     : baseUrl + "login/checkBind",
		//得到banner图
		"getBanner"     : baseUrl + "ad/getBanner",
		//得到用户信息
		"getUserInfo"   : baseUrl + "my/getUserInfo",
		//得到使用记录
		"getCoupenUse"  : baseUrl + "my/getCoupenUse",
		//提交评论
		"commentSubmit" : baseUrl + "my/submitComment/",
		//获得优惠券列表
		"getCoupList"   : baseUrl + "my/getCoupList/",
	}
})