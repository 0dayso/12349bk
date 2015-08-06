<div class="contentwrapper">
	<table id="yearcouptable" class="stdtable" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th class="head0">#</th>
				<th class="head1">订单号</th>
				<th class="head0">手机号</th>
				<th class="head1">优惠券发放情况</th>
				<th class="head0">购买时间</th>
			</tr>
		</thead>
		<tbody>
			{foreach from=$coups item=item}
				<tr>
					<td>{$item.INDEX}</td>
					<td>{$item.r_order_sn}</td>
					<td>{$item.phone_mob}</td>
					<td>{$item.state}</td>
					<td>{$item.buy_time}</td>
				</tr>
			{/foreach}
		</tbody>
    </table>
</div>