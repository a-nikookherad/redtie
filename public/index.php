<?php
require_once ("../config.php");

/*===============================> error handling <======================================*/
/*error handling */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::errorException');


/* ----------------------------------------------------------------*/
$route=new Core\Router(request_uri);
	include_once("../route/web.php");
