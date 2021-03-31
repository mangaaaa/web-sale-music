<?php 
include("inc/conn.php");
 if($_SERVER['REQUEST_METHOD']=='POST'){
 	$id=$_GET['id'];
	$name=$_POST['tensong'];
	$price=$_POST['songprice'];
	$lyric=$_POST['songlyric'];
	$img=$_POST['songimg'];
	$mp3=$_POST['songmp3'];
	$singer=$_POST['singer'];
	$genre=$_POST['genre'];

$sql="UPDATE song SET SongID=$id,SongName='$name',SongPrice='$price',SongLyric='$lyric',mp3='$mp3',SongIMG='$img',SingerID=$singer,GenreID='$genre' WHERE SongID=$id ";
if(mysqli_query($conn,$sql)){
	echo "successfully updated";
}else{
	echo "Error: " .mysqli_errno($conn);
}
}
$id=$_GET['id'];
$sql= mysqli_query($conn,"SELECT * FROM song WHERE SongID={$id}");
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
	<h1>Update Song</h1>
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
<h3>Update Song Name : <?= $product['SongName']?></h3>
<br><br>
<form method="POST" >
	<label>Enter song name</label> <br>
	<input class="us-pw" type="text" name="tensong" value="<?=$product['SongName']?>"/> <br>
<label>Enter song price </label> <br>
<input type="number" name="songprice" value="<?=$product['SongPrice']?>" class="us-pw"> <br>
<label>Enter song lyric</label> <br> <br>
<textarea class="us-pw" name="songlyric"><?=$product['SongLyric']?></textarea> <br>
<label>Choose song image</label> <br>
<img class="anh-sp" src="../img/<?=$product['SongIMG']?>"/ class="us-pw" > <br> <br>
<input type="file" name="songimg"> <br> <br>
<label>Choose song file</label> <br>
<input type="file" name="songmp3"> <br> <br>
<label>Enter Genre</label> <br>
<input type="number" name="genre" value="<?=$product['GenreID']?>" class="us-pw"> <br>
<label>Enter Singer</label> <br>
<input type="number" name="singer" value="<?=$product['SingerID']?>" class="us-pw"> <br> <br>
<input type="submit" name="submit" value="Update" class="login">
</form>
</div>
