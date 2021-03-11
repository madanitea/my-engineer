<?php 

include 'config.php';
session_start();
$_SESSION['id-mitra'];
  $id = $_SESSION['id-mitra'];
  $sql = "select * from mitra where id='$id'";
  $login = mysqli_query($connection,$sql) or die($sql);
  $cek = mysqli_fetch_array($login);

$status = "taken";
$mitra = $cek['id'];
$id = $_GET['id'];

$query = mysqli_query($connection,"UPDATE data_service SET mitra_id = '$mitra', status = '$status' WHERE id = '$id'");

if($query){
	header("location:current_service.php");
  //header("location:dashboard-mitra.php");
}

else{
  echo 'teubisa';
}
?>