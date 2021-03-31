<?php 
require_once("conn.php")
 ?>
 <?php 
  $id=$_GET['id'];
 $product_per_page = 3;
 $q = mysqli_query($conn,"SELECT COUNT(GenreID) AS total FROM song WHERE GenreID LIKE '%{$id}%'");
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
    <li class="page-item"><a class="page-link" href="genre.php?page=<?= $i + 1?>"
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