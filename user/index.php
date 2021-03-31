<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username'])) {
   header('Location: login.php');
}
?>
<?php 
require("inc/conn.php");
include('inc/header.php');
include('inc/slide.php');
 ?>
<!-- list product -->
<div class="container-fluid">
	<div class="row">
		<div style="border-bottom:4px solid #C63D5D;width: 100%">
		<h2 >List Songs</h2>
		</div>
					<?php 
    if (!empty($_GET['page'])) 
    {
    $page=$_GET['page']-1;
    }
    else
    {
      $page=0;
    }
    $product_per_page=12;
    $offset=$product_per_page * $page;
    $sql="SELECT * FROM song,singer,genre WHERE singer.SingerID=song.SingerID and song.GenreID=genre.GenreID LIMIT $offset,$product_per_page";
    $rs= mysqli_query($conn,$sql);
    if (mysqli_num_rows($rs)>0) 
    {
      while ($row=mysqli_fetch_assoc($rs)) 
      {
    ?>
					<div class="card" style="background-color: white;margin-top: 20px;margin-left: 35px;overflow: auto;width: 270px; 
					border: 2px solid #F8ABAB;border-radius: 1px;border-bottom: 6px solid #FCA5A5; float: left;">
			      	<a href="single.php?id=<?php echo $row['SongID']?>" style=" text-decoration: none; 
			      text-align: center;">
			      <div style="height:80px">
			        <h2><?php echo $row['SongName'] ?></h2>
			        </div>
			        <div><img src="img/<?php echo $row['SongIMG']?>" style="width: 247px;height: 200px;padding: 7px"></div>
			        <p style="color: red"><?php echo $row['SongPrice']." $"; ?></p>
			        <h2 style="color: #3BA33D"><?php echo $row['SingerName'] ?></h2>
              <h5>Genre: <?php echo $row['GenreName'] ?></h5>
                <marquee behavior="alternate" width="10%">>></marquee>Click to listen and buy<marquee behavior="alternate" width="10%"><< </marquee>
			      </a>
    			</div>
    				 	<?php
      }
  }
    ?>
		</div>
		</div>
	
		    <?php include("inc/pagination.php");?>

<!-- end list product -->
<?php 
include("inc/footer.php");
 ?>