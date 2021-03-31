<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="icon" href="https://img.icons8.com/fluent/120/000000/apple-music.png"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
<body>
	<marquee behavior="alternate"><h1>Congratulations, your username is: <?php echo $_SESSION['username'];  ?> Login successfully !</h1></marquee>
<!-- menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <div class="container">
	  <a class="navbar-brand" href="index.php"><img src="https://img.icons8.com/fluent/48/000000/apple-music.png"/></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> About</a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link" href="#" id="navbarDropdown" >
	         <i class="fas fa-align-justify"></i> Genre
	        </a>
	        <div class="dropdown-content">
	        <?php
	        $listcat="SELECT * FROM genre";
	        $kq=mysqli_query($conn,$listcat) or die($listcat);
	        while ($row1=mysqli_fetch_array($kq)) {
	         ?>
	         <a class="dropdown-item" href="genre.php?genreid=<?php echo $row1["GenreID"]?>"> <?php echo $row1["GenreName"]; ?></a>
	         <?php 
	     		}
	          ?>
	        </div>
	      </li>
	       <li class="nav-item">
	        <a class="nav-link" href="cart.php"><i class="fas fa-cart-plus"></i> Cart</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="account.php?id1=<?php echo $_SESSION['username']; ?>"><i class="fas fa-user"></i> Information</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="longout.php"><i class="fas fa-sign-out-alt"></i> Log out</a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
	      <input class="form-control mr-sm-2" type="search" placeholder="Enter information to search for" style="width: 400px" name="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
	    </form>
	  </div>
  </div>
</nav>