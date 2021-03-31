 <?php 
 session_start();
require_once("inc/conn.php");
include("inc/header.php");
 ?>
 <h3 style="text-align: center;">Congratulations on your payment and you can now download it</h3>
 <?php 
    if($_SERVER['REQUEST_METHOD']=='POST'){
  $total=$_POST['total'];
  $date=$_POST['date'];
  $usn=$_POST['name'];
  $bank=$_POST['bank'];
  $sql="INSERT INTO orders(Total,OderDate,UsernameC,Bank) VALUES ('$total','$date','$usn','$bank')";
if(mysqli_query($conn,$sql)){
  echo "thanh toan thanh cong";
}
else{
  echo "Error: ".mysqli_errno($conn);
}
}
 ?>
 <?php
 if ($_SERVER['REQUEST_METHOD']=='POST') {
  $id =$_POST['id'];
  if (empty($_SESSION['cart'][$id])) {
    $q=mysqli_query($conn,"SELECT * FROM song WHERE SongID = {$id}");
    $product = mysqli_fetch_assoc($q);
      header("location:thanhtoan.php");
  }
 }
 ?>
 <div class="container-fluid">
 <div class="row">
  <link rel="stylesheet" type="text/css" href="cart.css">
  <?php 
  if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) :
    ?>
    <div class="products" style="border: 2px solid black">
    <a href="single.php?id=<?php echo $item['SongID']?>" style="text-decoration: none;">
    <div><img src="img/<?php echo $item['SongIMG']?>" class="img-cart"></div>
    <h2><?php echo $item['SongName'] ?></h2>
        <audio controls controlsList="autodownload">
          <source src="song/<?php echo $item['mp3'] ?>" type="audio/mpeg">
          </audio>
         </a>
         <br>
         <h4>Click on icon <i class="fas fa-ellipsis-v"></i> to download</h4>
         </div>
           <?php
  endforeach;
  }
     ?>
  </div>  
 <?php
 include("inc/footer.php"); 
  ?>