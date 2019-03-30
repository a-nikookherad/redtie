<?php

$route->setRoute('home', 'homeController@index');
$route->setRoute('/', 'defaults\homeController@home');
//	$route->setRoute('name/{name}/family/{family}','App\Controllers\homeController@home');

if (\Core\Router::$is404 == false) {
    throw new \Exception("this url is not exist!", 404);
}