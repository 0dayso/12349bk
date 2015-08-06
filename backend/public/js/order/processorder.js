jQuery(document).ready(function($) {

	var orderTable = jQuery('#processorder').dataTable({
		"bProcessing": true,
        "bServerSide": true,
        "bFilter": true,
        "bSort": false,
        "aoColumnDefs": [
            { "bSearchable": false, "aTargets": [ 1,4 ]}
        ],
        "sDom": '<"top"f>rt<"bottom"lip><"clear">',
        "aoColumns": [
			{ "sTitle": "订单号", "sClass" : "head0", "mDataProp" : "order_sn" },
			{ "sTitle": "类型", "sClass" : "head1", "mDataProp" : "type_name"},
            { "sTitle": "订单来源", "sClass" : "head0", "mDataProp" : "source", "fnRender" : function(obj) {
                if(obj.aData.source == 1) {
                    return "<font color='green'>后台订单</font>";
                }else{
                    return "<font color='red'>微信订单</font>";
                }
            }},
            { "sTitle": "下单时间", "sClass" : "head1", "mDataProp" : "add_time" },
			{ "sTitle": "联系人", "sClass" : "head0", "mDataProp" : "userinfo" },
            { "sTitle": "预约地址", "sClass" : "head0", "mDataProp" : "address_detail" },
            { "sTitle": "预约时间", "sClass" : "head1", "mDataProp" : "need_time" },
            { "sTitle": "备注", "sClass" : "head0", "mDataProp" : "remark" },
			{ "sTitle": "下单人", "sClass" : "head1", "mDataProp" : "admin_name" },
			{ "sTitle": "操作", "sClass" : "head0", "mDataProp" : "order_id" }
        ],
        "sAjaxSource": "/order/getOrders?type=2",
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
            if(aData['source1'] == 0) {
                $('td:eq(8)', nRow).html("微信用户");
            }

            $('td:eq(9)', nRow).html("<a class='btn_link view_btn' href='javascript:void(0);' data-id='"+aData['order_id']+"'><span>查看</span></a><br />"+
                "<a class='btn_link assign_btn' href='javascript:void(0);' data-id='"+aData['order_id']+"'><span>分配</span></a>");

            return nRow;
        },
		"fnDrawCallback": function(oSettings) {
			jQuery('.view_btn').click(function(event) {
                var order_id = $(this).attr('data-id');
                jQuery('body').mask({
                    spinner: { lines: 10, length: 5, width: 3, radius: 10}
                });

                $.post('../order/view_order', {
                    order_id: order_id
                }, function(data, textStatus, xhr) {
                    jQuery('body').unmask();
                    $(data).dialog({
                        width: 800
                    });
                });

			});

            jQuery('.assign_btn').click(function(event) {
                var order_id = $(this).attr('data-id');

                jQuery('body').mask({
                    spinner: { lines: 10, length: 5, width: 3, radius: 10}
                });

                $.post('../order/getShopByOrderId', {order_id: order_id}, function(data, textStatus, xhr) {
                    jQuery('body').unmask();
                    if(data.success) {
                        var shop_options = '<option value="">请选择商家</option>';
                        $.each(data.data, function(index, val) {
                            shop_options += '<option value="'+val.shop_id+'">'+val.shop_name+'</option>';
                        });

                        var strHtml = '<div id="dialog" title="请选择商家服务人员" style="">'+
                            '<form class="stdform_assign stdform formtable" action="" method="POST">'+
                                '<input type="hidden" name="order_id" id="order_id" value="'+order_id+'"/>'+
                                '<table width="100%" cellspacing="0" collspacing="0">'+
                                    '<tr>'+
                                        '<td>'+
                                            '<p>'+
                                                '<label>商家</label>'+
                                                '<span class="field">'+
                                                    '<select name="shop" id="shop" data-placeholder="请选择商家" class="chzn-select" style="width:350px;" tabindex="-1">'+
                                                        shop_options +
                                                    '</select>'+
                                                '</span>'+
                                            '</p>'+
                                        '</td>'+
                                    '</tr>'+
                                    '<tr id="staffField">'+
                                        '<td>'+
                                            '<p>'+
                                                '<label>服务人员</label>'+
                                                '<span class="field">'+
                                                    '<select name="staff" id="staff" data-placeholder="请选择服务人员" class="chzn-select" style="width:350px;" tabindex="-1">'+
                                                    '</select>'+
                                                '</span>'+
                                            '</p>'+
                                        '</td>'+
                                    '</tr>'+
                                '</table>'+
                            '</form>'+
                        '</div>';

                        $(strHtml).dialog({ 
                            width:800,
                            open: function() {
                                $('.stdform_assign').validate({
                                    ignore: ":hidden:not(select)",
                                    rules: {
                                        shop: "required",
                                        staff: "required"
                                    },
                                    messages: {
                                        shop: "请选择服务商家",
                                        staff: "请选择服务人员"
                                    },
                                    errorPlacement : function(error, element) {  
                                        if(element.hasClass('chzn-select')) {
                                            element.next().find('.select2-selection').addClass("error");
                                            element.next().find('.select2-selection').after(error);
                                        }else{
                                            element.after(error);
                                        }
                                    }
                                });

                                $('select[name="staff"]').select2();
                                $('select[name="shop"]').select2().change(function(event) {
                                    // 验证
                                    if($(this).valid())
                                        $(this).next().find('.select2-selection').removeClass("error");
                                    else
                                        $(this).next().find('.select2-selection').addClass("error");
                                    var shop_id = $(this).val();

                                    jQuery('#dialog').mask({
                                        spinner: { lines: 10, length: 5, width: 3, radius: 10}
                                    });

                                    if(shop_id) {
                                        $.post('../order/getShopStaffByShopId', {shop_id: shop_id}, function(data, textStatus, xhr) {
                                            $('#dialog').unmask();
                                            if(data.success) {
                                                var staff_options = '<option value="">请选择服务人员</option>';
                                                $.each(data.staff, function(index, val) {
                                                    staff_options += '<option value="'+val.staff_id+'">'+val.staff_name+'</option>';
                                                });

                                                if($('select[name="staff"]').select2())
                                                    $('select[name="staff"]').select2("destroy");
                                                $('select[name="staff"]').html(staff_options);
                                                $('select[name="staff"]').select2({
                                                    allowClear: true
                                                }).change(function(event) {
                                                    // 验证
                                                    if($(this).valid())
                                                        $(this).next().find('.select2-selection').removeClass("error");
                                                    else
                                                        $(this).next().find('.select2-selection').addClass("error");
                                                });;

                                                $('#staffField').css('display', '');

                                            }else{
                                                jAlert(data.msg);
                                                $('#staffField').css('display', 'none');
                                            }

                                        }, 'json');
                                    }else{
                                        $('#dialog').unmask();
                                        $('#staffField').css('display', 'none');
                                    }
                                });
                                
                            },
                            close: function () { $(this).remove(); },   
                            buttons: {  
                                "分配": function () { 
                                    var that = $(this);
                                    if($('.stdform_assign').valid()) {
                                        $('#dialog').mask({spinner: { lines: 10, length: 5, width: 3, radius: 10}});
                                        $.post('../order/assignWorker', $('.stdform_assign').serialize(), function(data, textStatus, xhr) {
                                            if(data.success) {
                                                that.dialog('close');
                                                jAlert(data.msg);

                                                jQuery('#processorder').dataTable().fnClearTable(0); //清空数据
                                                jQuery('#processorder').dataTable().dataTable().fnDraw(); //重新加载数据
                                            }else{
                                                jAlert(data.msg);
                                            }
                                        }, 'json');

                                    }
                                }  
                            }
                        });

                    }else{
                        jAlert(data.msg);
                    }
                }, 'json');



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