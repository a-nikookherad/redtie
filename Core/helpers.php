<?php
include_once("../config.php");
if (!function_exists('dd')) {
	function dd($input1)
	{
		if (is_array($input1)) {
			echo '<pre>';
//		var_dump($input1);
			print_r($input1);
			echo '</pre>';
			die;
		} else {
			echo '<pre>' . $input1 . '</pre><br>';
			die;
		}
	}
}

if (!function_exists('view')) {
	function view($input)
	{
		$input = str_replace('.' , '/' , $input);
		require_once("App\\views\\" . $input . ".php");
	}
}

if (!function_exists('readModules')) {
	function readModules($path)
	{
//		$file=siteUrl.''
//        require_once ($file);
	}
}