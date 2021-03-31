<?php 
include("inc/conn.php");
if ($_SERVER['REQUEST_METHOD']=='GET' && !empty($_GET['idxoa'])) {
	$idxoa=$_GET['idxoa'];
	$sql= "DELETE FROM singer WHERE SingerID={$idxoa} limit 1";
	if (mysqli_query($conn,$sql)) {
		echo " Successful Delete".$idxoa;
		header("Location:singer.php");
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
	<h1>Home Singer management</h1>
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
	<h3>Add Singer</h3>
</div>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$id=$_POST['id'];
	$name=$_POST['name'];
	$date=$_POST['date'];
	$sql="INSERT INTO singer(SingerID,SingerName,SingerDate) VALUES ($id,'$name','$date')";
	
if(mysqli_query($conn,$sql)){
	echo "Successful add".$id;
	header('Location:singer.php');
}
else{
	echo "Error: ".mysqli_errno($conn);
}
}
?>
<form method="POST">
  <label for="sn">SingerID:</label> <br>
  <input type="number" id="sn" class="us-pw" name="id"><br>
  <label for="name">SingerName:</label> <br>
  <input type="text" id="name" class="us-pw" name="name"><br>
  <label for="d">SingerDate:</label><br>
  <input type="date" id="d" class="us-pw" name="date"><br>
   <br>
<button type="submit"  class="login">Add</button>
</form>
</div>
<div class="rightcolumn">
	<table>
		<thead>
		<th>SingerID</th>
		<th>SingerName</th>
		<th>Date Of Birth</th>
		</thead>
	<tbody>
		<?php
		$query="SELECT * FROM singer";
		$rs= mysqli_query($conn,$query);
		if(mysqli_num_rows($rs) >0)
		while($row=mysqli_fetch_assoc($rs)){ 
		 ?>
		 <tr>
		 	<td><?=$row['SingerID']?></td>
		 	<td><?=$row['SingerName']?></td>
		 	<td><?=$row['SingerDate']?></td>
		 	<td><a href="suasinger.php?id=<?=$row['SingerID']?>" style="text-decoration: none;"> Update</a></td>
		 	<td><a href="?idxoa=<?=$row['SingerID']?>"style="text-decoration: none;"> Delete</a></td>
		 </tr>
		 <?php 
		}
		  ?>
	</tbody>
</table>
</div>
</body>
</html>

