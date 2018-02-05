<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Membuat Login Dengan Codeigniter & Bootstrap | www.coderbiasa.com</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap/bootstrap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/fonts/font-awesome.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/ionicons.min.css')?>">
 
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    Login
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
 
    <form action="<?php echo site_url('login/proses'); ?>" method="post">
      <?php if (validation_errors() || $this->session->flashdata('result_login')) { ?> //menampilkan pesan error.
            <div class="alert alert-danger animated fadeInDown" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Peringatan!</strong>
                <?php echo validation_errors(); ?>
                <?php echo $this->session->flashdata('result_login'); ?>
            </div>
      <?php } ?>
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" autofocus="true">
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4 pull-right">
          <button type="submit" id="btn_login" class="btn btn-default pull-right">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
 
  </div>
  <center><strong>Copyright &copy; 2017 <a href="#">Coder Biasa</a>.</strong> All rights
  reserved.</br><b>Version</b> 1.0.0</center>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
 
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('assets/js/plugins/jQuery/jquery-2.2.3.min.js')?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/js/bootstrap/bootstrap.min.js')?>"></script>
</body>
</html>