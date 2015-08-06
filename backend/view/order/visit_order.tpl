<div class="contentwrapper">
	
	<form class="stdform stdform2 formtable" action="../order/visit_order" method="post">
		<input type="hidden" name="order_id" value="{$order_id}">
		<table width="100%" cellspacing="0">
			<tr>
				<td colspan="2">
					<p>
			        	<label>订单评论：</label>
			            <span class="field">
			            	<select name="degree" id="degree">
			            		<option value="5">完美服务</option>
			            		<option value="4">服务较好</option>
			            		<option value="3">服务一般</option>
			            		<option value="1">服务很差</option>
			            		<option value="-1">投诉</option>
			            	</select>
			            </span>
			        </p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
						<label>回访评论记录：</label>
						<span class="field">
	                    	<textarea name="comment" id="comment" cols="30" rows="10"></textarea>
	                    </span>
					</p>
				</td>
			</tr>
		</table>
        <p class="stdformbutton">
        	<button id="submitBtn" class="submit radius2">回访完成</button>
            <input type="reset" class="reset radius2" value="重置">
        </p>
	</form>

</div>