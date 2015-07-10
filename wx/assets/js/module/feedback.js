define(function(require, exports, module) {
	exports.init = function(page) {
		$      = require("jquery");
	 	api    = require("api"); 
	 	//ajax   = require("ajax");
	 	notice = require("notice");
	 	console.dir(notice);
	 	alert("已加载");
	 	//评论监听
	 	$(document).on("keyup",".feedbackText",function(){

	 		var len = $.trim( $(this).val() ).length;

	 		if( len  > 6 ){
	 			$(".feebackUp").addClass('active');
	 		}else{
	 			$(".feebackUp").removeClass('active');
	 		}

	 	})

	 	//提交评论
		$(document).on("click",".feebackUp",function(){
			 var cnt = $.trim( $(".feedbackText").val() );
			 if(  cnt == "" || cnt.length < 6){
			 	notice("输入的评论内容请大于6个汉字！谢谢!");
			 	return 0;
			 }

			 var userid = 10;

			 $.ajax({
			 	url     : api['commentSubmit'],
			 	type    : 'post',
			 	dataType     : 'json',
			 	data    : 'content='+cnt+"&userid="+userid,
			 	success : function(data){
			 	
			 		if( data['code'] == '1001' ){
			 			
			 			notice("谢谢您的建议!");
			 			$(".feedbackText").val("");
			 			$(".feebackUp").removeClass('active');

			 		}
			 	},
			 	error   : function(err){
			 		console.dir(err);
			 	}

			 })

		})



	}
});