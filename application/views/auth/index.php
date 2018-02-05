<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


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

<h1><<?php echo lang('index_heading');?>>ADMIN</h1>


<div id="infoMessage"><?php echo $message;?></div>

<table cellpadding=0 cellspacing=10 class="table">
	<tr>
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_lname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
	</tr>
	<?php foreach ($users as $user):?>
		<tr>
            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
		</tr>
	<?php endforeach;?>
</table>
<button><?php echo anchor('auth/create_user', lang('index_create_user_link'))?></button>
