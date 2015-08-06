jQuery(document).ready(function($) {
	

	$('select[name="region_id"]').select2().change(function(event) {

        // 验证
        if($(this).valid())
            $(this).next().find('.select2-selection').removeClass("error");
        else
            $(this).next().find('.select2-selection').addClass("error");
        
    });

    $('input[name="need_time"]').datetimepicker({
        format:'Y-m-d H:i',
        step: 15,
        lang: 'zh',
        minDate: 0,
        onShow: function() {
        	if($('input[name="coup_id"]') && $('input[name="coup_id"]:checked').val()) {
        		//******不做处理******//
        	}else{
        		jAlert("请先选择服务内容");
        		return false;
        	}
        },
        onClose: function(curTime, $input) {
        	var selVal = $input.val();

        	if($('input[name="coup_id"]') && $('input[name="coup_id"]:checked').val()) {
        		//******JS 判断限制******//
        		$.post('/order/limitOrder', {
        			coup_id : $('input[name="coup_id"]:checked').val(),
					need_time : selVal
        		}, function(data, textStatus, xhr) {
        			if(data.success) {
        				jQuery.jGrowl(data.msg);
        			}else{
        				jAlert(data.msg);
        				$('input[name="need_time"]').val("");
        			}
        		}, 'json');

        	}else{
        		jAlert("请先选择服务内容");
        		$('input[name="need_time"]').val('');
        		return false;
        	}

        }
    });

    jQuery(".stdform").validate({
        ignore: ":hidden:not(select)",
        rules: {
            phone_mob: "required",
            need_time: "required",
            contact: "required",
            region_id: "required",
            address: "required"
        },
        messages: {
            phone_mob: "请填写服务手机号码",
            need_time: "请填写需求时间",
            contact: "请填写联系人",
            region_id: "请选择服务区域",
            address: "请填写地址"
        },
        errorPlacement : function(error, element) {  
            if(element.attr('type') == 'file') {
                element.parent('.uploader').after(error);  
            }else{
                if(element.hasClass('chzn-select')) {
                    element.next().find('.select2-selection').addClass("error");
                    element.next().find('.select2-selection').after(error);
                }else{
                    element.after(error);
                }

            }
        },
        submitHandler: function(form) {      
    			$(form).ajaxSubmit();     
   		}
    });


	$('#submitBtn').click(function(event) {
		
		if($('form').valid()) {
			var coup_id = $('input[name="coup_id"]:checked').val();
			if(!coup_id) {
				jAlert("请选择优惠券");
				return;
			}

			var need_time = $('input[name="need_time"]').val();
			var contact = $('input[name="contact"]').val();
			var phone_mob = $('input[name="phone_mob"]').val();
			var phone = $('input[name="phone"]').val();
			var region_id = $('select[name="region_id"]').val();
			var address = $('input[name="address"]').val();
			var remark = $('textarea[name="remark"]').val();

			jQuery('body').mask({
                spinner: { lines: 10, length: 5, width: 3, radius: 10}
            });

			$.post('/order/addcouponorder', {
				coup_id : coup_id,
				need_time : need_time,
				contact : contact,
				phone_mob : phone_mob,
				phone : phone,
				region_id : region_id,
				address : address,
				remark : 	remark
			}, function(data, textStatus, xhr) {
				if(data.success) {
					jAlert(data.msg);
					setTimeout(function() {
						window.location.reload();
					}, 1000);
				}else{
					jAlert(data.msg);
				}

			}, 'json');


		}
	});

	$('#btn_search').click(function(event) {
		var phone = $('input[name="phone"]').val();

		if($.trim(phone)) {
			$.post('/order/getMyCoupon', {phone: phone}, function(data, textStatus, xhr) {
				if(data.success){
					var strHtml = "<table class='stdtable' width='60%'><thead>"+
					"<tr><th>&nbsp;</th><th>服务内容</th><th>是否使用</th><th>使用时间</th><th>使用订单</th></tr></thead><tbody>";

					$.each(data.data, function(index, val) {
						strHtml += "<tr><td style='width: 50px;'>";
						if(val.ischecked == 1 || val.order_sn) {
							strHtml += "&nbsp;";
						}else{
							strHtml += '<input type="radio" name="coup_id" value="'+val.id+'"/>';
						}
						strHtml += "</td><td>"+val.item_name+"</td>";
						if(val.ischecked == 1 || val.order_sn) {
							strHtml += "<td style='width: 10%;'>已使用</td><td style='width: 20%;'>"+val.usedtime+"</td><td style='width: 20%;'>"+val.order_sn+"</td>";
						}else{
							strHtml += '<td style="width: 10%;">未使用</td><td style="width: 20%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td style="width: 20%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
						}
						strHtml += "</tr>";
					});

					strHtml +="</tbody></table>";

					$('#coupon_field').html(strHtml);

				}else{
					jAlert(data.msg);
					$('#coupon_field').html('请先输入手机号，并点击查询');
				}
			}, 'json');
		}else{
			jAlert("请先填写手机号码");
		}
	});

    $('#btn_order').click(function(event) {
        var phone = $('input[name="phone"]').val();

        if($.trim(phone)) {
            $.post('/order/getRecentOrder', {
                phone : phone
            }, function(data, textStatus, xhr) {
                if(data.success){
                    var strHtml = "<table class='stdtable'><thead>"+
                    "<tr><th>#</th><th>订单号</th><th>服务内容</th><th>联系人</th><th>联系电话</th><th>下单时间</th><th>预约时间</th><th>服务地址</th><th>状态</th></tr></thead><tbody>";

                    $.each(data.data, function(index, val) {
                        strHtml += "<tr><td style='width: 50px;'>"+(index+1)+"</td>";
                        strHtml += "<td style='width: 150px;'>"+val.order_sn+"</td>";
                        strHtml += "<td style='width: 200px;'>("+val.service_name+")"+val.item_name+"</td>";
                        strHtml += "<td style='width: 150px;'>"+val.contact+"</td>";
                        strHtml += "<td style='width: 150px;'>"+val.phone_mob+"</td>";
                        strHtml += "<td style='width: 150px;'>"+val.add_time+"</td>";
                        strHtml += "<td style='width: 150px;'>"+val.need_time+"</td>";
                        strHtml += "<td style='width: 300px;'>"+val.region_name+val.address+"</td>";
                        strHtml += "<td style='width: 150px;'>"+val.status+"</td></tr>";
                    });

                    strHtml +="</tbody></table>";
                    $('#order_link').html(strHtml);
                    $('#order_link_field').removeClass('hide').addClass('show');

                }else{
                    jAlert(data.msg);
                    $('#coupon_field').html('请先输入手机号，并点击查询');
                }
            }, 'json');
        }else{
            jAlert("请先填写手机号码");
        }
    });
});