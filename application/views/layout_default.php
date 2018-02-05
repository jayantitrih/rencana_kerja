<!DOCTYPE html>
<html>
<head>
	<title>Rencana Kerja</title>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/');?>css/bootstrap.min.css">
	<style type="text/css">
  .kotak{
    width: 30%;
    background-color: #f2f2f2;
    padding: 10px;
    margin: auto;
    position: 20px;
    margin-top: 150px;
  }
  input[type=text],input[type=password]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  </style>
	<script type="text/javascript" src="<?php echo base_url('assets/');?>js/jquery-1.9.1.min.js"></script>

</head>
<body>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href=''>Tridharma Dosen</a>
    </div>
	<div>
		<ul class="nav navbar-nav">
			<li><a href='<?php echo site_url('user')?>'>Dosen</a></li>
			<li><a href='<?php echo site_url('user/identitas')?>'>Identitas</a></li>
			<li><a href='<?php echo site_url('user/kepegawaian')?>'>Kepegawaian</a></li>
			<li><a href='<?php echo site_url('user/akademik')?>'>Akademik</a></li>
			<li><a href='<?php echo site_url('user/pendidikan')?>'>Pendidikan</a></li>
			<li><a href='<?php echo site_url('user/pengajaran')?>'>Pengajaran</a></li>
			<li><a href='<?php echo site_url('user/pengabdian_masyarakat')?>'>Pengabdian Masyarakat</a></li>
			<li><a href='<?php echo site_url('user/penelitian')?>'>Penelitian</a></li>
			<li><a href='<?php echo site_url('user/penunjang')?>'>Penunjang Tridharma</a></li>
		</ul>
	</div>
	<ul class="nav navbar-nav navbar-right">
	<li><a href='<?php echo site_url('auth/detail_user');?>'><span class="glyphicon glyphicon-user"></span>Profil</a></li>
      <li><a href='<?php echo site_url('auth/logout');?>' class="btn btn-default"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
	</div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<?php echo (isset($alert))? $alert : '' ;?>
			<?php echo (isset($content))? $content : '' ;?>
		</div>
	</div>
</div>
	<script type="text/javascript" src="<?php echo base_url('assets/');?>js/tether.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/');?>js/bootstrap.min.js"></script>
</body>
</html>