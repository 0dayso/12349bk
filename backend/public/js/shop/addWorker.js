jQuery(document).ready(function($) {
	
	jQuery('input:radio, select.uniformselect, input:file').uniform();

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
			// health_certificate: "required",
			// health_date: "required",
			// id_front: "required",
			// id_reverse: "required",
			// work_license: "required"
		},
		messages: {
			staff_name: "请填写姓名",
			phone_mob: {
				required: "请填写手机号码",
				digits: "手机号码格式不对",
				range: "手机号长度或者格式不对"
			},
			shop_id: "请选择所属商家"
			// health_certificate: "请上传健康证",
			// health_date: "请填写健康证到期时间",
			// id_front: "请上传身份证正面图",
			// id_reverse: "请上传身份证反面图",
			// work_license: "请上传上岗证"
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