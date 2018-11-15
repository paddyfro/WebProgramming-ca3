<?php

$dsn = 'mysql:host=localhost;dbname=locations;charset=utf8';
//localhost = url of server
//pass and sername is dnum and password forlogin to db
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}
?>