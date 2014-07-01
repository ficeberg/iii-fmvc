<?php

function feo(){
	global $config;

	// Set our defaults
	$controller = $config['default_controller'];
	$action = 'index';
	$url = '';

	// Get request url and script url
	$request_url = isset($_SERVER['REQUEST_URI']) ? replacer($_SERVER['REQUEST_URI'], $config['sub_folder']) : '';
	$script_url  = isset($_SERVER['PHP_SELF']) ? replacer($_SERVER['PHP_SELF'], $config['sub_folder']) : '';

	// Get our url path and trim the / of the left and the right
	$url = ($request_url != $script_url) ?
		trim(preg_replace('/'. str_replace('/', '\/', str_replace('index.php', '', $script_url)) .'/', '', $request_url, 1), '/') :
		trim($request_url, '/');

	// Split the url into segments
	$segments = explode('/', $url);

	// Do our default checks
	if(isset($segments[0]) && $segments[0] != '') $controller = $segments[0];
	if(isset($segments[1]) && $segments[1] != '') $action = $segments[1];

	//echo 'request_url is '.$request_url.'<br>script_url is '.$script_url.'<br> url is '.$url.'<br>controller is '.$controller.' action is '.$action ;

	// Get our controller file
	$path = APP_DIR . 'controllers/' . $controller . '.php';
	if(file_exists($path)){
		require_once($path);
	} else {
		$controller = $config['error_controller'];
		require_once(APP_DIR . 'controllers/' . $controller . '.php');
	}

	// Check the action exists
	if(!method_exists($controller, $action)){
		$controller = $config['error_controller'];
		require_once(APP_DIR . 'controllers/' . $controller . '.php');
		$action = 'index';
	}

	// Create object and call method
	$obj = new $controller;
	die($obj->$action());
}

function replacer($urlPattern, $subFolder){
	return str_replace_once(
		array(
			'index.php',
			$subFolder
			),
		array(
			'',
			''),
		$urlPattern
	);
}

function str_replace_once($str_pattern, $str_replacement, $string){
	if (strpos(chr( (int) $string), chr( (int) $str_pattern)) !== false){
		$occurrence = strpos($string, $str_pattern);
		return substr_replace($string, $str_replacement, strpos($string, $str_pattern), strlen($str_pattern));
	}
	return $string;
}