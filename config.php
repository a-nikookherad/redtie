<?php
/* start global class and function */
require  'vendor/autoload.php';

/*-----------------------------------------------------------------------------*/
	define('protocol',$_SERVER['REQUEST_SCHEME'].'://');
	define('host',$_SERVER['HTTP_HOST']);
	define('request_uri',$_SERVER['REQUEST_URI']);
	define('query_string',$_SERVER['QUERY_STRING']);



