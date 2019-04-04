<?php

namespace App\Controllers\defaults;
use App\Controllers\Controller;
use Core\MedooDB;
use Core\View;
global $database;
$medoo=new MedooDB();
$database=$medoo->database;
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
        global $database;
        $arg=$database->select("users_tbl","*");
        echo View::bladeRender('index',compact('arg'));
    }
}