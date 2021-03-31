<?php 
session_start();
include("inc/conn.php");
 if($_SERVER['REQUEST_METHOD']=='POST'){
 	$id=$_GET['id'];
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$add=$_POST['add'];
	$date=$_POST['date'];
	$pw=$_POST['pw'];
$sql="UPDATE customer SET CustomerName='$name',CustomerAdd='$add',CustomerPhone='$phone',CustomerDate='$date',Password='$pw' WHERE UsernameC='$id' ";
if(mysqli_query($conn,$sql)){
	echo "successfully updated";
}else{
	echo "Error: " .mysqli_errno($conn);
}
}
$id=$_GET['id'];
$sql= mysqli_query($conn,"SELECT * FROM customer WHERE usernameC='{$id}'");
$product = mysqli_fetch_assoc($sql);
?>
<?php
include("inc/header.php"); 
 ?>
 <div class="col-md-6">
<form class="was-validated" method="POST">
 <div class="form-group">
  <label for="pwd">Password:</label><br>
  <input type="text" id="pwd" class="form-control" name="pw" value="<?=$product['password']?>" > <br>
  <label for="sn">FullName:</label> <br>
  <input type="text" id="sn" class="form-control" name="name" value="<?=$product['CustomerName']?>"><br>
  <label for="add">Addres:</label><br>
  <input type="text" id="add" class="form-control" name="add" value="<?=$product['CustomerAdd']?>"><br>
  <label for="p">Phone:</label><br>
  <input type="tel"id="p" class="form-control" name="phone" value="<?=$product['CustomerPhone']?>"><br>
  <label for="date">Date Of Birth:</label><br>
  <input type="date"id="usr" class="form-control" name="date" value="<?=$product['CustomerDate']?>"><br><br>
<button type="submit" class="btn btn-primary">Update</button>
</div>
</form>
</div>
<?php
 include("inc/footer.php"); 
  ?>