jQuery(document).ready(function($) {
	

	jQuery('#adminTable').dataTable({
		"bProcessing": true,
        "bServerSide": true,
        "bFilter": true,
        "bSort": true,
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0,1,2,3,4 ] },
            { "bSearchable": false, "aTargets": [ 1,4 ]}
        ],
        "aoColumns": [
			{ "sTitle": "用户名", "sClass" : "head0", "mDataProp" : "admin_name" },
			{ "sTitle": "是否启用", "sClass" : "head1", "mDataProp" : "is_use"},
			{ "sTitle": "所属组", "sClass" : "head0", "mDataProp" : "group_name" },
			{ "sTitle": "手机号", "sClass" : "head1", "mDataProp" : "phone_mob" },
			{ "sTitle": "操作", "sClass" : "head0", "mDataProp" : "admin_id" }
        ],
        "sAjaxSource": "/dashboard/getAdminUsers",
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
            if ( aData['is_use'] == "1" ) {
                $('td:eq(1)', nRow).html( '<b>启用</b>' );
            }else{
                $('td:eq(1)', nRow).html( '<b>未启用</b>' );
            }

            $('td:eq(4)', nRow).html("<a class='btn btn_pencil edit_btn' href='javascript:void(0);' data-id='"+aData['admin_id']+"'><span>编辑</span></a> &nbsp;&nbsp;&nbsp;"+
            "<a class='btn btn_trash del_btn' href='javascript:void(0);' data-id='"+aData['admin_id']+"'><span>删除</span></a>");

            return nRow;
        },
		"fnDrawCallback": function(oSettings) {
			jQuery('.edit_btn').click(function(event) {
				window.location.href = '/dashboard/editadmin?admin_id='+jQuery(this).attr('data-id');
			});

			jQuery('.del_btn').click(function(event) {

				var admin_id = jQuery(this).attr('data-id');
				jConfirm('你确认删除此用户？', '删除确认', function(r) {
					if(r) {
						jQuery.post('../dashboard/deladmin', {admin_id: admin_id}, function(data, textStatus, xhr) {
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

	jQuery('#add_admin_btn').click(function(event) {
		window.location.href = '/dashboard/addadmin';
	});

});