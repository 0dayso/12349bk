define(function(require,exports){
	$       = require("jquery");
	notice  = require("notice");
	api     = require("api"); 
	rPublic = require("rPublic");

	//绑定手机
	$(document).on("click",".btn-bind",function(){
		  var tel   =   $(".login-tel").val();
		  var code  =   $(".login-num").val();

		  if( !tel || !code ){
				notice("请填入完整信息");
				return 0;
		  }

		  $.ajax({
			 	url     : api['bindMobile'],
			 	type    : 'post',
			 	dataType     : 'json',
			 	data    : 'content='+cnt+"&userid="+userid,
			 	success : function(data){
			 	
			 		
			 	},
			 	error   : function(err){
			 		rPublic.ajaxFail();
			 	}

			 })
 	})

})