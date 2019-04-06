<?php

/*database connection information*/

	$database_type='mysql';
	$database_name='';
	$server='localhost';
	$username='';
	$password='';
	global $database;
	$database = new \Core\MedooDB($database_type,$database_name,$server,$username,$password);
/*-----------------------------------------------------------------------------*/
define('protocol',$_SERVER['REQUEST_SCHEME'].'://');
define('host',$_SERVER['HTTP_HOST']);
define("siteUrl",protocol.host);
dd(siteUrl);
define('request_uri',$_SERVER['REQUEST_URI']);
define('query_string',$_SERVER['QUERY_STRING']);




