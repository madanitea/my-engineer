<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome To MyEngineer</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="login.php" method="post" name="login">
              <h1>Login Form</h1>
              <div>
                <input type="text" name="emaillogin" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" name="passwordlogin" class="form-control" placeholder="Password" required="" />
              </div>
              <div style="margin-left: -10.75%; margin-right: 10.75%;">
                <input style="width: 100%;" type="submit" name="login-konsumen" class="btn btn-default submit" value="Login as a Customer" />
                <input style="width: 100%;" type="submit" name="login-mitra" class="btn btn-default submit" value="Login as an Engineer" />
                <a style="margin-right: 23%;" class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_regi  ster"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-home"></i> MyEngineer</h1>
                  <p>©2018 All Rights Reserved. My Engineer. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
        <?php 
if (isset($_POST['login-konsumen'])) {

  include_once 'config.php';
  $emaillogin = $_POST['emaillogin'];
  $passwordlogin = $_POST['passwordlogin'];
  $sql = "select * from konsumen where email='$emaillogin' and password='$passwordlogin'";
  $login = mysqli_query($connection,$sql) or die($sql);
  $cek = mysqli_fetch_array($login);

  if($cek['email'] == $emaillogin and $cek['password'] == $passwordlogin){
    session_start();
    $_SESSION['id'] = $cek['id'];
    header("location:index.php");
  }

  else{
    $message = "Username and/or Password incorrect.\\nTry again.";
      echo 
      "<script type='text/javascript'>
        alert('$message');
      </script>";
  }
}
else if (isset($_POST['login-mitra'])) {

  include_once 'config.php';
  $emaillogin = $_POST['emaillogin'];
  $passwordlogin = $_POST['passwordlogin'];
  $sql = "select * from mitra where email='$emaillogin' and password='$passwordlogin'";
  $login = mysqli_query($connection,$sql) or die($sql);
  $cek = mysqli_fetch_array($login);

  if($cek['email'] == $emaillogin and $cek['password'] == $passwordlogin){
    session_start();
    $_SESSION['id-mitra'] = $cek['id'];
    header("location:index_mitra.php");
  }

  else{
    $message = "Username and/or Password incorrect.\\nTry again.";
      echo 
      "<script type='text/javascript'>
        alert('$message');
      </script>";
  }
}
?>
        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="login.php" method="post" name="register" novalidate>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="NIK" required="" name="nik" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Name" required="" name="nama" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Address" required="" name="alamat" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Gender (Male/Female)" required="" name="jenis_kelamin" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" name="email" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="No Telepon" required="" name="no_telp" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password"/>
              </div>
              <div>
                <input type="file" class="form-control" placeholder="Foto" required="" name="foto" />
              </div>
              <div class="separator"></div>
              <div style="margin-top: 1%; width: 100%; margin-left: -10.75%;">
                <input type="submit" name="konsumen" class="btn btn-default submit" value="Register as a Customer" style="width: 100%;" />
              </div>
              <div style="margin-top: 4%; width: 100%; margin-left: -10.75%;">
                <input type="submit" name="mitra" class="btn btn-default submit" value="Register as an Engineer" style="width: 100%;" />
              </div>
              	<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['konsumen'])) {
		$nik = $_POST['nik'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$email = $_POST['email'];
		$no_telp = $_POST['no_telp'];
		$password = $_POST['password'];
		$foto = $_POST['foto'];

		// include database connection file
		include_once("config.php");
				
		// Insert user data into table
		$result = mysqli_query($connection, "INSERT INTO konsumen(nik,nama,alamat,jenis_kelamin,email,no_telp,password,foto) VALUES('$nik','$nama','$alamat','$jenis_kelamin','$email','$no_telp','$password','$foto')");
	}

  if(isset($_POST['mitra'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $password = $_POST['password'];
    $foto = $_POST['foto'];

    // include database connection file
    include_once("config.php");
        
    // Insert user data into table
    $result = mysqli_query($connection, "INSERT INTO mitra(nik,nama,alamat,jenis_kelamin,email,no_telp,password,foto) VALUES('$nik','$nama','$alamat','$jenis_kelamin','$email','$no_telp','$password','foto')");
    }
	?>
              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-home"></i> My Engineer</h1>
                  <p>©2018 All Rights Reserved. My Engineer. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
