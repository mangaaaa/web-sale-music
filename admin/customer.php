<?php 
include("inc/conn.php");
if ($_SERVER['REQUEST_METHOD']=='GET' && !empty($_GET['idxoa'])) {
	$idxoa=$_GET['idxoa'];
	$sql= "DELETE FROM customer WHERE UsernameC={$idxoa} limit 1";
	if (mysqli_query($conn,$sql)) {
		echo " Successful Delete".$idxoa;
		header("Location:customer.php");
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
	<h1>Home customer management</h1>
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
	<table>
		<thead>
		<th>username</th>
		<th>password</th>
		<th>FullName</th>
		<th>Address</th>
		<th>Phone</th>
		<th>Date Of Birth</th>
		<th>Delete</th>
		</thead>
	<tbody>
		<?php
		$query="SELECT * FROM customer";
		$rs= mysqli_query($conn,$query);
		if(mysqli_num_rows($rs) >0)
		while($row=mysqli_fetch_assoc($rs)){ 
		 ?>
		 <tr>
		 	<td><?=$row['UsernameC']?></td>
		 	<td><?=$row['Password']?></td>
		 	<td><?=$row['CustomerName']?></td>
		 	<td><?=$row['CustomerAdd']?></td>
		 	<td><?=$row['CustomerPhone']?></td>
		 	<td><?=$row['CustomerDate']?></td>
		 	<td><a href="?idxoa=<?=$row['UsernameC']?>"style="text-decoration: none;"> Delete</a></td>
		 </tr>
		 <?php 
		}
		  ?>
	</tbody>
</table>
</div>
</body>
</html>

