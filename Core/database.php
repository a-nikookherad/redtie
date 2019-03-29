<?php

// Using Medoo namespace
use Medoo\Medoo;

// Initialize
$database = new Medoo([
	'database_type' => $database_type,
	'database_name' => $database_name,
	'server' => $server,
	'username' => $username,
	'password' => $password
]);
