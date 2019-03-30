<?php

namespace App\Controllers\defaults;

use Core\View;

class HomeController
{

    public function home()
    {
//	    $varible=['name'=>$name,'family'=>$family,'age'=>[1,2,3,4]];
//    return View::render('home/home',$varible);
        echo View::bladeRender('home/home');
    }

    public function index()
    {
        echo View::bladeRender('404/404');
    }
}