        <p>
        	<label>权限设置：</label>
            <span class="formwrapper">
            	<table border="0" cellspacing="0" colspacing="0" style="width: 50%;">
            		{foreach from=$pers item=item key=mainkey}
					<tr>
						<td>{$item.title}</td>
						{foreach from=$item.subs item=sub key=key}
						<td><input type="checkbox" name="check[{$mainkey}][{$key}]" /> {$sub} </td>
						{/foreach}
					</tr>
					{/foreach}
            	</table>
            </span>
        </p>