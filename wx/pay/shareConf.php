<?php
	require_once "../sdk/jsSDK.php";
	$jssdk = new JSSDK("wxc015c45312ad173d", "e1c27ea61912a52f6552d41979204ae0");
	$signPackage = $jssdk->GetSignPackage();
	$share_title ="12349便民服务家政套餐,100元包全年。";
	$share_desc  ="常州12349智慧生活服务平台";
	$share_link  ="http://wx.12349.loukou.com/pay/100.php";
	$share_img   ="http://wx.12349.loukou.com/assets/images/sharePic.jpg";
?>

<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
	wx.config({
	  	debug    : false,
	    appId    : '<?php echo $signPackage["appId"] ?>',
	    timestamp: '<?php echo $signPackage["timestamp"] ?>',
	    nonceStr : '<?php echo $signPackage["nonceStr"] ?>',
	    signature: '<?php echo $signPackage["signature"] ?>',
	    jsApiList: [
	        'onMenuShareTimeline',
			'onMenuShareAppMessage',
			'onMenuShareQQ',
			'onMenuShareWeibo',
			'onMenuShareQZone',
			'hideOptionMenu',
			'showOptionMenu',
			'hideMenuItems',
			'showMenuItems',
			'hideAllNonBaseMenuItem',
			'showAllNonBaseMenuItem'
	    ]
	 });

  

  wx.ready(function () {
  	
  	wx.onMenuShareTimeline({
	    title : '<?php  echo $share_title ?>', // 分享标题
	    link  : '<?php  echo $share_link ?>', // 分享链接
	    imgUrl: '<?php  echo $share_img ?>', // 分享图标
	    success: function () { 

	    }
	});

	wx.onMenuShareAppMessage({
	    title : '<?php  echo $share_title ?>', // 分享标题
	    desc  : '<?php  echo $share_desc ?>', // 分享描述
	    link  : '<?php  echo $share_link ?>', // 分享链接
	    imgUrl: '<?php  echo $share_img ?>', // 分享图标
	    success: function () { 

	    }
	});

	wx.onMenuShareQQ({
	    title : '<?php  echo $share_title ?>', // 分享标题
	    desc  : '<?php  echo $share_desc ?>', // 分享描述
	    link  : '<?php  echo $share_link ?>', // 分享链接
	    imgUrl: '<?php  echo $share_img ?>', // 分享图标
	    success: function () { 

	    }
	});

	wx.onMenuShareWeibo({
	    title : '<?php  echo $share_title ?>', // 分享标题
	    desc  : '<?php  echo $share_desc ?>', // 分享描述
	    link  : '<?php  echo $share_link ?>', // 分享链接
	    imgUrl: '<?php  echo $share_img ?>', // 分享图标
	    success: function () { 

	    }
	});

	wx.onMenuShareQZone({
	    title : '<?php  echo $share_title ?>', // 分享标题
	    desc  : '<?php  echo $share_desc ?>', // 分享描述
	    link  : '<?php  echo $share_link ?>', // 分享链接
	    imgUrl: '<?php  echo $share_img ?>', // 分享图标
	    success: function () { 

	    }
	});

	wx.showMenuItems({
	    menuList: ['menuItem:profile','menuItem:addContact','menuItem:share:appMessage','menuItem:share:timeline','menuItem:share:qq'] // 要显示的菜单项，所有menu项见附录3
	});
  });
</script>

<?php require_once 'cs.php';echo '<img src="'._cnzzTrackPageView(1255834712).'" width="0" height="0"/>';?>