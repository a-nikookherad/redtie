<?php

$route->setRoute('home','homeController@index');
$route->setRoute('/','defaults\homeController@home');
//	$route->setRoute('name/{name}/family/{family}','App\Controllers\homeController@home');
