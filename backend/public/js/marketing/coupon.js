jQuery(document).ready(function($) {

	var coupTable = jQuery('#couplist').dataTable({
		"bProcessing": true,
        "bServerSide": true,
        "bFilter": true,
        "bSort": false,
        "aoColumnDefs": [
            { "bSearchable": false, "aTargets": [ 1,4 ]}
        ],
        "sDom": '<"top"f>rt<"bottom"lip><"clear">',
        "aoColumns": [
			{ "sTitle": "#", "sClass" : "head0", "mDataProp" : "index" },
			{ "sTitle": "券码", "sClass" : "head1", "mDataProp" : "commoncode"},
            { "sTitle": "类型", "sClass" : "head0", "mDataProp" : "coupon_name" },
			{ "sTitle": "所属用户", "sClass" : "head0", "mDataProp" : "phone_mob" },
            { "sTitle": "是否使用", "sClass" : "head1", "mDataProp" : "ischecked" },
            { "sTitle": "发放时间", "sClass" : "head0", "mDataProp" : "createtime" },
            { "sTitle": "截止时间", "sClass" : "head1", "mDataProp" : "endtime" },
			{ "sTitle": "操作", "sClass" : "head0", "mDataProp" : "coup_id" },
        ],
        "sAjaxSource": "/marketing/getCoupons",
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

            if(aData['user_id'] == 0 && aData['phone_mob'] == '' && aData['isprint'] == 0) {
                $('td:eq(7)', nRow).html("<a class='btn_link assign_btn' href='javascript:void(0);' data-id='"+aData['coup_id']+"'><span>分配用户</span></a> &nbsp;&nbsp;&nbsp;");
            }else{
                $('td:eq(7)', nRow).html('-');
            }

            return nRow;
        },
		"fnDrawCallback": function(oSettings) {
            jQuery('.assign_btn').click(function(event) {

                var coup_id = jQuery(this).attr('data-id');

                jPrompt('请用户手机号码', '', '分配', function(r) {
                    if( r ) {

                        var reg = /^1[3,5,7,8]\d{9}$/;

                        if(reg.test(r)) {
                            jQuery.post('../marketing/assignUser', {coup_id: coup_id, phone_mob: r}, function(data, textStatus, xhr) {
                                if(data.success) {
                                    jQuery.jGrowl("审核成功");
                                    window.location.reload();
                                }else{
                                    jAlert(data.msg);
                                }
                            }, 'json');
                            
                        }else{
                            jAlert("请输入正确的手机号码");
                        }

                    }
                });

            });

            
        }
    });

    // 获取当前可用类型
    jQuery.post('../marketing/getCoupRules', function(data, textStatus, xhr) {

        var options = '';
        jQuery.each(data, function(index, val) {
             options+= '<option value="'+index+'">'+val+'</option>';
        });

        // 自定义toolbar
        jQuery('div.top').prepend('<div class="tableoptions"><b>优惠券分类: </b>'+
            '<select id="serchtype" class="radius3">'+
                '<option value="">优惠券分类</option>'+
                options+
                '</select></div>');

        $('#serchtype').change(function(event) {
            coupTable.fnFilter( this.value, 1 );
        });

    }, 'json');

});