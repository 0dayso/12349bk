<div class="contentwrapper">
	
	<form class="stdform" action="../dashboard/manageadmin" method="post">
		<p>
        	<label>用户名：</label>
            <span class="field"><input type="text" name="admin_name" class="smallinput" /></span>
        </p>
        {if $type eq 'add'}
        <p>
        	<label>密码：</label>
            <span class="field"><input type="password" name="admin_password" class="smallinput" /></span>
        </p>
        {/if}
        <p>
        	<label>姓名：</label>
            <span class="field"><input type="text" name="true_name" class="smallinput" /></span>
        </p>
        <p>
        	<label>手机号：</label>
            <span class="field"><input type="text" name="phone_mob" class="smallinput" /></span>
        </p>
        <p>
        	<label>用户组：</label>
        	<select name="group_id" id="group_id">
        		{html_options options=$groups}
        	</select>
        </p>
        <p>
        	<label>是否启用：</label>
            <span class="formwrapper">
            	<input type="radio" name="radiofield" checked="checked" /> 是 &nbsp; &nbsp;
            	<input type="radio" name="radiofield" /> 否 &nbsp; &nbsp;
            </span>
        </p>

        <br>
        <p class="stdformbutton">
        	<button class="submit radius2">提交</button>
            <input type="reset" class="reset radius2" value="重置">
        </p>
	</form>

</div>