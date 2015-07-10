define(function(require,exports){
		$ = require("jquery");
		require("timeSelect")($);

	    var attachFastClick = require('fastclick');
	 	var Mobilebone      = require("mb");
	 	var iScroll         = require("is");
	 	var base            = require("base");


	 	//fastclick
	    attachFastClick(document.body);
	    Mobilebone.init();

	    require('sb')($);


		//*****时间选择
		var yy  = new Date().getFullYear();
	    var mm  = new Date().getMonth() + 1;
	    var dd  = new Date().getDate();
	    var hh  = new Date().getHours();
	    var min = new Date().getMinutes();
	    var ddN = 0;
	    var hhN = 0;

		console.dir(window.location.hash);

		dayDelay = $("#services").attr("data-time");
	    console.log(dayDelay);



		if( dayDelay > 23 ){
			dayDelay = parseInt(dayDelay / 24) ;
			ddN      = dd + dayDelay;
			hhN      = 0;
		}else{
			ddN      = dd;
			hhN      = hh + parseInt(dayDelay);
		}
 
 

 		var mD = new Date(yy, mm-1, ddN, hhN, 0);

 
	   var opt = {
	   		display    : 'modal', //显示方式
	   		preset     : 'datetime',
            minDate    : mD,
            maxDate    : new Date(yy+1, 12, 30, 15, 44),
            stepMinute : 15,
            setText    : '确定',
            cancelText : '取消',
         　 dayText    : '日',
        	monthText  : '月',
        	yearText   : '年',  
        	hourText   : "时",
			minuteText : "分",
			dateFormat : 'yy-mm-dd',
			dateOrder  : 'yy mm dd',
			timeWheels : 'HHii'
	   }

	    $('#time1').mobiscroll(opt);
 
	    $("#time1").change(function() {})


		//*****备注
		$(".comment-info textarea").val("");
	    $(".comment-attr a").click(function(){
	    	var text = $(".comment-info textarea").val();
	    	var val = $(this).text();
	    	$(".comment-info textarea").val(text+"  "+val);
	    	$(this).remove();
	    })


	    //表单提交
	    //@i : 类型
	    var postData = function(i){
	    	alert(i);
	    }
	    
	    $(".btn-submit").click(function(){

	    	var typeId = $("#services").attr("data-tid");
	    	postData(typeId);

	    })




	    //@滚动条
	    //base.isInit("#containerIn2");
	    base.isInit("#containerOut2");
	    //base.isInit("#containerOut1");
	    //base.isInit("#containerOut1");
	    //base.isInit("#containerOut1");
	    //base.isInit("#containerOut2");


})