<?php

namespace App\Http\Controllers\defaults;

use App\Http\Controllers\Controller;
use App\User;
use Core\Views;

class HomeController extends Controller
{

    public function home()
    {
//	  $varible=['name'=>$name,'family'=>$family,'age'=>[1,2,3,4]];
//    return View::render('home/home',$varible);
		echo Views::bladeRender('home/home');
    }

    public function index()
    {
		$arg = User::find(1);
		echo Views::bladeRender('index' , compact('arg'));
    }

    public function login()
    {
		echo Views::bladeRender('partials.auth.login');
    }
}