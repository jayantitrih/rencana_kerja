<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
</head>
<body>
		<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Tridharma Dosen</a>
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


	
	<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>
</body>
</html>
