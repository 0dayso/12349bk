/**
 * 修改密码
 *
 * @author zhaozl
 * @since  2015-07-02
 */
jQuery(document).ready(function($) {

	jQuery(".stdform").validate({
		rules: {
			admin_password: {
				required: true,
				minlength: 6	
			},
			admin_password_conf: {
				required: true,
				minlength: 6,	
				equalTo: '#admin_password'
			}
		},
		messages: {
			admin_password: {
				required: true,
				minlength: "密码长度不小于6"
			},
			admin_password_conf: {
				required: "请填写密码确认",
				minlength: "密码长度不小于6",
				equalTo: '两次密码输入不一致	'
			}
		}
	});

});