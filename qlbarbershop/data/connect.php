<?php
$server='localhost';
$username='root';
$password='';
$database='qlbarbershop';
$conn=mysqli_connect($server, $username, $password, $database);
mysqli_query($conn, "SET NAMES 'utf8'");
if(!$conn){ die('Không thể KẾT NỐI : ' . mysqli_error($conn)) ;}
mysqli_select_db($conn, $database);
?>