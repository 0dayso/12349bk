<div id="contentwrapper" class="contentwrapper">
    

	<table class="infoTable" cellspacing="0" width="60%" border="0">
		<tr>
			<th>订单号：</th>
			<td>{$order_sn}</td>
			<th>订单状态：</th>
			<td>{$status}</td>
		</tr>
		<tr>
			<th>预约类型：</th>
			<td colspan="3">{$type_name}</td>
		</tr>
		<tr>
			<th>下单时间：</th>
			<td>{$add_time}</td>
			<th>完成时间：</th>
			<td>{$finish_time}</td>
		</tr>
		<tr>
			<th>审核时间：</th>
			<td>{$verify_time}</td>
			<th>抢单时间：</th>
			<td>{$work_time}</td>
		</tr>
		<tr>
			<th>服务费用：</th>
			<td>{$amount}</td>
			<th>使用红包：</th>
			<td>{$use_coupon_value}</td>
		</tr>
		<tr>
			<th>应付：</th>
			<td colspan="3">{$order_amount}</td>
		</tr>
		<tr>
			<td colspan="4"><hr></td>
		</tr>
		<tr>
			<th>下单用户：</th>
			<td>{$contact}</td>
			<th>服务商家：</th>
			<td>{$shop_name}</td>
		</tr>
		<tr>
			<th>手机号码：</th>
			<td>{$phone_mob}</td>
			<th>联系电话：</th>
			<td>{$shop_phone}</td>
		</tr>
		<tr>
			<th>预约地址：</th>
			<td>{$address}</td>
			<th>服务人员：</th>
			<td>{$staff_name}</td>
		</tr>
		<tr>
			<th>预约时间：</th>
			<td>{$need_time}</td>
			<th>联系电话：</th>
			<td>{$staff_phone}</td>
		</tr>
		<tr>
			<th>备注：</th>
			<td>{$remark}</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4"><hr></td>
		</tr>
		<tr>
			<th>用户评价:</th>
			<td colspan="3">
				{if $degree eq '-1'}
					<span style="color:red">被投诉</span>
				{elseif $degree eq 'NO_COMMENT'}
					未评论
				{elseif $degree eq '0'}
					<div class="msgstar"></div>
					<div class="msgstar"></div>
					<div class="msgstar"></div>
					<div class="msgstar"></div>
					<div class="msgstar"></div>
				{elseif $degree eq '1'}
					<div class="msgstar starred"></div>
					<div class="msgstar"></div>
					<div class="msgstar"></div>
					<div class="msgstar"></div>
					<div class="msgstar"></div>
				{elseif $degree eq '2'}
					<div class="msgstar starred"></div>
					<div class="msgstar starred"></div>
					<div class="msgstar"></div>
					<div class="msgstar"></div>
					<div class="msgstar"></div>
				{elseif $degree eq '3'}
					<div class="msgstar starred"></div>
					<div class="msgstar starred"></div>
					<div class="msgstar starred"></div>
					<div class="msgstar"></div>
					<div class="msgstar"></div>
				{elseif $degree eq '4'}
					<div class="msgstar starred"></div>
					<div class="msgstar starred"></div>
					<div class="msgstar starred"></div>
					<div class="msgstar starred"></div>
					<div class="msgstar"></div>
				{elseif $degree eq '5'}
					<div class="msgstar starred"></div>
					<div class="msgstar starred"></div>
					<div class="msgstar starred"></div>
					<div class="msgstar starred"></div>
					<div class="msgstar starred"></div>
				{/if}
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="3">
				{$comment}
			</td>
		</tr>
    </table>

</div>