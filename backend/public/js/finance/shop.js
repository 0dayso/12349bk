jQuery(document).ready(function($) {

	var shopTable = jQuery('#shoptable').dataTable({
		"bProcessing": true,
        "bServerSide": true,
        "bFilter": true,
        "bSort": true,
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [0,2, 3, 4, 5, 6, 7, 8, 9 ] },
            { "bSearchable": false, "aTargets": [ 1,4 ]}
        ],
        "sDom": '<"top"f>rt<"bottom"lip><"clear">',
        "aoColumns": [
			{ "sTitle": "商家ID", "sClass" : "head0", "mDataProp" : "shop_id" },
			{ "sTitle": "商家名称", "sClass" : "head1", "mDataProp" : "shop_name"},
			{ "sTitle": "类型", "sClass" : "head0", "mDataProp" : "item_types" },
            { "sTitle": "总销售额", "sClass" : "head1", "mDataProp" : "tamount" },
            { "sTitle": "优惠券金额", "sClass" : "head0", "mDataProp" : "tdiscount" },
            { "sTitle": "订单总金额", "sClass" : "head1", "mDataProp" : "torderamount" },
			{ "sTitle": "佣金", "sClass" : "head0", "mDataProp" : "tmoney" },
            { "sTitle": "退款金额", "sClass" : "head1", "mDataProp" : "treturn" },
            { "sTitle": "应结", "sClass" : "head0", "mDataProp" : "true_amount" },
			{ "sTitle": "操作", "sClass" : "head0", "mDataProp" : "shop_id" }
        ],
        "sAjaxSource": "/finance/getShops",
        "oLanguage": {
            "sLengthMenu": "每页 _MENU_ 记录",
            "sZeroRecords": "抱歉找不到数据",
            "sInfo": "展示 _START_ 到 _END_ ，共 _TOTAL_ 数据",
            "sInfoEmpty": "0条记录展示",
            "sInfoFiltered": "(从 _MAX_ 记录中筛选)",
            "sZeroRecords": "找不到匹配的数据",
            "sEmptyTable": "无可用数据(请先选择合适的时间段)",
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

            $('td:eq(9)', nRow).html("<a class='btn_link view_btn' href='javascript:void(0);' data-id='"+aData['shop_id']+"'><span>查看明细</span></a> &nbsp;&nbsp;&nbsp;");

            return nRow;
        },
		"fnDrawCallback": function(oSettings) {
			jQuery('.view_btn').click(function(event) {
				window.location.href = '/order/view_order?shop_id='+jQuery(this).attr('data-id');
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
        jQuery('div.top').prepend('<div class="tableoptions">'+
            '<b>日期：</b>'+
            '<input id="datepicker1" type="text" class="width100"> ~ '+
            '<input id="datepicker2" type="text" class="width100">'+
            '<b> 类型: </b>'+
            '<select id="serchtype" class="radius3">'+
                '<option value="">类型</option>'+
                options+
                '</select></div>');

        jQuery( "#datepicker1" ).datepicker({
             changeMonth: true,
             changeYear: true,
             dateFormat: 'yy-mm',
             showButtonPanel: true
        }).change(function(event) {

            if($( "#datepicker1" ).datepicker( "getDate" )) {
                var currentDate1 = $( "#datepicker1" ).datepicker( "getDate" ).getTime()/1000;
            }
            if($( "#datepicker2" ).datepicker( "getDate" )) {
                var currentDate2 = $( "#datepicker2" ).datepicker( "getDate" ).getTime()/1000;
            }

            if(currentDate1 && currentDate1 && currentDate1 > currentDate2) {
                jAlert("开始日期必须小于结束日期");
                $( "#datepicker1" ).datepicker('setDate', null)
            }
            if(currentDate1) {
                shopTable.fnFilter( String(currentDate1), 2 );
            }

        });

        jQuery( "#datepicker2" ).datepicker({
            dateFormat: "yy-mm-dd",
            showClearButton: true
        }).change(function(event) {
            if($( "#datepicker1" ).datepicker( "getDate" )) {
                var currentDate1 = $( "#datepicker1" ).datepicker( "getDate" ).getTime()/1000;
            }

            if($( "#datepicker2" ).datepicker( "getDate" )) {
                var currentDate2 = $( "#datepicker2" ).datepicker( "getDate" ).getTime()/1000;
            }

            if(currentDate1 && currentDate1 && currentDate1 > currentDate2) {
                jAlert("结束日期必须大于开始日期");
                $( "#datepicker2" ).datepicker('setDate', null)
            }

            if(currentDate2) {
                shopTable.fnFilter( String(currentDate2), 3 );
            }
        });

        $('#serchtype').change(function(event) {
            shopTable.fnFilter( this.value, 1 );
        });

    }, 'json');

});