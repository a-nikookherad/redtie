<?php

require_once ('vendor/autoload.php');
/*===============================> error handling <======================================*/
/*error handling */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::errorException');


/*=================database connection information===================*/
/*---------------eloquent connection-----------*/
use Core\Capsule;
new Capsule();
/*---------------medoo connection -----------*/
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
define('request_uri',$_SERVER['REQUEST_URI']);
define('query_string',$_SERVER['QUERY_STRING']);




