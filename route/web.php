<?php

use Core\Router;
use Core\View;

$route->setRoute('home', 'defaults\homeController@index');
$route->setRoute('/', 'defaults\homeController@home');
//	$route->setRoute('name/{name}/family/{family}','App\Controllers\homeController@home');
if (Router::$is404 == true) {
    echo View::bladeRender('404/404');
    throw new \Exception("this url is not exist!", 404);
}