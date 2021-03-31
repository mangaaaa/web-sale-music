<?php 
require_once("conn.php")
 ?>
 <?php 
 $product_per_page = 12;
 $q = mysqli_query($conn,"SELECT COUNT(SongID) AS total FROM song");
 $rs = mysqli_fetch_assoc($q);
 $total_product = $rs['total'];
 $pages = ceil($total_product/$product_per_page);
 if(!empty($_GET['page']))
 {
 	$curent_page = $_GET['page'];
 }
 else
 	$curent_page=1;
  ?>
  <div class="container" style="margin-top: 10px">  
  <div class="row">               
  <ul class="pagination">
    <?php for ($i=0; $i < $pages ; $i++)
       { 
        ?>
    <li class="page-item"><a class="page-link" href="index.php?page=<?= $i + 1?>"
          <?php 
          if ($curent_page==($i+1)) 
          {
            echo "class=active";}
          else
            echo "";
           ?>
           >
           <?php echo $i + 1; ?>
        </a>
      <?php }?>
    </li>
  </ul>
  </div>
</div>