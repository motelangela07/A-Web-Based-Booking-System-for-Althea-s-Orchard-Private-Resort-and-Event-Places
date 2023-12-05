<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "db_booking";

$conn = new mysqli($host, $user, $password, $database);

if($conn->connect_error){
    die("Connection failed: " .$conn->connect_error);
}

error_reporting(0);
ini_set('display_errors', 0);
?>