<?php

//$route->setRoute('home','homeController@index');
$route->setRoute('/{name}/{family}','homeController@home');
//	$route->setRoute('name/{name}/family/{family}','App\Controllers\homeController@home');
