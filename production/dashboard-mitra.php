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
  $read = "select * from data_service where status='request' ";
  $baca = mysqli_query($connection,$read);
  $bird = mysqli_fetch_array($baca);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard Job</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

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
                  </ul>
                </li>

              </ul>

            </nav>

          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
                        <?php 

                          while ($data = mysqli_fetch_array($baca)){

                                    include 'config.php';
                                    $do = $data['konsumen_id'];
                                    $lala = "select * from konsumen where id='$do'";
                                    $baba = mysqli_query($connection,$lala);
                                    $nami = mysqli_fetch_array($baba);
                                    $namae = $nami['nama'];
                            echo "<div class='col-md-4 col-sm-6 col-xs-12'>
                                    ".$data['id']." | <b>".$data['jenis']."</b><div class='separator'></div><table>
                                    <tr><td>Nama<td>&nbsp: ".$namae."</td></tr>
                                    <tr><td>Keterangan<td>&nbsp: ".$data['keterangan']."</td></tr>
                                    <tr><td>Tanggal Post<td>&nbsp: ".$data['tanggal_mulai']."</td></tr>
                                    <tr><td>Alamat<td>&nbsp: ".$data['alamat']."</td></tr>
                                    <tr><td>No Telepon<td>&nbsp: ".$nami['no_telp']."</td></tr></table>
                                    <div class='separator'></div><a href='take_job.php?id=". $data['id']."' data-toggle='modal' type='buton' class='btn btn-success' title='Delete' >Take Job !</a></td>
                                  </div>
                                ";
                          }
                        ?>
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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>
<?php } ?>