jQuery(document).ready(function($) {

	var shopTable = jQuery('#shoplist').dataTable({
		"bProcessing": true,
        "bServerSide": true,
        "bFilter": true,
        "bSort": true,
        "aaSorting": [[ 1, "asc" ]],
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [0, 2, 3, 4, 5, 6 ] },
            { "bSearchable": false, "aTargets": [ 1,4 ]}
        ],
        "sDom": '<"top"f>rt<"bottom"lip><"clear">',
        "aoColumns": [
			{ "sTitle": "#", "sClass" : "head0", "mDataProp" : "index" },
			{ "sTitle": "商家名称", "sClass" : "head1", "mDataProp" : "shop_name"},
			{ "sTitle": "类型", "sClass" : "head0", "mDataProp" : "item_types" },
            { "sTitle": "负责人", "sClass" : "head1", "mDataProp" : "officer" },
            { "sTitle": "联系电话", "sClass" : "head0", "mDataProp" : "phone" },
            { "sTitle": "地址", "sClass" : "head1", "mDataProp" : "address_detail" },
			{ "sTitle": "操作", "sClass" : "head0", "mDataProp" : "shop_id" }
        ],
        "sAjaxSource": "/shop/getShops",
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

            $('td:eq(6)', nRow).html("<a class='btn_link view_btn' href='javascript:void(0);' data-id='"+aData['shop_id']+"'><span>查看</span></a> &nbsp;&nbsp;&nbsp;"+
            "<a class='btn_link edit_btn' href='javascript:void(0);' data-id='"+aData['shop_id']+"'><span>编辑</span></a>&nbsp;&nbsp;&nbsp;"+
            "<a class='btn_link del_btn' href='javascript:void(0);' data-id='"+aData['shop_id']+"'><span>删除</span></a>");

            return nRow;
        },
		"fnDrawCallback": function(oSettings) {
			jQuery('.view_btn').click(function(event) {
                window.location.href = '/shop/view_shop?shop_id='+jQuery(this).attr('data-id');
            });

            jQuery('.edit_btn').click(function(event) {
				window.location.href = '/shop/edit_shop?shop_id='+jQuery(this).attr('data-id');
			});

            jQuery('.del_btn').click(function(event) {

                var shop_id = jQuery(this).attr('data-id');

                jPrompt('请填写删除原因', '', '删除', function(r) {
                    if( r ) {
                        jQuery.post('../shop/delShop', {shop_id: shop_id, reason: r}, function(data, textStatus, xhr) {
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
            '<button id="addShop">添加商家</button>&nbsp;&nbsp;&nbsp;'+
            '<b>类型: </b>'+
            '<select id="serchtype" class="radius3">'+
                '<option value="">类型</option>'+
                options+
                '</select></div>');

        $('#addShop').click(function(event) {
            window.location.href = "../shop/addShop";
        });

        $('#serchtype').change(function(event) {
            shopTable.fnFilter( this.value, 1 );
        });

    }, 'json');

});