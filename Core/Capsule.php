<?php
namespace Core;
use Illuminate\Database\Capsule\Manager as Manager;

class Capsule
{
	public function __construct($database_type = 'mysql' , $database_name = 'redtie' , $server = '127.0.0.1' , $username = 'root' , $password = '')
    {
        $capsule=new Manager();
        $capsule->addConnection([
			'driver' => $database_type ,
			'host' => $server ,
            'port' => "3306",
			'database' => $database_name ,
			'username' => $username ,
			'password' => $password ,
            'charset' => "utf8",
            'collation' => "utf8_general_ci",
        ]);
        $capsule->bootEloquent();
    }
}