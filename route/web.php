<?php

use Core\Router;
use Core\Views;
/*===============================> route <======================================*/
//home controller route
$route->setRoute('home', 'defaults\homeController@index');
$route->setRoute('/', 'defaults\homeController@home');
$route->setRoute('login', 'defaults\homeController@login');


//admin controller route

$route->setRoute('dashboard','admin\AdminController@dashboard');
$route->setRoute('dashboard/whoami' , 'admin\AdminController@who');



/*===============================>page not found <======================================*/
if (Router::$is404 == 1) {
	echo Views::bladeRender('partials/404/404');
//    throw new \Exception("this url is not exist!", 404);

}