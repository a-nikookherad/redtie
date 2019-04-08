<?php

namespace Core;
use Illuminate\Database\Capsule\Manager as Manager;

class Capsule
{
    public function __construct()
    {
        $capsule=new Manager();
        $capsule->addConnection([
            'driver' => "mysql",
            'host' => "localhost",
            'port' => "3306",
            'database' => "redtie",
            'username' => "root",
            'password' => "",
            'charset' => "utf8",
            'collation' => "utf8_general_ci",
        ]);
        $capsule->bootEloquent();
    }
}