jQuery(document).ready(function($) {

	var orderTable = jQuery('#waitorders').dataTable({
		"bProcessing": true,
        "bServerSide": true,
        "bFilter": true,
        "bSort": false,
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
            { "sTitle": "服务人员", "sClass" : "head1", "mDataProp" : "staff" },
			{ "sTitle": "待办时间", "sClass" : "head1", "mDataProp" : "work_time" },
			{ "sTitle": "操作", "sClass" : "head0", "mDataProp" : "order_id" }
        ],
        "sAjaxSource": "/order/getOrders?type=4",
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
            $('td:eq(10)', nRow).html("<a class='btn_link view_btn' href='javascript:void(0);' data-id='"+aData['order_id']+"'><span>查看</span></a> <br>"+
            "<a class='btn_pay pay_btn' href='javascript:void(0);' data-id='"+aData['order_id']+"'><span>支付</span></a><br>"+
            "<a class='btn_link reassign_btn' href='javascript:void(0);' data-id='"+aData['order_id']+"'><span>重新分配</span></a><br>"+
            "<a class='btn_link cencel_btn' href='javascript:void(0);' data-id='"+aData['order_id']+"'><span>取消</span></a><br />"+
            "<a class='btn_link work_btn' href='javascript:void(0);' data-id='"+aData['order_id']+"'><span>添加跟踪</span></a><br />"
            );

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

            jQuery('.pay_btn').click(function(event) {
                var order_id = jQuery(this).attr('data-id');
                $.post('../order/getOrderCoupon', {order_id: order_id}, function(data, textStatus, xhr) {
                    if(data.success) {
                        var dia_html = '';
                        if(data.hascoupon) {
                            dia_html +='<div id="dialog" title="请填写确认支付信息">'+
                                '<form class="payform stdform stdform2 formtable" action="" method="post">'+
                                    '<input type="hidden" name="order_id" id="order_id" value="'+order_id+'"/>'+
                                    '<table width="100%" cellspacing="0">'+
                                        '<tr>'+
                                            '<td colspan="2">'+
                                                '<p>'+
                                                    '<label>额外订单金额(没有请填0)：</label>'+
                                                    '<span class="field"><input type="text" name="order_amount" class="smallinput" placeholder="额外订单金额" style="width: 200px;"/></span>'+
                                                '</p>'+
                                            '</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>'+
                                                '<p>'+
                                                    '<label for="">使用的优惠券卡号:</label>'+
                                                    '<span class="field">'+
                                                        '<input type="text" name="commoncode" id="commoncode" readOnly placeholder="使用的优惠券卡号" value="'+data.commoncode+'">'+
                                                    '</span>'+
                                                '</p>'+
                                            '</td>'+
                                            '<td>'+
                                                '<p>'+
                                                    '<label for="">使用的优惠券密码:</label>'+
                                                    '<span class="field">'+
                                                        '<input type="text" name="codepassword" id="codepassword" readOnly placeholder="使用的优惠券密码" value="'+data.codepassword+'">'+
                                                    '</span>'+
                                                '</p>'+
                                            '</td>'+
                                        '</tr>'+
                                    '</table>'+
                                '</form>'+
                            '</div>';

                        }else{
                            dia_html +='<div id="dialog" title="请填写确认支付信息">'+
                                '<form class="payform stdform stdform2 formtable" action="" method="post">'+
                                    '<input type="hidden" name="order_id" id="order_id" value="'+order_id+'"/>'+
                                    '<table width="100%" cellspacing="0">'+
                                        '<tr>'+
                                            '<td colspan="2">'+
                                                '<p>'+
                                                    '<label>额外订单金额(没有请填0)：</label>'+
                                                    '<span class="field"><input type="text" name="order_amount" class="smallinput" placeholder="额外订单金额" style="width: 200px;"/></span>'+
                                                '</p>'+
                                            '</td>'+
                                        '</tr>'+
                                    '</table>'+
                                '</form>'+
                            '</div>';
                        }

                        $( dia_html ).dialog({ 
                            width:1000,
                            open: function() {
                                $('.payform').validate({
                                    ignore: ":hidden:not(select)",
                                    rules: {
                                        order_amount: {
                                            required: true,
                                            number:true,
                                            min: 0
                                        }
                                    },
                                    messages: {
                                        order_amount: {
                                            required: "请填写订单金额",
                                            number: "必须是数字",
                                            min: "不能小于0"
                                        }
                                    }
                                });
                            },
                            close: function () { $(this).remove(); },
                            buttons: {  
                                "支付": function () { 
                                    var that = $(this);
                                    if($('.payform').valid()) {
                                        $('#dialog').mask({spinner: { lines: 10, length: 5, width: 3, radius: 10}});
                                        $.post('../order/pay_order', $('.payform').serialize(), function(data, textStatus, xhr) {
                                            $('#dialog').unmask();
                                            if(data.success) {
                                                that.dialog('close');
                                                jAlert(data.msg);

                                                jQuery('#waitorders').dataTable().fnClearTable(0); //清空数据
                                                jQuery('#waitorders').dataTable().fnDraw(); //重新加载数据
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

            $(".reassign_btn").click(function(event) {
                var order_id = jQuery(this).attr('data-id');

                jPrompt('请填写重新分派的原因', '', '重新分派', function(r) {
                    if( r ) {
                        jQuery.post('../order/cancelAssign', {order_id: order_id, reason: r}, function(data, textStatus, xhr) {
                            if(data.success) {
                                jAlert("重新分派成功");
                                jQuery('#waitorders').dataTable().fnClearTable(0); //清空数据
                                jQuery('#waitorders').dataTable().fnDraw(); //重新加载数据
                            }else{
                                jAlert(data.msg);
                            }
                        }, 'json');
                    }
                });
            });

            $(".cencel_btn").click(function(event) {
                var order_id = jQuery(this).attr('data-id');

                jPrompt('请填写取消订单原因', '', '取消订单', function(r) {
                    if( r ) {
                        jQuery.post('../order/cancelOrder', {order_id: order_id, reason: r}, function(data, textStatus, xhr) {
                            if(data.success) {
                                jAlert("取消订单成功");
                                jQuery('#waitorders').dataTable().fnClearTable(0); //清空数据
                                jQuery('#waitorders').dataTable().fnDraw(); //重新加载数据
                            }else{
                                jAlert(data.msg);
                            }
                        }, 'json');
                    }
                });
            });
            

            $('.work_btn').click(function(event) {
                var order_id = jQuery(this).attr('data-id');

                dia_html ='<div id="dialog_work" title="跟踪，待办时间修改">'+
                    '<form class="assignform stdform stdform2 formtable" action="" method="post">'+
                        '<input type="hidden" name="order_id" id="order_id" value="'+order_id+'"/>'+
                        '<table width="100%" cellspacing="0">'+
                            '<tr>'+
                                '<td>'+
                                    '<p>'+
                                        '<label>待办时间：</label>'+
                                        '<span class="field"><input type="text" name="work_time" class="smallinput" style="width: 300px;"/></span>'+
                                    '</p>'+
                                '</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>'+
                                    '<p>'+
                                        '<label for="">操作记录:</label>'+
                                        '<span class="field">'+
                                            '<textarea cols="80" rows="5" class="longinput" name="comment" placeholder="操作记录"></textarea>'+
                                        '</span>'+
                                    '</p>'+
                                '</td>'+
                            '</tr>'+
                        '</table>'+
                    '</form>'+
                '</div>';

                $(dia_html).dialog({
                    width: 800,
                    open: function() {

                        $('input[name="work_time"]').datetimepicker({
                            format:'Y-m-d H:i',
                            step: 15,
                            lang: 'zh',
                            minDate: 0
                        });

                        $('.assignform').validate({
                            ignore: ":hidden:not(select)",
                            rules: {
                                work_time: "required",
                                comment: "required"
                            },
                            messages: {
                                work_time: "请选择时间",
                                comment: "请填写操作记录"
                            }
                        });
                    },
                    close: function () { $(this).remove(); },
                    buttons: {  
                        "提交": function () { 
                            var that = $(this);
                            if($('.assignform').valid()) {
                                $('#dialog_work').mask({spinner: { lines: 10, length: 5, width: 3, radius: 10}});
                                $.post('../order/change_worktime', $('.assignform').serialize(), function(data, textStatus, xhr) {
                                    if(data.success) {
                                        that.dialog('close');
                                        jAlert(data.msg);

                                        // jQuery('#waitorders').dataTable().fnClearTable(0); //清空数据
                                        jQuery('#waitorders').dataTable().fnDraw(); //重新加载数据


                                    }else{
                                        jAlert(data.msg);
                                    }
                                }, 'json');

                            }
                        }  
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
                '</select>'+
            '&nbsp;&nbsp;<button class="btn btn-link" id="all_btn" >全部工单</button>'+
            '&nbsp;&nbsp;<button class="btn btn-link" id="today_btn" >今日工单</button>'+
            '&nbsp;&nbsp;<button class="btn btn-link" id="tow_btn" >明日工单</button>'+
            '</div>');

        $('#serchtype').change(function(event) {
            orderTable.fnFilter( this.value, 1 );
        });

        $('#today_btn').click(function(event) {
            orderTable.fnFilter( "1", 4 );
        });

        $('#tow_btn').click(function(event) {
            orderTable.fnFilter( "2", 4 );
        });

        $('#all_btn').click(function(event) {
            orderTable.fnFilter( "", 4 );
        });

    }, 'json');

});