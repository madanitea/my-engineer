<?php
include 'config.php';
$id = $_GET['id'];
mysqli_query($connection,"DELETE FROM data_service WHERE id = '$id'")or die(mysql_error());

echo $id;
//header("location:index_mitra.php");
?>