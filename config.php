<?php
$host = "sql308.infinityfree.com"; 
$user = "if0_42736413";
$pass = "dev23612361"; 
$dbname = "if0_42736413_parking_db";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>