jQuery(document).ready(function($) {
	
	jQuery('input:radio, select.uniformselect, input:file').uniform();

	// 初始化默认值
	if($('#hideItems').val()) {
		var splitArray  = $('#hideItems').val().split(',');
		$('#item_ids').val(splitArray);
	}

	// 初始化默认值
	if($('#hideShop').val()) {
		var splitArray  = $('#hideShop').val().split(',');
		$('#shop_id').val(splitArray);
	}
	
	jQuery(".chzn-select").chosen({no_results_text: "找不到选项!", include_group_label_in_selected: true}).change(function(event) {
		var id = $(this).attr("id");
        if($(this).valid())
            $("#"+id+"_chosen").removeClass("error");
        else
            $("#"+id+"_chosen").addClass("error");
	});

	$('input[name="health_date"]').datepicker({
        dateFormat: "yy-mm-dd",
        showClearButton: true
    });

	jQuery(".stdform").validate({
		rules: {
			staff_name: "required",
			phone_mob: {
				required: true,
				digits:true,
				range:[13000000000,18999999999]
			},
			shop_id: "required"
		},
		messages: {
			staff_name: "请填写姓名",
			phone_mob: {
				required: "请填写手机号码",
				digits: "手机号码格式不对",
				range: "手机号长度或者格式不对"
			},
			shop_id: "请选择所属商家"
		},
        errorPlacement : function(error, element) {  
        	if(element.attr('type') == 'file') {
            	element.parent('.uploader').after(error);  
        	}else{
        		console.log(element);
	        	if(element.hasClass('chzn-select')) {
	                var id = element.next().attr("id");
	                $("#"+id).addClass("error");
	                $("#"+id).after(error);
	            }else{
					element.after(error);
	            }

        	}
        }
	});

	$('#item_ids').rules("add", {required: true, messages: {required: "请选择服务类型"}});
});