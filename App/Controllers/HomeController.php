<?php
namespace App\Controllers;
use Core\View;

class HomeController
{

	public function home($name,$family){
	    $varible=['name'=>$name,'family'=>$family,'age'=>[1,2,3,4]];
//    return View::render('home/home',$varible);
        echo View::bladeRender('home/home',$varible);
	}

    public function index()
    {
        echo View::bladeRender('index');
	}
}