<div class="contentwrapper">
	<div class="pageheader notab">
        <h1 class="pagetitle">商家名称： {$shop_info['shop_name']}</h1>
    </div>
	
	<form class="stdform stdform2 formtable" action="../shop/shopCommission" method="post">
		<input type="hidden" name="shop_id" id="shop_id" value="{$shop_info['shop_id']}">
		<table width="60%" cellspacing="0">
			<tr>
				<td>
					<p>
						<label for="">服务名称</label>
						<span class="field"><b>佣金比例</b></span>
					</p>
				</td>
			</tr>
			{foreach from=$items item=item}
			<tr>
				<td>
					<p>
			        	<label>{$item['item_name']}</label>
			            <span class="field"><input type="text" name="rate[{$item['item_id']}]" class="smallinput" value="{$item['rate']}"/></span>
			        </p>
				</td>
			</tr>
			{/foreach}
		</table>
		<br>
        <p class="stdformbutton">
        	<button id="submitBtn" class="submit radius2">提交</button>
            <input type="reset" class="reset radius2" value="重置">
        </p>
	</form>

</div>