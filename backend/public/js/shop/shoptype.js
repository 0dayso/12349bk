jQuery(document).ready(function($) {
	
	$('.expand_btn').click(function(event) {
		
		var ser_id = $(this).attr('data-id');

		if($(this).find('span').hasClass('icon-plus')) {
			$('.sub_item'+ser_id).removeClass('hide').addClass("show");

			$(this).find('span').removeClass('icon-plus').addClass('icon-minus');
		}else{
			$('.sub_item'+ser_id).removeClass('show').addClass("hide");
			$(this).find('span').removeClass('icon-minus').addClass('icon-plus');
		}

	});


	$('#search_btn').click(function(event) {
		var searchValue = $('#search_text')	.val();

		if($.trim(searchValue)) {
			window.location.href = "../shop/shoptype?search="+searchValue;
		}

	});

	$('.add_item').click(function(event) {
		
		var ser_id = $(this).attr('data-id');
		jPrompt('请填写子类名称', '', '新增子类', function(r) {
            if( r ) {
                jQuery.post('../shop/addSubType', {ser_id: ser_id, sub_item: r}, function(data, textStatus, xhr) {
                    if(data.success) {
                        jQuery.jGrowl("删除成功");
                        window.location.reload();
                    }else{
                        jAlert(data.msg);
                    }
                }, 'json');
            }
        });

	});

});