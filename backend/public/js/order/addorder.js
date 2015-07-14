jQuery(document).ready(function($) {

	jQuery('input:radio, select.uniformselect, input:file').uniform();

	jQuery(".chzn-select").chosen({no_results_text: "找不到选项!", include_group_label_in_selected: true}).change(function(event) {
		var id = $(this).attr("id");
        if($(this).valid())
            $("#"+id+"_chosen").removeClass("error");
        else
            $("#"+id+"_chosen").addClass("error");
	});

	$('input[name="need_time"]').datepicker({
        dateFormat: "yy-mm-dd",
        showClearButton: true
    });

	jQuery(".stdform").validate({
		ignore: ":hidden:not(select)",
		rules: {
			need_time: "required",
			contact: "required",
			phone_mob: {
				required: true,
				digits:true
			},
			address: "required"
		},
		messages: {
			need_time: "请选择服务时间",
			contact: "请填写联系人",
			phone_mob: {
				required: "请填写联系电话",
				digits: "联系电话格式不对"
			},
			address: "请填写服务地址"
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