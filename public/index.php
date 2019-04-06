<?php
require_once ("../config.php");
/* ==================run router system=======================*/
$route=new Core\Router(request_uri);
include_once("../route/web.php");
