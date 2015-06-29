jQuery(document).ready(function(){
								
	///// TRANSFORM CHECKBOX /////							
	jQuery('input:checkbox').uniform();
	
	jQuery('#login_btn').click(function(event) {

		jQuery('.loginboxinner').mask({
		    spinner: { lines: 10, length: 5, width: 3, radius: 10}
		});

		if(jQuery('#username').val() == ''){
			jQuery('.nousername .loginmsg').html('请填写用户名');
			jQuery('.nousername').fadeIn();
			jQuery('.loginboxinner').unmask();
			return false;
		} 
		if(jQuery('#password').val() == '') {
			jQuery('.nousername .loginmsg').html('请填写密码');
			jQuery('.nousername').fadeIn();
			jQuery('.loginboxinner').unmask();
			return false;
		}
		
		jQuery.post('/User/auth_login', {username: jQuery('#username').val(), password: jQuery('#password').val(), remember_me: jQuery('#remember_me').prop('checked')}, function(data, textStatus, xhr) {
				
			jQuery('.loginboxinner').unmask();
			if(data.success) {
				window.location.href = '/Dashboard/admin';
			}else{
				jQuery('.nousername .loginmsg').html(data.msg);
				jQuery('.nousername').fadeIn();
			}

		}, 'json');
	});

	jQuery('#username').focus(function(event) {
			jQuery('.nousername').hide();
	});
	jQuery('#password').focus(function(event) {
			jQuery('.nousername').hide();
	});

	///// ADD PLACEHOLDER /////
	jQuery('#username').attr('placeholder','用户名');
	jQuery('#password').attr('placeholder','密码');
});
