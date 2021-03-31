<?php 
session_start();
if (!empty($_SESSION['user'])) {
	echo "";
}else{
	header('Location:login.php');
	die;
	}
	require_once("conn.php");
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
	<h1>Home management</h1>
</div>
<div class="leftcolumn">
<div class="topnav">
  <a href="index.php"><i class="fas fa-home"></i>  Home</a>
  <a href="genre.php"><i class="far fa-album-collection"></i>   Management Genre</a>
  <a href="singer.php"><i class="fad fa-user-music"></i>  Management Singer</a>
  <a href="customer.php"><i class="fad fa-user-music"></i>  Management Customer</a>
  <a href="longout.php"><i class="fas fa-sign-out-alt"></i>   Long out</a>
</div>
<div style="width: 100%;border-bottom: 1px solid black">
	<h3>Add Song</h3>
</div>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$name=$_POST['tensong'];
	$price=$_POST['songprice'];
	$lyric=$_POST['songlyric'];
	$img=$_POST['songimg'];
	$mp3=$_POST['songmp3'];
	$singer=$_POST['singer'];
	$genre=$_POST['genre'];
	$sql="INSERT INTO song(SongName,SongPrice,SongLyric,mp3,SongIMG,GenreID,SingerID) VALUES ('$name','$price','$lyric','$mp3','$img',$genre,$singer)";
	
if(mysqli_query($conn,$sql)){
	echo "Successful add";
	header('Location:index.php');
}
else{
	echo "Error: ".mysqli_errno($conn);
}
}
?>
<form method="post">
	<input type="text" name="tensong" class="us-pw" placeholder="Enter Song Name"> <br>
	<input type="number" name="songprice" class="us-pw" placeholder="Enter Song Price"> <br>
	<textarea name="songlyric" class="us-pw" placeholder="Enter Song Lyric"></textarea> <br>
	<label>Choose song picture</label> <br>
	<input type="file" name="songimg"> <br>
	<label>Choose song file</label> <br>
	<input type="file" name="songmp3"> <br>
	<br>
	<label>Choose genre</label>
	<select name="genre" style="width: 170px" placeholder="Choose song genre">
	<?php
		$query="SELECT * FROM genre";
		$rs= mysqli_query($conn,$query);
		if(mysqli_num_rows($rs) >0)
		while($row=mysqli_fetch_assoc($rs)){ 
		 ?>
    <option selected></option>
    <option value="<?=$row['GenreID']?>"><?php echo $row['GenreName'] ?></option>
  <?php 
		}
		  ?>
		  </select> <br> <br>
	<label>Choose singer</label>
	<select name="singer" style="width: 170px">
	<?php
		$query="SELECT * FROM singer";
		$rs= mysqli_query($conn,$query);
		if(mysqli_num_rows($rs) >0)
		while($row=mysqli_fetch_assoc($rs)){ 
		 ?>
    <option selected></option>
    <option value="<?=$row['SingerID']?>"><?php echo $row['SingerName'] ?></option>
  <?php 
		}
		  ?>
		  </select>
	 <br> <br>
	<input type="submit" name="submit" value="Add" class="login"> 
</form>
</div>
