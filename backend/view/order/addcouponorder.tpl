<div class="contentwrapper">
	
	<form class="stdform stdform2 formtable" action="../order/addcouponorder" method="post">
		<table width="100%" cellspacing="0">
			<tr>
				<td colspan="2">
					<p>
			        	<label>服务人手机号：</label>
			            <span class="field">
			            	<input type="text" name="phone" class="smallinput" placeholder="关注公众上号并绑定的手机号码" style="width: 500px;"/>
			            	&nbsp;
			            	<a href="javascript:void(0);" id="btn_search" class="btn btn_search">
				        		<span>查询</span>
				        	</a>
				        	&nbsp;
			            	<a href="javascript:void(0);" id="btn_order" class="btn_link">
				        		<span>检测最近订单</span>
				        	</a>
						</span>
			        </p>
				</td>
			</tr>
			<tr id="order_link_field" class="hide">
				<td colpsan="2" style="width: 100%">
					<p id="order_link"></p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
						<label for="">请选择可用优惠券</label>
						<span class="field" id="coupon_field">
							请先输入手机号，并点击查询
						</span>
					</p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
			        	<label>服务时间：</label>
			            <span class="field"><input type="text" name="need_time" class="smallinput"/></span>
			        </p>
			    </td>
			  </tr>
			<tr>
				<td colspan="2">
					<p>
			        	<label>联系人：</label>
			            <span class="field"><input type="text" name="contact" class="smallinput" placeholder="联系人"/></span>
			        </p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
			        	<label>联系方式：</label>
			            <span class="field"><input type="text" name="phone_mob" class="smallinput" placeholder="联系方式"/></span>
			        </p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
						<label>服务地址：</label>
						<span class="field">
							<select name="region_id" id="region_id"  data-placeholder="请选择区域" class="chzn-select" style="width:350px;" tabindex="2">
								{html_options options=$regions}
							</select>
							<br>
							<input type="text" name="address" class="smallinput" style="margin-top: 5px;" placeholder="请填写详细地址"/>
						</span>
					</p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
						<label>备注：</label>
						<span class="field">
	                    	<textarea cols="80" rows="5" class="longinput" name="remark"></textarea>
	                    </span>
					</p>
				</td>
			</tr>
		</table>
        <p class="stdformbutton">
        	<a href="javascript:void(0);" id="submitBtn" class="btn btn_book">
        		<span>提交</span>
        	</a>
            <input type="reset" class="reset radius2" value="重置">
        </p>
	</form>

</div>