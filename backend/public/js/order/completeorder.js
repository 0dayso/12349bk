
jQuery(document).ready(function($) {
	var dataGrid = $('#dataGrid').dataGrid({
		url: '/order/getOrder?type=6',
		method: 'get',
		numberIndex: true,
		numberIndexWidth: 0.03,
		height: 650,
		toolBar: true,
		hasLongText: true,
		title: {
			name: '完结订单'
		},
		field: [
			{fieldName: '订单号', name: 'order_sn', width: '0.13', headAlign: 'left', itemAlign: 'left'},
			{fieldName: '订单类型', name: 'type_name', width: '0.17', headAlign: 'left', itemAlign: 'left'},
			{fieldName: '订单来源', name: 'source', longText: true, render: function(row, field) {
				if(field == 1)
					return '<font color="green">后台订单</font>';
				else
					return '<font color="red">微信订单</font>';
			}},
			{fieldName: '下单时间', name: 'add_time', width: '0.17', headAlign: 'left', itemAlign: 'left'},
			{fieldName: '联系人', name: 'contact', width: '0.15', headAlign: 'left', itemAlign: 'left'},
			{fieldName: '联系电话', name: 'phone_mob', longText: true},
			{fieldName: '预约地址', name: 'address_detail', longText: true},
			{fieldName: '预约时间', name: 'need_time', longText: true},
			{fieldName: '备注', name: 'remark', longText: true},
			{fieldName: '服务人员', name: 'staff', width: '0.2', headAlign: 'left', itemAlign: 'left'},
			{fieldName: '待办时间', name: 'work_time', width: '0.17', headAlign: 'left', itemAlign: 'left'},
			{fieldName: '操作', name: 'order_id', longText: true, render: function(row, field) {
				return '<a class="btn_link view_btn" href="javascript:void(0);" data-id="'+field+'"><span>查看</span></a>';
			}}
		],
		rowCallBack: function() {
			// alert(1);
		}
	});
});