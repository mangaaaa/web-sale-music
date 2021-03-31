<?php 
include("../inc/conn.php");
if ($_SERVER['REQUEST_METHOD']=='GET' && !empty($_GET['idxoa'])) {
	$idxoa=$_GET['idxoa'];
	$sql= "DELETE FROM song WHERE SongID={$idxoa} limit 1";
	if (mysqli_query($conn,$sql)) {
		echo "Successful Delete".$idxoa;
		header('Location:index.php');
	}else{
		echo "Error".msqli_error($conn);
	}
}
 include("inc/header.php");
 include("list.php");
