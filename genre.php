<?php
require_once("inc/conn.php"); 
include("inc/header.php");
$id1=$_GET['genreid'];
 ?>
<div class="container-fluid">
  <div class="row">
    <div style="border-bottom:4px solid #C63D5D;width: 100%">
    </div>
          <?php 
    $sql="SELECT * FROM song,singer,genre WHERE singer.SingerID=song.SingerID and genre.GenreID=song.GenreID And song.GenreID LIKE '%{$id1}%'";
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
              <h4 style="color: #3BA33D"><?php echo $row['SingerName'] ?></h4>
            <h5>Genre: <?php echo $row['GenreName'] ?></h5>
            </a>
          </div>
              <?php
      }
  }
    ?>
    </div>
    </div>
  <?php
  include("inc/footer.php"); 
   ?>