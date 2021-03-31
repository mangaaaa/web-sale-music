<?php 
include("inc/conn.php");
 if($_SERVER['REQUEST_METHOD']=='POST'){
 	$id=$_GET['id'];
	$name=$_POST['tensinger'];
	$date=$_POST['date'];
$sql="UPDATE singer SET SingerID=$id,SingerName='$name',SingerDate='$date' WHERE SingerID=$id ";
if(mysqli_query($conn,$sql)){
	echo "successfully updated";
}else{
	echo "Error: " .mysqli_errno($conn);
}
}
$id=$_GET['id'];
$sql= mysqli_query($conn,"SELECT * FROM singer WHERE SingerID={$id}");
$product = mysqli_fetch_assoc($sql);
?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" href="https://img.icons8.com/fluent/96/000000/data-configuration.png"/>
	<link rel="stylesheet" type="text/css" href="aset/admin.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Management system </title>
</head>
<body>
<div class="header">
	<h1>Update Singer</h1>
</div>
<div class="leftcolumn">
<div class="topnav">
  <a href="index.php"><i class="fas fa-home"></i>  Home</a>
  <a href="genre.php"><i class="far fa-album-collection"></i>   Management Genre</a>
  <a href="singer.php"><i class="fad fa-user-music"></i>  Management Singer</a>
   <a href="customer.php"><i class="fad fa-user-music"></i>  Management Customer</a>
  <a href="longout.php"><i class="fas fa-sign-out-alt"></i>   Long out</a>
</div>
</div>
<div class="rightcolumn">
<h3>Update Singer Name : <?= $product['SingerName']?></h3>
<br><br>
<form method="POST" enctype="multipart/form-data">
	<label>Enter singer name</label> <br>
	<input class="us-pw" type="text" name="tensinger" value="<?=$product['SingerName']?>"/> <br>
	<label>Enter Date Of Birth</label>
	<input class="us-pw" type="date" name="date" value="<?=$product['SingerDate']?>"/> <br> <br>
<input type="submit" name="submit" value="Update" class="login">
</form>
</div>
