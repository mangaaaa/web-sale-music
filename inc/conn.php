<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="music";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if (!$conn) {
	die("Error Connection: ".mysqli_connect_error());
} 
 ?>
