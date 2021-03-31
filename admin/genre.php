<?php 
include("inc/conn.php");
if ($_SERVER['REQUEST_METHOD']=='GET' && !empty($_GET['idxoa'])) {
	$idxoa=$_GET['idxoa'];
	$sql= "DELETE FROM genre WHERE GenreID={$idxoa} limit 1";
	if (mysqli_query($conn,$sql)) {
		echo " Successful Delete".$idxoa;
		header("Location:genre.php");
	}else{
		echo "Error".msqli_error($conn);
	}
}
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
	<h1>Home genre management</h1>
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
	<h3>Add Genre</h3>
</div>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$id=$_POST['id'];
	$name=$_POST['name'];
	$sql="INSERT INTO genre(GenreID,GenreName) VALUES ($id,'$name')";
	
if(mysqli_query($conn,$sql)){
	echo "Successful add";
	header('Location:genre.php');
}
else{
	echo "Error: ".mysqli_errno($conn);
}
}
?>
<form method="POST">
  <label for="sn">GenreID:</label> <br>
  <input type="number" id="sn" class="us-pw" name="id"><br>
  <label for="add">GenreName:</label><br>
  <input type="text" id="add" class="us-pw" name="name"><br> <br>
<button type="submit"  class="login">Add</button>
</form>
</div>
<div class="rightcolumn">
	<table>
		<thead>
		<th>GenreID</th>
		<th>GenreName</th>
		</thead>
	<tbody>
		<?php
		$query="SELECT * FROM genre";
		$rs= mysqli_query($conn,$query);
		if(mysqli_num_rows($rs) >0)
		while($row=mysqli_fetch_assoc($rs)){ 
		 ?>
		 <tr>
		 	<td><?=$row['GenreID']?></td>
		 	<td><?=$row['GenreName']?></td>
		 	<td><a href="suagenre.php?id=<?=$row['GenreID']?>" style="text-decoration: none;"> Update</a></td>
		 	<td><a href="?idxoa=<?=$row['GenreID']?>"style="text-decoration: none;"> Delete</a></td>
		 </tr>
		 <?php 
		}
		  ?>
	</tbody>
</table>
</div>
</body>
</html>

