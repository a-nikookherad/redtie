<?php

use Core\Router;
use Core\View;
/*===============================> route <======================================*/
//home controller route
$route->setRoute('home', 'defaults\homeController@index');
$route->setRoute('/', 'defaults\homeController@home');
$route->setRoute('login', 'defaults\homeController@login');


//admin controller route

$route->setRoute('dashboard','admin\AdminController@dashboard');









/*===============================>page not found <======================================*/
if (Router::$is404 == 1) {
	dd(Router::$is404);
    echo View::bladeRender('404/404');
//    throw new \Exception("this url is not exist!", 404);

}