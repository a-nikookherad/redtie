<?php

/*database connection information*/
	$database_type='mysql';
	$database_name='';
	$server='localhost';
	$username='';
	$password='';
/*-----------------------------------------------------------------------------*/
define('protocol',$_SERVER['REQUEST_SCHEME'].'://');
define('host',$_SERVER['HTTP_HOST']);
define('request_uri',$_SERVER['REQUEST_URI']);
define('query_string',$_SERVER['QUERY_STRING']);
define('document_public',host."/public/");





