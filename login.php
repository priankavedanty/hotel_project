<?php

if(!isset($_SESSION)) {session_start();}
  include_once 'koneksi.php'; 
  include_once 'config.php';
  setlocale(LC_ALL, 'IND');
  date_default_timezone_set('Asia/Kuala_Lumpur');

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HOTEL | LINEN</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <meta property="rtoken" content="<?php print $_SESSION['rtoken'] ?>" />
</head>

<body class="hold-transition login-page" style="background-color: silver;"> <!-- Background colour -->
<div class="login-box">
  <div class="login-logo">
    <a href="login.php"><b>HOTEL | LINEN</b> MANAGEMENT SYSTEM</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" id="user" autocomplete="on">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="pass" autocomplete="on">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
         <!--<div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>-->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" onclick="login()" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- Sweetalert -->
<script src="bower_components/sweetalert-master/docs/assets/sweetalert/sweetalert.min.js"></script>

<script>
function login(){
  var user = $('#user').val();
  var pass = $('#pass').val();
  var token = document.querySelector("meta[property='rtoken']").getAttribute("content");

  if(user == "" || pass == "")
  {
    swal({icon: 'error', title: 'Oops...', text: "Username dan password tidak boleh kosong!",})
  }
  else
  {
    $.ajax({
      type:'POST',
      url:"func/fLogin.php", 
      data:{user:user,pass:pass,token:token}
    }).always(function(response)
    {
        if(response == 1) 
        {
          swal({text: "Login berhasil!",icon: 'success', timer: 2800, button: false }).then((result) => {window.location = "index.php";})
        }
        else if(response == 0)  
        {
          swal({icon: 'error',title: 'Oops...',text: "Username atau password salah!",})
        }
        else if(response == "nonaktif")  
        {
          swal({icon: 'error',title: 'Oops...',text: "Status akun anda tidak aktif, Hubungi administrator!",})
        }
        else
        {
          swal({icon: 'error',title: 'Oops...',html: "Sistem sedang offline <br> Silahkan coba beberapa saat lagi!",})
        }
    });
  }
}

</script>

</body>
</html>
