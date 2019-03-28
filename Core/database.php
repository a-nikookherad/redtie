<?php

include_once("./medoo.php");

// If you installed via composer, just use this code to require autoloader on the top of your projects.
require_once 'Medoo.php';

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

// Enjoy
$database->insert('account', [
	'user_name' => 'foo',
	'email' => 'foo@bar.com'
]);

$data = $database->select('account', [
	'user_name',
	'email'
], [
	'user_id' => 50
]);

/*// echo json_encode($data);

// [
//     {
//         "user_name" : "foo",
//         "email" : "foo@bar.com"
//     }
// ]*/