<div id="contentwrapper" class="contentwrapper">
    <table id="processorder" class="stdtable" cellspacing="0" width="100%">
    </table>
</div>

<div class="hide">
	<div id="dialog" title="请选择商家服务人员" style="">
		<form class="stdform formtable" action="../order/assignWorker">
			<table width="100%" cellspacing="0" collspacing="0">
				<tr>
					<td>
						<p>
				        	<label>商家</label>
				            <span class="field">
				            	<select name="shop" id="shop" data-placeholder="请选择商家" class="chzn-select" style="width:350px;" tabindex="-1">
				            		<option value="">请选择商家</option>
									{html_options options=$shops}
								</select>
							</span>
				        </p>
					</td>
				</tr>
				<tr style="display: none;">
					<td>
						<p>
				        	<label>服务人员</label>
				            <span class="field">
				            	<select name="staff_id" id="staff_id" data-placeholder="请选择服务人员" class="chzn-select" style="width:350px;" tabindex="-1">
								</select>
							</span>
				        </p>
					</td>
				</tr>
			</table>
			<p class="stdformbutton">
	        	<button id="submitBtn" class="submit radius2">提交</button>
	        </p>
		</form>

	</div>
</div>