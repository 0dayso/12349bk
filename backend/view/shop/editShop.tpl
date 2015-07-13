<div class="contentwrapper">
	
	<form class="stdform formtable" action="../shop/editShop" method="post" enctype="multipart/form-data">
		<input type="hidden" name="shop_id" id="shop_id" value="{$shop_info['shop_id']}">
		<table width="60%" cellspacing="0">
			<tr>
				<td>
					<p>
			        	<label>商家名称：</label>
			            <span class="field"><input type="text" name="shop_name" class="smallinput" value="{$shop_info['shop_name']}"/></span>
			        </p>
				</td>
				<td>
					<input type="hidden" id="hideItems"  value="{$shop_info['item_ids']}">
					<p>
			        	<label>商家类型：</label>
			            <span class="field">
			            	<select name="item_ids[]" id="item_ids" data-placeholder="请选择类型" class="chzn-select" multiple="multiple" style="width:350px;" tabindex="4">
								{html_options options=$ser_items}
							</select>
						</span>
			        </p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
						<label>商家地址</label>
						<span class="field">
							<select name="region_id" id="region_id"  data-placeholder="请选择区域" class="chzn-select" style="width:350px;" tabindex="2">
								{html_options options=$regions selected=$shop_info['region_id']}
							</select>
							<br>
							<input type="text" name="address" class="smallinput" style="margin-top: 5px;" placeholder="请填写详细地址" value="{$shop_info['address']}"/>
						</span>
					</p>
				</td>
			</tr>
			<tr>
				<td>
					<p>
						<label>营业执照：</label>
					</p>
					<span class="field">
						<img src="{$shop_info['business_license']}" alt="" width="100px" height="100px"/><br>
                    	<input type="file" name="business_license" />
                    </span>
				</td>
				<td>
					<p>
						<label>法人身份证：</label>
					</p>
					<span class="field">
						<img src="{$shop_info['legal_person']}" alt="" width="100px" height="100px"/><br>
                    	<input type="file" name="legal_person" />
                    </span>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
						<label>上传公司LOGO：</label>
					</p>
					<span class="field">
						{if $shop_info['logo']}
						<img src="{$shop_info['logo']}" alt="" width="100px" height="100px"/><br>
						{/if}
                    	<input type="file" name="logo" />
                    </span>
				</td>
			</tr>
			<tr>
				<td>
					<p>
			        	<label>负责人：</label>
			            <span class="field"><input type="text" name="officer" class="smallinput" value="{$shop_info['officer']}"/></span>
			        </p>
				</td>
				<td>
					<p>
			        	<label>开户行：</label>
			            <span class="field"><input type="text" name="bank" class="smallinput" value="{$shop_info['bank']}" /></span>
			        </p>
				</td>
			</tr>
			<tr>
				<td>
					<p>
			        	<label>联系手机号：</label>
			            <span class="field"><input type="text" name="phone" class="smallinput" value="{$shop_info['phone']}" /></span>
			        </p>
				</td>
				<td>
					<p>
			        	<label>开户账号（姓名）：</label>
			            <span class="field"><input type="text" name="bank_account_name" class="smallinput" value="{$shop_info['bank_account_name']}" /></span>
			        </p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
						<label>收款账号（卡号）：</label>
					</p>
					<span class="field"><input type="text" name="bank_accunt" class="smallinput" value="{$shop_info['bank_accunt']}" /></span>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
                        <label>结算类型</label>
                        <span class="field">
                        	<input type="radio" name="check_type" value="1" {if $shop_info['check_type'] eq '1'}checked="checked"{/if}/>月结 &nbsp; &nbsp;
                        	<input type="radio" name="check_type" value="2" {if $shop_info['check_type'] eq '2'}checked="checked"{/if}/> 半月结 &nbsp; &nbsp;
                        	<input type="radio" name="check_type" value="3" {if $shop_info['check_type'] eq '3'}checked="checked"{/if}/> 周结 &nbsp; &nbsp;
                        </span>
                    </p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
                        <label>是否启用</label>
                        <span class="field">
                        	<input type="radio" name="is_use" value="1" {if $shop_info['is_use'] eq '1'}checked="checked"{/if}/>是 &nbsp; &nbsp;
                        	<input type="radio" name="is_use" value="0" {if $shop_info['is_use'] eq '0'}checked="checked"{/if}/> 否 &nbsp; &nbsp;
                        </span>
                    </p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
                        <label>是否推荐</label>
                        <span class="field">
                        	<input type="radio" name="is_recommend" value="1" {if $shop_info['is_use'] eq '1'}checked="checked"{/if}/>是 &nbsp; &nbsp;
                        	<input type="radio" name="is_recommend" value="0" {if $shop_info['is_use'] eq '0'}checked="checked"{/if}/> 否 &nbsp; &nbsp;
                        </span>
                    </p>
				</td>
			</tr>
		</table>
		<br>
        <p class="stdformbutton">
        	<button id="submitBtn" class="submit radius2">提交</button>
            <input type="reset" class="reset radius2" value="重置">
        </p>
	</form>

</div>