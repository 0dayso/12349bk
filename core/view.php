<?php

// 定义Smarty 模板引擎

require VENDER_PATH.'/smarty/Smarty.class.php';

// 注册Smarty未模板类
Flight::register('view', 'Smarty', array(), function($smarty){
    $smarty->template_dir = LOG_PATH.'/templates/';
    $smarty->compile_dir = LOG_PATH.'/templates_c/';
    $smarty->config_dir = LOG_PATH.'/config/';
    $smarty->cache_dir = LOG_PATH.'/cache/';
});

// 覆盖模板默认渲染方式
Flight::map('render', function($template, $data = array(), $isall = true){

	if(file_exists(VIEW_PATH.'/'.$template.'.tpl')) {

		$template = VIEW_PATH.'/'.$template.'.tpl';
		if($isall) {

			// 默认css
			$cssHeader = Flight::printcss();
			$jsHeader = Flight::printjs();

			$csshtml = Flight::defaultassets(1);
			$jshtml = Flight::defaultassets(2);

			$cssHeader = $csshtml.$cssHeader;
			$jsHeader = $jshtml.$jsHeader;

			$aModule = explode('/', $path); // 获取当前模块,like dashboard/index, 即为dashboard模块
		    $leftMenu = Flight::renderLeft($aModule[0],$aModule[1]);

		    $_s = new stdClass();
		    $_s->login_user = $_SESSION['admin_name'];
		    $_s->cssHeader = $cssHeader;
			$_s->jsHeader  = $jsHeader;
			$_s->leftMenu   = $leftMenu;
			$_s->mainContentLink = $template;

			$_s->videoUrl = $guideVideos[strtoupper($aModule[0])];
			
			
			$smarty->assign('_s', $_s);
			$smarty->display(VIEW_PATH.'/index.tpl');

		}else{
			// 加载单个页面
			if(!empty($data))
		    	Flight::view()->assign($data);
		    Flight::view()->display($template);
		}


	}else{
		header("Content-type: text/html; charset=utf-8"); 
		die("找不到模板{$template}");
	}
	
});

// 注册CSS Render
Flight::map('cssrender', function($csspath) {
	if(!Flight::has('csslib')) {
		Flight::set('csslib', array());
	}

	$tmp = Flight::get('csslib');
	if(!in_array($csspath, $tmp)) {
		$tmp[] = $csspath;
	}
	Flight::set('csslib', $tmp);
});

// 注册js Render
Flight::map('jsrender', function($jspath) {
	if(!Flight::has('jslib')) {
		Flight::set('jslib', array());
	}

	$tmp = Flight::get('jslib');
	if(!in_array($jspath, $tmp)) {
		$tmp[] = $jspath;
	}
	Flight::set('jslib', $tmp);
});

// 打印js
Flight::map('printscss', function() {

	$csshtml = '';

	foreach (Flight::get('csslib') as $value) {
		if(! strpos($value, '?'))
	        $csshtml .= "<link href=\"" . $value . "?v=" . VERSION . "\" rel=\"stylesheet\" >\n";
      	else
	        $csshtml .= "<link href=\"" . $value . "&v=" . VERSION . "\" rel=\"stylesheet\" >\n";
	}

	return $csshtml;
});

// 打印js
Flight::map('printsjs', function() {
	$jshtml = '';

	foreach (Flight::get('jslib') as $value) {
		if(! strpos($value, '?'))
       		$jshtml .= "<script src=\"" . $value . "?v=" . VERSION . "\"></script>\n";
      	else
        	$jshtml .= "<script src=\"" . $value . "&v=" . VERSION . "\"></script>\n";
	}

	return $jshtml;
});

Flight::map('defaultassets', function($tag = 1) {

	if($tag = 1) { // css
		$html = '<link rel="stylesheet" href="/public/css/style.default.css" type="text/css" />';
	}else{
		$html = '
		<script type="text/javascript" src="/public/js/plugins/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="/public/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
		<script type="text/javascript" src="/public/js/plugins/jquery.cookie.js"></script>
		<script type="text/javascript" src="/public/js/plugins/jquery.uniform.min.js"></script>
		<script type="text/javascript" src="/public/js/plugins/jquery.flot.min.js"></script>
		<script type="text/javascript" src="/public/js/plugins/jquery.flot.resize.min.js"></script>
		<script type="text/javascript" src="/public/js/plugins/jquery.slimscroll.js"></script>
		<script type="text/javascript" src="/public/js/custom/general.js"></script>
		<script type="text/javascript" src="/public/js/custom/dashboard.js"></script>';
	}

	return $html;
});

// 初始化默认模块
Flight::map('renderLeft', function($module, $act) {

	


	
});