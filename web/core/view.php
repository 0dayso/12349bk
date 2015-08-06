<?php

// 定义Smarty 模板引擎

require VENDER_PATH.'/smarty/Smarty.class.php';

// 注册Smarty未模板类
Flight::register('view', 'Smarty', array(), function($smarty){
    $smarty->template_dir = LOG_PATH.'/templates/';
    $smarty->compile_dir = LOG_PATH.'/templates_c/';
    $smarty->config_dir = LOG_PATH.'/config/';
    $smarty->cache_dir = LOG_PATH.'/cache/';
    // 强制编译
    $smarty->force_compile = true;
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

		    $leftMenu = Flight::renderLeft();

		    $_s = new stdClass();
		    $_s->cssHeader = $cssHeader;
			$_s->jsHeader  = $jsHeader;
			$_s->mainContentLink = $template;

			// Socket Url & Port
			$_s->websocket_url = Flight::get('WEBSOCKET_URL');
			$_s->websocket_port = Flight::get('WEBSOCKET_PORT');

			// 加载单个页面
			if(!empty($data))
		    	Flight::view()->assign($data);

			Flight::view()->assign('_s', $_s);
			Flight::view()->display(VIEW_PATH.'/index.tpl');

		}else{
			// 加载单个页面
			if(!empty($data))
		    	Flight::view()->assign($data);
		    Flight::view()->display($template);
		}


	}else{
		header("Content-type: text/html; charset=utf-8"); 
		Handle::result("找不到模板{$template}");
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
Flight::map('printcss', function() {

	$csshtml = '';

	if(Flight::has('csslib')) {
		foreach (Flight::get('csslib') as $value) {
			if(! strpos($value, '?'))
		        $csshtml .= "<link href=\"" . $value . "?v=" . Flight::get('VERSION') . "\" rel=\"stylesheet\" >\n";
	      	else
		        $csshtml .= "<link href=\"" . $value . "&v=" . Flight::get('VERSION') . "\" rel=\"stylesheet\" >\n";
		}
		
	}

	return $csshtml;
});

// 打印js
Flight::map('printjs', function() {
	$jshtml = '';

	if(Flight::has('jslib')) {
		foreach (Flight::get('jslib') as $value) {
			if(! strpos($value, '?'))
	       		$jshtml .= "<script type='text/javascript' src=\"" . $value . "?v=" . Flight::get('VERSION') . "\"></script>\n";
	      	else
	        	$jshtml .= "<script type='text/javascript' src=\"" . $value . "&v=" . Flight::get('VERSION') . "\"></script>\n";
		}
	}

	return $jshtml;
});

Flight::map('defaultassets', function($tag = 1) {

	if($tag == 1) { // css
		$html = '<link rel="stylesheet" href="/public/css/bootstrap.min.css" type="text/css" />
		<link rel="stylesheet" href="/public/css/font-awesome.min.css" type="text/css" />';
	}else{
		$html = '<script type="text/javascript" src="/public/js/plugins/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/public/js/plugins/bootstrap.min.js"></script>
		<script type="text/javascript" src="/public/js/plugins/jqBootstrapValidation.js"></script>';
	}

	return $html;
});