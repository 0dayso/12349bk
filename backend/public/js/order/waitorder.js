jQuery(document).ready(function($) {

	var orderTable = jQuery('#waitorders').dataTable({
		"bProcessing": true,
        "bServerSide": true,
        "bFilter": true,
        "bSort": true,
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [1, 3, 4, 6, 7 ] },
            { "bSearchable": false, "aTargets": [ 1,4 ]}
        ],
        "sDom": '<"top"f>rt<"bottom"lip><"clear">',
        "aoColumns": [
			{ "sTitle": "订单号", "sClass" : "head0", "mDataProp" : "order_sn" },
			{ "sTitle": "类型", "sClass" : "head1", "mDataProp" : "type_name"},
			{ "sTitle": "下单人", "sClass" : "head0", "mDataProp" : "contact" },
            { "sTitle": "手机号", "sClass" : "head1", "mDataProp" : "phone_mob" },
            { "sTitle": "预约地址", "sClass" : "head0", "mDataProp" : "address_detail" },
            { "sTitle": "预约时间", "sClass" : "head1", "mDataProp" : "need_time" },
			{ "sTitle": "备注", "sClass" : "head0", "mDataProp" : "remark" },
			{ "sTitle": "操作", "sClass" : "head1", "mDataProp" : "order_id" }
        ],
        "sAjaxSource": "/order/getOrders?type=1",
        "oLanguage": {
            "sLengthMenu": "每页 _MENU_ 记录",
            "sZeroRecords": "抱歉找不到数据",
            "sInfo": "展示 _START_ 到 _END_ ，共 _TOTAL_ 数据",
            "sInfoEmpty": "0条记录展示",
            "sInfoFiltered": "(从 _MAX_ 记录中筛选)",
            "sZeroRecords": "找不到匹配的数据",
            "sEmptyTable": "无可用数据",
            "sLoadingRecords": "数据加载中...",
            "sProcessing": "数据加载中...",
            "sSearch": "搜索",
            "oPaginate": {
				"sFirst":    "首页",
				"sPrevious": "前一页",
				"sNext":     "后一页",
				"sLast":     "尾页"
			},
        },
        "sPaginationType": "full_numbers",
        "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            /* Append the grade to the default row class name */

            $('td:eq(7)', nRow).html("<a class='btn_link view_btn' href='javascript:void(0);' data-id='"+aData['order_id']+"'><span>查看</span></a> &nbsp;&nbsp;&nbsp;"+
            "<a class='btn_link chk_btn' href='javascript:void(0);' data-id='"+aData['order_id']+"'><span>审核</span></a>&nbsp;&nbsp;&nbsp;"+
            "<a class='btn_link bck_btn' href='javascript:void(0);' data-id='"+aData['order_id']+"'><span>打回</span></a>");

            return nRow;
        },
		"fnDrawCallback": function(oSettings) {
			jQuery('.view_btn').click(function(event) {
				window.location.href = '/order/view_order?order_id='+jQuery(this).attr('data-id');
			});

			jQuery('.chk_btn').click(function(event) {

				var order_id = jQuery(this).attr('data-id');
				jConfirm('你确认审核通过此订单？', '审核确认', function(r) {
					if(r) {
						jQuery.post('../order/check_order', {order_id: order_id, type : 1}, function(data, textStatus, xhr) {
							if(data.success) {
								jQuery.jGrowl("审核成功");
								window.location.reload();
							}else{
								jAlert(data.msg);
							}
						}, 'json');
					}
				});
			});

            jQuery('.bck_btn').click(function(event) {

                var order_id = jQuery(this).attr('data-id');

                jPrompt('请填写打回原因', '', '打回', function(r) {
                    if( r ) {
                        jQuery.post('../order/check_order', {order_id: order_id, type : 2, reason: r}, function(data, textStatus, xhr) {
                            if(data.success) {
                                jQuery.jGrowl("审核成功");
                                window.location.reload();
                            }else{
                                jAlert(data.msg);
                            }
                        }, 'json');
                    }
                });

            });

            
        }
    });

    // 获取当前可用类型
    jQuery.post('../order/getItemsType', function(data, textStatus, xhr) {

        var options = '';
        jQuery.each(data, function(index, val) {
             options+= '<option value="'+index+'">'+val+'</option>';
        });

        // 自定义toolbar
        jQuery('div.top').prepend('<div class="tableoptions"><b>类型: </b>'+
            '<select id="serchtype" class="radius3">'+
                '<option value="">类型</option>'+
                options+
                '</select></div>');

        $('#serchtype').change(function(event) {
            orderTable.fnFilter( this.value, 1 );
        });

    }, 'json');

});