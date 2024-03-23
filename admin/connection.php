<?php
// connection.php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'sandton';

$mysqli = mysqli_connect($host, $username, $password, $database);

if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
