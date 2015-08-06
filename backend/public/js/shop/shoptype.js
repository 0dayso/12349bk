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


	$('.del_ser').click(function(event) {
		var ser_id = $(this).attr('data-id');

		jConfirm("你确认删除此类型？", "需要确认", function(r) {
			if(r) {
				jAlert("暂时不开放删除，请联系管理员");
				$.post('../shop/delService', {ser_id: ser_id}, function(data, textStatus, xhr) {
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

	$('.del_sub').click(function(event) {
		var item_id = $(this).attr('data-id');

		jConfirm("你确认删除此类型？", "需要确认", function(r) {
			if(r) {
				$.post('../shop/delServiceItem', {item_id: item_id}, function(data, textStatus, xhr) {
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

	$('.edit_ser').click(function(event) {
		var ser_id = $(this).attr('data-id');
		var item_name = $(this).attr('data-name');

		jPrompt('请填写新的名称', item_name, '编辑', function(r) {
            if( r ) {
                jQuery.post('../shop/editSerName', {ser_id: ser_id, new_name: r}, function(data, textStatus, xhr) {
                    if(data.success) {
                        jQuery.jGrowl("编辑成功");
                        window.location.reload();
                    }else{
                        jAlert(data.msg);
                    }
                }, 'json');
            }
        });
	});

	$('.edit_sub').click(function(event) {
		var item_id = $(this).attr('data-id');
		var item_name = $(this).attr('data-name');

		jPrompt('请填写新的名称', item_name, '编辑', function(r) {
            if( r ) {
                jQuery.post('../shop/editItemName', {item_id: item_id, new_name: r}, function(data, textStatus, xhr) {
                    if(data.success) {
                        jQuery.jGrowl("编辑成功");
                        window.location.reload();
                    }else{
                        jAlert(data.msg);
                    }
                }, 'json');
            }
        });
	});

});