<?php 
require_once("inc/conn.php");
include("inc/header.php");
 ?>
<div class="container">
	<div style="border-bottom: 2px solid black;text-align: center;margin-bottom: 10px">
		<h3 >Form Sing up</h3>
	</div>
	<div class="row">
	<div class="col-md-6">
		<?php
 if($_SERVER['REQUEST_METHOD']=='POST'){
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$add=$_POST['add'];
	$date=$_POST['date'];
	$usn=$_POST['usn'];
	$pw=$_POST['pw'];
	$sql="INSERT INTO customer(CustomerName,CustomerAdd,CustomerPhone,CustomerDate,usernameC,password) VALUES ('$name','$phone','$add','$date','$usn','$pw')";
	
if(mysqli_query($conn,$sql)){
	echo "Create Account Success";
}
else{
	echo "Error: already have that account";
}
}
?>
<form class="was-validated" method="POST">
 <div class="form-group">
 	<label for="usm">Username:</label><br>
  <input type="text" id="usm" class="form-control" name="usn" required=""><br>
  <label for="pwd">Password:</label><br>
  <input type="password"id="pwd" class="form-control" name="pw" required=""> <br>
  <label for="sn">FullName:</label> <br>
  <input type="text" id="sn" class="form-control" name="name" required=""><br>
  <label for="add">Addres:</label><br>
  <input type="text" id="add" class="form-control" name="add" required=""><br>
  <label for="p">Phone:</label><br>
  <input type="tel"id="p" class="form-control" name="phone" required=""><br>
  <label for="date">Date Of Birth:</label><br>
  <input type="date"id="usr" class="form-control" name="date" required=""><br><br>
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
<div class="col-md-6">
	<img src="img/signup.jpg" style="width:600px;height: 500px">
</div>
</div>
</div>
<?php 
include("inc/footer.php");
 ?>