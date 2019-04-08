<?php

namespace App\Controllers\defaults;
use App\Controllers\Controller;
use App\User;
use Core\View;

class HomeController extends Controller
{

    public function home()
    {
//	  $varible=['name'=>$name,'family'=>$family,'age'=>[1,2,3,4]];
//    return View::render('home/home',$varible);
        echo View::bladeRender('home/home');
    }

    public function index()
    {
        $arg=User::find(1)->username;
        echo View::bladeRender('index',compact('arg'));
    }
}