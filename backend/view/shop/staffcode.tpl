<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>服务人员二维码</title>
	<link rel="stylesheet" href="/public/css/style.default.css" type="text/css" />
</head>
<body>
	
	<table class="stdtable" cellspacing="0" width="90%">
		<thead>
			<tr>
				<th>#</th>
				<th>商家名</th>
				<th>服务人员姓名</th>
				<th>服务人员二维码</th>
			</tr>
		</thead>
		<tbody>
			{foreach from=$res item=item}
			<tr>
				<td>{$item.index}</td>
				<td>{$item.shop_name}</td>
				<td>{$item.staff_name}</td>
				<td>
					<img src="{$item.qcUrl}" width="210px" height="210px">
				</td>
			</tr>
			{/foreach}
		</tbody>
	</table>

</body>
</html>