jQuery(document).ready(function($) {

	jQuery('input:radio, select.uniformselect, input:file').uniform();

	jQuery("#degree").chosen({no_results_text: "找不到选项!", include_group_label_in_selected: true}).change(function(event) {
		var id = $(this).attr("id");
        if($(this).valid())
            $("#"+id+"_chosen").removeClass("error");
        else
            $("#"+id+"_chosen").addClass("error");
	});

	jQuery(".stdform").validate({
		ignore: ":hidden:not(select)",
		rules: {
			comment: "required"
		},
		messages: {
			comment: "请记录回访情况"
		},
        errorPlacement : function(error, element) {  
        	if(element.hasClass('chzn-select')) {
                var id = element.next().attr("id");
                $("#"+id).addClass("error");
                $("#"+id).after(error);
            }else{
				element.after(error);
            }
        }
	});

});