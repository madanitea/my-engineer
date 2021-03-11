<?php 
include 'config.php';
  session_start();
  if(empty($_SESSION['id-mitra'])){
    header("location:login.php");
  }

  else{
  $id = $_SESSION['id-mitra'];
  $sql = "select * from mitra where id='$id'";
  $login = mysqli_query($connection,$sql) or die($sql);
  $cek = mysqli_fetch_array($login);
  $nama = $cek['nama'];
  $foto = $cek['foto'];
  $iqro = "select*from konsumen";
  $bismi = mysqli_query($connection,$iqro);
  $read = "select * from mitra";
  $baca = mysqli_query($connection,$read);
  $acab = "select * from data_service";
  $daer = mysqli_query($connection,$acab);
  $tanggal = date('Y-m-d');
  $lenovo = "select*from data_service where tanggal_mulai='$tanggal'";
  $acer = mysqli_query($connection,$lenovo);
  $berita = "select*from berita_mitra";
  $news = mysqli_query($connection,$berita);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

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
                <span>Welcome Engineer,</span>
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
                  <li><a href="index_mitra.php"><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li><a href="dashboard-mitra.php"><i class="fa fa-edit"></i> Dashboard Job </a>
                  </li>
                  <li><a href="current_service.php"><i class="fa fa-bell"></i> Current Service </a>
                  </li>
                  <li><a href="history_mitra.php"><i class="fa fa-table"></i> History </a>
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
                    <li><a href="profile_mitra.php"> Profile</a></li>
                    
                    <li><a href="logout-mitra.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count green"><?php 
              $total = 0;
              while ($data = mysqli_fetch_array($bismi)){
                            $total++;
                          }
                            echo $total;?>
                          </div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Total Services</span>
              <div class="count green">
                <?php 
              $total = 0;
              while ($data = mysqli_fetch_array($daer)){
                            $total++;
                          }
                            echo $total;?>
              </div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Technician</span>
              <div class="count green">
                <?php 
              $total = 0;
              while ($data = mysqli_fetch_array($baca)){
                            $total++;
                          }
                            echo $total;?>
              </div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Services Today</span>
              <div class="count">
                <?php 
              $total = 0;
              while ($data = mysqli_fetch_array($acer)){
                            $total++;
                          }
                            echo $total;?>
              </div>
              
            </div>
            
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-14 col-sm-14 col-xs-12">
              <div class="dashboard_graph">
                <div class="row x_title">
                  <div class="sol-md-6" style="padding: 1%;">
                    <h3><i class="fa fa-binoculars"></i> Welcome To My Engineer !</h3>
                  </div>
                <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 1%; padding-right: 1%; text-align: justify;">
                  <p>This is your money world, here you can make money in a short way and short time. Never give up and be the best engineer<i class="fa fa-smile-o"></i>.</p>
                </div>
                </div>
              </div>

            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">
                <div class="row x_title">
                  <div class="sol-md-6" style="padding: 1%;">
                    <h3><i class="fa fa-rss"></i> What's new !</h3>
                  </div>
                <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 1%; padding-right: 1%; text-align: justify;">
                  <p>
                    <?php 
                          while ($data = mysqli_fetch_array($news)){
                            echo $data['berita'];
                                  
                          }
                        ?>
                </p>
                </div>
                </div>
              </div>

            </div>
          <div class="pull-right" style="margin-right: 1%;">
            My Engineer - SMKN 1 Cimahi <a href="https://colorlib.com">2018</a>
          </div>
          <div class="clearfix"></div>
            <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>

                </div>

                <!-- end of weather widget -->
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
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
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
<?php } ?>