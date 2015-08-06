<div class="contentwrapper">
	
	<form class="stdform formtable" action="../shop/addWorker" method="post" enctype="multipart/form-data">
		<table width="60%" cellspacing="0">
			<tr>
				<td>
					<p>
					<label><b>姓名：</b></label>
			            <span class="field">{$staff_info['staff_name']}</span>
			        </p>
				</td>
				<td>
					<p>
					<label><b>手机：</b></label>
			            <span class="field">{$staff_info['phone_mob']}</span>
			        </p>
				</td>
			</tr>
			<tr>
				<td>
					<p>
						<label><b>所属分类：</b></label>
						<span class="field">
			            	{$staff_info['item_ids']}
						</span>
					</p>
				</td>
				<td>
					<p>
						<label><b>所属商家：</b></label>
					</p>
					<span class="field">
		            	{$staff_info['shop_name']}
                    </span>
				</td>
			</tr>
			<tr>
				<td>
					<p>
						<label><b>健康证：</b></label>
					</p>
					<span class="field">
						{if $staff_info['health_certificate']}
						<img src="{$staff_info['health_certificate']}" alt="" width="100px" height="100px" />
						{else}
						未上传
						{/if}
                    </span>
				</td>
				<td>
					<p>
						<label><b>健康证到期时间：</b></label>
					</p>
					<span class="field">
						{$staff_info['health_date']}
                    </span>
				</td>
			</tr>
			<tr>
				<td>
					<p>
						<label><b>身份证正面：</b></label>
					</p>
					<span class="field">
						{if $staff_info['id_front']}
						<img src="{$staff_info['id_front']}" alt="" width="100px" height="100px" />
						{else}
						未上传
						{/if}
                    </span>
				</td>
				<td>
					<p>
						<label><b>身份证反面：</b></label>
					</p>
					<span class="field">
						{if $staff_info['id_reverse']}
						<img src="{$staff_info['id_reverse']}" alt="" width="100px" height="100px" />
						{else}
						未上传
						{/if}
                    </span>
				</td>
			</tr>
			<tr>
				<td>
					<p>
						<label><b>上岗证：</b></label>
					</p>
					<span class="field">
						{if $staff_info['work_license']}
						<img src="{$staff_info['work_license']}" alt="" width="100px" height="100px" />
						{else}
						未上传
						{/if}
                    </span>
				</td>
				<td>
					<p>
						<label><b>二维码：</b></label>
					</p>
					<span class="field">
						<img src="{$qrcode}" alt="" width="100px" height="100px" />
                    </span>
				</td>
			</tr>
		</table>
	</form>

</div>