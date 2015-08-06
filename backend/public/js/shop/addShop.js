jQuery(document).ready(function($) {
	
	jQuery('input:radio, select.uniformselect, input:file').uniform();

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
			address: "required",
			// business_license: "required",
			// legal_person: "required",
			officer: "required",
			bank: "required",
			phone: "required",
			bank_account_name: "required",
			bank_accunt: "required"
		},
		messages: {
			shop_name: "请填写商家名称",
			address: "请填写详细地址",
			// business_license: "请上传营业执照",
			// legal_person: "请上传法人身份证",
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
	$('#item_ids').rules("add", {required: true, messages: {required: "请选择服务类型"}});
	$('#region_id').rules("add", {required: true, messages: {required: "请选择区域"}});

});