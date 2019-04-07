<?php

namespace Core;
use mysql_xdevapi\Exception;
use Philo\Blade\Blade;

class View
{
    public static function render($view,$args=[])
    {
        extract($args,EXTR_SKIP);
        preg_replace('/\./','\/',$view);
        $file="../App/views/{$view}.php";
        if (is_readable($file)){
            require_once $file;
        }else{
            self::render('404/404');
            throw new \Exception("{$file} is not exist!",404);
        }
    }

    public static function bladeRender($template,$args=[])
    {
        $view= realpath(__DIR__."/../App/Views");
        $cache= realpath(__DIR__."/../storage/views");
        $blade=new Blade($view,$cache);
        return $blade->view()->make($template,$args)->render();
    }
}