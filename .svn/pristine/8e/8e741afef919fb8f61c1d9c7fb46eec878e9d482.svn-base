<div class="contentwrapper">
	
	<form class="stdform stdform2 formtable" action="../order/addOrder" method="post" enctype="multipart/form-data">
		<table width="100%" cellspacing="0">
			<tr>
				<td>
					<p>
			        	<label>选择服务：</label>
			            <span class="field">
			            	<select name="item_id" id="item_id" data-placeholder="请选择服务类型" class="chzn-select" style="width:350px;" tabindex="4">
								{html_options options=$ser_items}
							</select>
						</span>
			        </p>
				</td>
				<td>
					<p>
			        	<label>服务时间：</label>
			            <span class="field"><input type="text" name="need_time" class="smallinput"/></span>
			        </p>
				</td>
			</tr>
			<tr>
				<td>
					<p>
			        	<label>联系人：</label>
			            <span class="field"><input type="text" name="contact" class="smallinput" placeholder="联系人"/></span>
			        </p>
				</td>
				<td>
					<p>
			        	<label>联系电话：</label>
			            <span class="field"><input type="text" name="phone_mob" class="smallinput" placeholder="手机号码或者电话"/></span>
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
			<tr>
				<td colspan="2">
					<p>
						<label for="">用户名（可选）:</label>
						<span class="field">
							<input type="text" name="user_name" placeholder="已注册用户的用户名或者绑定手机号码（可选填）">
						</span>
					</p>
				</td>
			</tr>
		</table>
        <p class="stdformbutton">
        	<button id="submitBtn" class="submit radius2">提交</button>
            <input type="reset" class="reset radius2" value="重置">
        </p>
	</form>

</div>