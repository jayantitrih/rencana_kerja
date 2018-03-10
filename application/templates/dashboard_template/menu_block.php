<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	$ci =&get_instance();

	$username = $ci->current_user['username'];
?>
<ul class="nav navbar-nav">
	<li class="active">
		<a href="#">
			Sample
			<span class="badge">2</span>
		</a>
		
	</li>
</ul>
<ul class="nav navbar-nav navbar-right">
	<li class="dropdown dropdown-notifications">
		<a href="#" class="dropdown-toggle" id="list-notif-lg" data-toggle="dropdown" style="width: 45px; padding-right: 20px;height: 45px;">
			<i data-count="0" class="fa fa-envelope notification-icon" style="width: 50px;"></i>
		</a>
		<div class="dropdown-container" aria-labelledby="list-notif-lg">
			<div class="dropdown-toolbar">
				<div class="dropdown-toolbar-actions">
					<a href="#">Mark all as read</a>
				</div>
				<h3 class="dropdown-toolbar-title">Notifications</h3>
			</div><!-- /dropdown-toolbar -->
			<ul class="dropdown-menu notifications">  
			</ul>
			<div class="dropdown-footer text-center">
				<a href="#">View All</a>
			</div><!-- /dropdown-footer -->
		</div><!-- /dropdown-container -->
	</li>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			<?php echo (isset($username))? ucwords($username) : 'Dude';?>
			<span class="caret"></span>
		</a>
		<ul class="dropdown-menu" role="menu">
			<li>
				<?php echo anchor('dashboard/profile','Akun');?>
			</li>
			<li role="separator" class="divider"></li>
			<li>
				<a href="<?php echo site_url('dashboard/logout');?>" onclick="return confirm('are you sure?');">
					<i class="fa fa-sign-out"></i>&nbsp;
					Logout
				</a>
			</li>
		</ul>
	</li>
</ul>