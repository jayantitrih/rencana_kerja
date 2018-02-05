<!DOCTYPE html>
<html>
<head>
	<title>Rencana Kerja</title>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/');?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/');?>font-awesome/css/font-awesome.min.css">
	<script type="text/javascript" src="<?php echo base_url('assets/');?>js/jquery-1.9.1.min.js"></script>
	
	<?php foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	
	<?php foreach($js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>

</head>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
      <?php echo anchor('user/setting','Pengaturan',array('class'=>'navbar-brand'));?>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php

        if (
                isset($menu) &&
                isset($me)
            ) {
            $list ='';

            if ($menu) {
                
                foreach ($menu as $key => $value) {

                    if (!in_array($value, array('__construct','index','get_instance','do_migration','logout'))) { //menu selain index dan __contruct akan ditampilkan
                        $list .='<li>';
                        $label = str_replace('_', ' ', $value); //ganti underscore dengan spasi
                        $label = ucwords($label); //huruf depan menjadi kapital
                        $list .= anchor($me.'/'.$value, $label); //pengganti tag link *<a>
                        $list .='</li>';
                    }
                }
                
            }
            echo $list;
        }

      ?>
        
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
            	<?php echo anchor('user/index','<i class="fa fa-user"></i>&nbsp;Profil');?>
            </li>
            <li>
            	<?php echo anchor('user/setting','<i class="fa fa-gear"></i>&nbsp;Pengaturan');?>
            </li>
            <li role="separator" class="divider"></li>
            <li>
            	<?php echo anchor('auth/logout','<i class="fa fa-sign-out"></i>&nbsp;Keluar');?>
            </li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container">
	<div class="row">
		<div class="col-xs-12">

			<?php echo (isset($alert))? $alert : '' ;?>
			<?php echo (isset($content))? $content : '' ;?>
			<?php echo (isset($output))? $output : '' ;?>
		</div>
	</div>
</div>
	<script type="text/javascript" src="<?php echo base_url('assets/');?>js/tether.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/');?>js/bootstrap.min.js"></script>
</body>
</html>