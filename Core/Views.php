<?php

namespace Core;
use mysql_xdevapi\Exception;
use Philo\Blade\Blade;

class Views
{
	public static function viewRender($file , $args = [])
    {
        extract($args,EXTR_SKIP);
        if (is_readable($file)){
            require_once $file;
        }else{
            self::render('404/404');
            throw new \Exception("{$file} is not exist!",404);
        }
    }

    public static function bladeRender($template,$args=[])
    {
		$view = realpath(__DIR__ . "/../resources/views");
        $cache= realpath(__DIR__."/../storage/views");
        $blade=new Blade($view,$cache);
		echo $blade->view()->make($template , $args)->render();
    }
}