<?php 
session_start();
require_once("inc/conn.php"); 
include("inc/header.php");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
    <div class="container">
    	<div style="text-align: center;">
    		<h1>Your account information</h1>
    	</div>
    	<table class="table table-bordered">
		<thead>
		<th>username</th>
		<th>password</th>
		<th>FullName</th>
		<th>Address</th>
		<th>Phone</th>
		<th>Date Of Birth</th>
		<th>Update</th>
		</thead>
	<tbody>
		<?php
		$id=$_GET['id1'];
		$sql = "SELECT * from customer where UsernameC ='{$id}'";
		$rs= mysqli_query($conn,$sql);
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
		 	<td><a href="suaaccount.php?id=<?=$row['usernameC']?>" style="text-decoration: none;"> Update</a></td>
		 </tr>
		 <?php 
		}
		  ?>
	</tbody>
</table>
<div style="text-align: center;">
    		<h1>Invoice information</h1>
    	</div>
    	<table class="table table-bordered">
		<thead>
		<th>OderDate</th>
		<th>Total</th>
		<th>Bank</th>
		<th>Username</th>
		</thead>
	<tbody>
		<?php
		$id1=$_GET['id1'];
		$sql1 = "SELECT * from orders where usernameC='{$id1}' ";
		$rs1= mysqli_query($conn,$sql1);
		if(mysqli_num_rows($rs) >0)
		while($row1=mysqli_fetch_assoc($rs1)){ 
		 ?>
		 <tr>
		 	<td><?=$row1['OderDate']?></td>
		 	<td><?=$row1['Total'].'$'?></td>
		 	<td><?=$row1['Bank']?></td>
		 	<td><?=$row1['UsernameC']?></td>
		 </tr>
		 <?php 
		}
		  ?>
	</tbody>
</table>
 </div>
 <?php
 include("inc/footer.php"); 
  ?>
 </body>
 </html>