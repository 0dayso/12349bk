/**
 * 管理用户数据
 *
 * @author zhaozl
 * @since  2015-07-02
 */
jQuery(document).ready(function($) {

	// 初始化默认值
	var coupRuleTable = jQuery('#yearcouptable').dataTable({
		"bProcessing": true,
        "bFilter": true,
        "bSort": true,
        "aaSorting": [[ 0, "desc" ]],
        "sDom": '<"top"f>rt<"bottom"lip><"clear">',
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
        "sPaginationType": "full_numbers"
    });

});