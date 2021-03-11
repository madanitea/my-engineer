<?php
    
    // include database connection file
    include_once("config.php");
  
  $login = mysqli_query($connection,$sql) or die($sql);
  $cek = mysqli_fetch_array($login);
  $nama = $cek['nama'];
  $id = $_SESSION['id'];
  $sql = "select * from konsumen where id='$id'";
  $foto = $cek['foto'];

    $jenis = $_POST['jenis'];
    $keterangan = $_POST['keterangan'];
    $tanggal_mulai = date('Y-m-d');
    $alamat = $_POST['alamat'];
    $status = "request";
    $konsumen_id = $id;
        
    // Insert user data into table
    $query = mysqli_query($connection, "INSERT INTO data_service(jenis,keterangan,tanggal_mulai,status,alamat,konsumen_id) VALUES('$jenis','$keterangan','$tanggal_mulai','$status','$alamat','$konsumen_id')") or die(mysql_error());

if($query){
  header('location: index.php');
}

?>