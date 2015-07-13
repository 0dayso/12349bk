jQuery(document).ready(function($) {
	
	jQuery('input:radio, select.uniformselect, input:file').uniform();


	// 初始化默认值
	if($('#hideItems').val()) {
		var splitArray  = $('#hideItems').val().split(',');
		$('#item_ids').val(splitArray);
	}

	jQuery(".chzn-select").chosen({no_results_text: "找不到选项!", include_group_label_in_selected: true}).change(function(event) {
		var id = $(this).attr("id");
        if($(this).valid())
            $("#"+id+"_chosen").removeClass("error");
        else
            $("#"+id+"_chosen").addClass("error");
	});

	jQuery(".stdform").validate({
		rules: {
			shop_name: "required",
			item_ids: "required",
			region_id: "required",
			address: "required",
			officer: "required",
			bank: "required",
			phone: "required",
			bank_account_name: "required",
			bank_accunt: "required"
		},
		messages: {
			shop_name: "请填写商家名称",
			item_ids: "请选择商家类型",
			region_id: "请选择区域",
			address: "请填写详细地址",
			officer: "请填写负责人",
			bank: "请填写开户银行",
			phone: "请填写手机号码",
			bank_account_name: "请填写银行账户",
			bank_accunt: "请填写收款账户"
		},
        errorPlacement : function(error, element) {  
        	if(element.attr('type') == 'file') {
            	element.parent('.uploader').after(error);  
        	}else{
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


});