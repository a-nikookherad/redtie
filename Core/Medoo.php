<?php

namespace Core;

class Medoo
{
    use Medoo\Medoo;
    public function __construct($database_name,$server='localhost',$username,$password)
    {
        return $database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => $database_name,
            'server' => $server,
            'username' => $username,
            'password' => $password,
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci',
        ]);
    }
}