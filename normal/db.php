<?php

$host = 'localhost';
$user = 'root';
$password = 'Sujal';
$dbname = 'Crud';

$database = mysqli_connect($host, $user, $password, $dbname);

if (!$database) {
    die('Connection failed: ' . mysqli_connect_error());
} 
?>
