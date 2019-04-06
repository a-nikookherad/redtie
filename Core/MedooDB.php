<?php

namespace Core;
use Medoo\Medoo;
class MedooDB
{
    public $database;
    public function __construct($database_type='mysql',$database_name='redtie',$server='127.0.0.1',$username='root',$password='')
    {
        $this->database = new Medoo([
            'database_type' => $database_type,
            'database_name' => $database_name,
            'server' => $server,
            'username' => $username,
            'password' => $password,
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci',
        ]);
    }

/*    public function insert($data)
    {
        $table=$this->table;
        $database=$this->database;
        $database->insert($table,$data);
    }

    public function select($columns,$where=[])
    {
        $table=$this->table;
        $database=$this->database;
        $database->select($table,null,$columns,$where);
    }

    public function update($data,$where)
    {
        $table=$this->table;
        $database=$this->database;
        $database->update($table,$data,$where);
    }

    public function delete($where)
    {
        $table=$this->table;
        $database=$this->database;
        $database->delete($table,$where);
    }*/
}