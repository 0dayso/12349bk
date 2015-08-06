jQuery(document).ready(function($) {
	

	jQuery(".stdform").validate({
	});

	$.each($('.smallinput'), function(index, val) {
		$(val).rules("add", {required: true, number: true, max: 1, min: 0, messages: {required: "佣金比例必填", number: "必须是数字", max: "最大不能超过1", min: "必须大于0"}});
	});

});