<?php
$server='localhost';
$username='root';
$password='';
$database='qlbarbershop';
$conn=mysqli_connect($server, $username, $password, $database);
mysqli_query($conn, "SET NAMES 'utf8'");
?>