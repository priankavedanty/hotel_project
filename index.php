<?php
  if(!isset($_SESSION)) {session_start();}
  include_once "cs.php";  
  include_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta property="rtoken" content="<?php print $_SESSION['rtoken'] ?>"/>
  <title>HOTEL</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Select2 -->
  <link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet" />
  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery Idle -->
  <script type="text/javascript" src="bower_components/jquery-idle-master/jquery.idle.js"></script>

</head>

<style type="text/css">
.preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background-color: #fff;
}
.preloader .loading {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%);
  font: 14px arial;
}
</style>

<body class="hold-transition skin-red sidebar-mini"> <!-- Warna Template -->
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>HOTEL </b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only"></span>
      </a>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="images/<?=$public_foto?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php print $public_nama ?></p>
          <small style="font-size: 10.5px"><?php print strtoupper($public_nama_jabatan)?></small>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
            <?php
            $query2="select * from tb_left_menu where id_jabatan_akses = $public_id_jabatan order by urutan asc";
            $eks2=mysqli_query($conn, $query2);
            while($row_menu=mysqli_fetch_assoc($eks2))        
            {
            
              $id_menu = $row_menu['id_menu'];
              if($row_menu['has_submenu'] == "y")
              {
                ?> 
                  <li class="treeview">
                    <a style="cursor:pointer">
                      <i class="<?php print $row_menu['icon'];?>"></i> <span><?php print $row_menu['nama_menu'];?></span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                     <?php 
                       $sql_menu = "select tb_sub_left_menu.* from tb_sub_left_menu where tb_sub_left_menu.id_menu = '$id_menu' order by urutan ASC"; 
                        $result_menu = mysqli_query($conn, $sql_menu);
                        while($row_menux = mysqli_fetch_assoc($result_menu)) 
                        { 
                          ?><li><a href=index.php?h=<?php print $row_menux['link'];?>><i class="<?php print $row_menux['icon']; ?>"></i> <span><?php print $row_menux['nama_menu'];?></span></a></li><?php
                        }
                     ?> 
                    </ul>
                  </li> 
                <?php
              }
              else
              {
                ?><li>
                    <a style="cursor: pointer;" href="index.php?h=<?php print $row_menu['link'];?>">
                      <i class="<?php print $row_menu['icon'];?>"></i> 
                        <span><?php print $row_menu['nama_menu']; ?></span>
                    </a>
                  </li>
                <?php
              }
            }
          ?>
          <li class="treeview">
            <a style="cursor: pointer;" onclick="logout()">
              <i class="fa fa-sign-out"></i> 
              <span> Log Out </span>
            </a>
          </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <div class="preloader" style="background-color: #000000; opacity: 0.8; font-size: 18px; color: white;">
          <center><i class="fa fa-spin fa-spinner" style="font-size: 40px; margin-top: 350px; color: white"></i></center>
      </div> 

      <?php include 'content.php'; ?>

    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?=$public_year?></strong> All rights
    reserved.
  </footer>
  
</div>
<!-- ./wrapper -->

<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sweetalert -->
<script src="bower_components/sweetalert-master/docs/assets/sweetalert/sweetalert.min.js"></script>
<!-- Jquery idle -->
<script src="bower_components/select2/dist/js/select2.min.js"></script>

<script>

$.widget.bridge('uibutton', $.ui.button);

function logout(){   
   swal({text: "Berhasil log out dari sistem!",icon: 'success', timer: 2800, button: false }).then((result) => {window.location = "logout.php";})
}

$(function () {
    $('#example1,#example2,#example3,#example4,#example5,#example6,#example7,#example8,#example9,#example10').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
       'language':{
        'url': 'bower_components/indonesian.json',
        'sEmptyTable':'Tidak ada data yang ditemukan'
       }
    })
  })

$(document).ready(function(){
$(".preloader").fadeOut(); })

$(document).idle({
  onIdle: function(){
    swal({text: "Session anda telah berakhir!", icon: 'icon',title: 'Oops...'}).then((result) => {window.location = 'logout.php';})
  },
  idle: 1800000
})

$(document).ready(function() {
    $('.select2').select2();
});

</script>

</body>
</html>
