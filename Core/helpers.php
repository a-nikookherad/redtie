<?php
include_once("../config.php");
if (!function_exists('dd')) {
	function dd($input1)
	{
		if (isset($input1)) {
			if (is_array($input1) or is_object($input1)) {
				echo '<pre>';
//		var_dump($input1);
				print_r($input1);
				echo '</pre>';
				die;
			} else {
				echo '<pre>' . $input1 . '</pre><br>';
				die;
			}
		} else {
			echo 'this ' . $input1 . 'variable is null';
		}
	}

}

if (!function_exists('view')) {
	function view($input)
	{
		$input = str_replace('.' , '/' , $input);
		require_once("App\\Views\\" . $input . ".php");
	}
}

if (!function_exists('views')) {
	function views($input , $arg = [])
	{
		$input = str_replace('.' , '/' , $input);
		\Core\Views::bladeRender($input , $arg);
	}
}