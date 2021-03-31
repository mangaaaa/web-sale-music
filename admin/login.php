<?php 
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
	include('inc/conn.php');
	$username=$_POST['name'];
	$password=$_POST['pass'];
	$user= mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin WHERE username='{$username}' AND password='{$password}'"));
	if ($user) {
		$_SESSION['user']=$user['username'];
		header('location: index.php');
		die;
	}else{
		echo "Wrong account information";}
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
<link rel="icon" href="https://img.icons8.com/fluent/96/000000/data-configuration.png"/>
 	<link rel="stylesheet" type="text/css" href="aset/admin.css">
 	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
 	<title>Login form</title>
 </head>
 <body style="background-image: url(img/login.jpg)">
 <div class="container">
  <h2 style="text-align: center; font-size: 30px">Welcome to login form </h2>
  <form class="was-validated" method="POST">
    <div class="form-group">
      <label for="uname">Username:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="name" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
</div>
 </body>
 </html>
