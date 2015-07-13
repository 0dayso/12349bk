{if $type == 'add'}

<div class="contentwrapper">
	
	<form class="stdform stdform2" action="../marketing/addRule" method="post">
        <p>
        	<label>券码名称：</label>
            <span class="field"><input type="text" name="coupon_name" class="smallinput" /></span>
        </p>
        <p>
            <label>券码类型</label>
            <span class="field">
                <select name="coupon_type" id="coupon_type"  data-placeholder="请选择券码类型" class="chzn-select" style="width:350px;" tabindex="2">
                    <option value="0">现金券</option>
                    <option value="1">满减券</option>
                    <option value="2">服务抵消券</option>
                </select>
            </span>
        </p>
        <p class="p_items">
            <label>服务类型(可多选)：</label>
            <span class="field">
                <select name="item_ids[]" id="item_ids" data-placeholder="请选择类型" class="chzn-select" multiple="multiple" style="width:350px;" tabindex="4">
                    {html_options options=$ser_items}
                </select>
            </span>
        </p>
        <p class="p_money">
            <label for="">优惠金额</label>
            <span class="field">
                <input type="text" name="money" id="money" class="smallinput" />
            </span>
        </p>
        <p class="p_minprice">
            <label for="">最低消费金额</label>
            <span class="field">
                <input type="text" name="minprice" id="minprice" class="smallinput" />
            </span>
        </p>
        <p>
            <label for="">有效期类型</label>
            <span class="field">
                <select name="canusetype" id="canusetype"  data-placeholder="请选择有效期类型" class="chzn-select" style="width:350px;" tabindex="2">
                    <option value="0">开始 ~ 结束</option>
                    <option value="1">N天有效</option>
                </select>
            </span>
        </p>
        <p class="p_canuseday">
            <label for="">有效天数</label>
            <span class="field">
                <input type="text" name="canuseday" id="canuseday" class="smallinput" />
            </span>
        </p>
        <p class="p_begintime">
            <label for="">开始时间</label>
            <span class="field">
                <input id="begintime" name="begintime" type="text" class="width100">
            </span>
        </p>
        <p class="p_endtime">
            <label for="">结束时间</label>
            <span class="field">
                <input id="endtime" name="endtime" type="text" class="width100">
            </span>
        </p>
        <p>
            <label for="">最大发放量(0不限制)</label>
            <span class="field">
                <input type="text" name="maxnum" class="smallinput" />
            </span>
        </p>
        <p>
            <label for="">券码前缀</label>
            <span class="field">
                <input type="text" name="prefix" class="smallinput" />
            </span>
        </p>
        <p>
        	<label>是否启用：</label>
            <span class="field formwrapper">
            	<input type="radio" name="isuse" value="1" checked="checked" /> 是 &nbsp; &nbsp;
            	<input type="radio" name="isuse" value="0" /> 否 &nbsp; &nbsp;
            </span>
        </p>

        <br>
        <p class="stdformbutton">
        	<button id="submitBtn" class="submit radius2">提交</button>
            <input type="reset" class="reset radius2" value="重置">
        </p>
	</form>

</div>

{else}
<div class="contentwrapper">
    
    <form class="stdform stdform2" action="../marketing/editRule" method="post">
        <input type="hidden" id="id" name="id" value="{$rule['id']}">
        <p>
            <label>券码名称：</label>
            <span class="field"><input type="text" name="coupon_name" class="smallinput" value="{$rule['coupon_name']}"/></span>
        </p>
        <p>
            <label>券码类型</label>
            <span class="field">
                <select name="coupon_type" id="coupon_type"  data-placeholder="请选择券码类型" class="chzn-select" style="width:350px;" tabindex="2">
                    <option value="0" {if $rule['coupon_type'] eq '0'}selected="selected"{/if}>现金券</option>
                    <option value="1" {if $rule['coupon_type'] eq '1'}selected="selected"{/if}>满减券</option>
                    <option value="2" {if $rule['coupon_type'] eq '2'}selected="selected"{/if}>服务抵消券</option>
                </select>
            </span>
        </p>
        <input type="hidden" id="hiden_types" value="{$rule['item_ids']}" />
        <p class="p_items">
            <label>服务类型(可多选)：</label>
            <span class="field">
                <select name="item_ids[]" id="item_ids" data-placeholder="请选择类型" class="chzn-select" multiple="multiple" style="width:350px;" tabindex="4">
                    {html_options options=$ser_items}
                </select>
            </span>
        </p>
        <p class="p_money">
            <label for="">优惠金额</label>
            <span class="field">
                <input type="text" name="money" id="money" class="smallinput" value="{$rule['money']}"/>
            </span>
        </p>
        <p class="p_minprice">
            <label for="">最低消费金额</label>
            <span class="field">
                <input type="text" name="minprice" id="minprice" class="smallinput" value="{$rule['minprice']}" />
            </span>
        </p>
        <p>
            <label for="">有效期类型</label>
            <span class="field">
                <select name="canusetype" id="canusetype"  data-placeholder="请选择有效期类型" class="chzn-select" style="width:350px;" tabindex="2">
                    <option value="0" {if $rule['canusetype'] eq "0"}selected{/if}>开始 ~ 结束</option>
                    <option value="1" {if $rule['canusetype'] eq "1"}selected{/if}>N天有效</option>
                </select>
            </span>
        </p>
        <p class="p_canuseday">
            <label for="">有效天数</label>
            <span class="field">
                <input type="text" name="canuseday" id="canuseday" class="smallinput"value="{$rule['canuseday']}"  />
            </span>
        </p>
        <p class="p_begintime">
            <label for="">开始时间</label>
            <span class="field">
                <input id="begintime" name="begintime" type="text" class="width100" value="{$rule['begintime']}" >
            </span>
        </p>
        <p class="p_endtime">
            <label for="">结束时间</label>
            <span class="field">
                <input id="endtime" name="endtime" type="text" class="width100" value="{$rule['endtime']}" >
            </span>
        </p>
        <p>
            <label for="">最大发放量(0不限制)</label>
            <span class="field">
                <input type="text" name="maxnum" class="smallinput" value="{$rule['maxnum']}"/>
            </span>
        </p>
        <p>
            <label for="">券码前缀</label>
            <span class="field">
                <input type="text" name="prefix" class="smallinput" value="{$rule['prefix']}" />
            </span>
        </p>
        <p>
            <label>是否启用：</label>
            <span class="field formwrapper">
                <input type="radio" name="isuse" value="1" {if $rule['isuse'] eq "1"}checked="checked"{/if} /> 是 &nbsp; &nbsp;
                <input type="radio" name="isuse" value="0" {if $rule['isuse'] eq "0"}checked="checked"{/if}/> 否 &nbsp; &nbsp;
            </span>
        </p>

        <br>
        <p class="stdformbutton">
            <button id="submitBtn" class="submit radius2">提交</button>
            <input type="reset" class="reset radius2" value="重置">
        </p>
    </form>

</div>
{/if}