<?php 
  include 'config.php';
  session_start();
  if(empty($_SESSION['id'])){
    header("location:login.php");
  }

  else{

  $id = $_SESSION['id'];
  $sql = "select * from konsumen where id='$id'";
  $login = mysqli_query($connection,$sql) or die($sql);
  $cek = mysqli_fetch_array($login);
  $nama = $cek['nama'];
  $foto = $cek['foto'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Take a Service</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $nama ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
             <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li><a href="form-konsumen.php"><i class="fa fa-edit"></i> Take a Service </a>
                  </li>
                  <li><a href="status_konsumen.php"><i class="fa fa-bell"></i> Status of Service </a>
                  </li>
                  <li><a href="table_mitra.php"><i class="fa fa-user"></i> My Technician </a>
                  </li>
                  <li><a href="history.php"><i class="fa fa-table"></i> History </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?php echo $nama ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="profile.php"> Profile</a></li>
                    
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <div id="form-service">
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Take a Service</h3>
              </div>

            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form <small>Session</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a href="form-konsumen.php"><i class="fa fa-refresh"></i></a>
                      </li>
                      <li class="dropdown">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Procedure <small>Read this before order !</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a href="form-konsumen.php"><i class="fa fa-refresh"></i></a>
                      </li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <ol style="margin-left: -2.7%;">
                      <li>Take a service.</li>
                      <li>Wait for your engineer accept the job.</li>
                      <li>Meet up your engineer.</li>
                      <li>Finish up the job.</li>
                      <li>Pay the cost.</li>
                      <li>Finish your service.</li>
                      <li>Thank's</li>
                    </ol>
                  </div>
                  </div>
                 <div class="x_content">


                    <!-- Smart Wizard -->
                    <p>Input your problem here.</p>
                       <form class="form-horizontal form-label-left" action="form-konsumen.php" method="post" name="take">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis :</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" name="jenis">
                                <option>Select one...</option>
                                <option>Handphone/Smartphone</option>
                                <option>Computer</option>
                                <option>Network</option>
                                <option>Electronic</option>
                                <option>Electrict</option>
                                <option>Car</option>
                                <option>Motorcycle</option>
                                <option>Building</option>
                                <option>Furniture</option>
                                <option>Shoes</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Keterangan :<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="keterangan" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Lokasi :<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="alamat" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="clearfix"></div>
                          <div class="separator"></div>
                          <div class="clearfix"></div>
                          <div class="x_content" style="text-align: right;">
                            <input type="submit" class="btn btn-round btn-success" name="take" value="Take a Service" />
                          </div>
                          
                        </form>
                        <?php
if(isset($_POST['take'])){
    $jenis = $_POST['jenis'];
    $keterangan = $_POST['keterangan'];
    $tanggal_mulai = date('Y-m-d');
    $alamat = $_POST['alamat'];
    $status = "request";
    $konsumen_id = $id;
    // Insert user data into table
$result = mysqli_query($connection, "INSERT INTO data_service(jenis,keterangan,tanggal_mulai,status,alamat,konsumen_id)VALUES('$jenis','$keterangan','$tanggal_mulai','$status','$alamat','$konsumen_id')");
}
?>
                    </div>
                    <!-- End SmartWizard Content -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            My Engineer - SMKN 1 Cimahi <a href="https://colorlib.com">2018</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

	
  </body>
</html>
<?php } ?>