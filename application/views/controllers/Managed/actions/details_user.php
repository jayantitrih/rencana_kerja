
<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-6">
						Details <?php echo (isset($users['username']))? ucwords($users['username']) : '';?>
					</div>
					<div class="col-xs-6">
						<div class="text-right">
							<?php
								echo anchor('managed/edit_user/'.$users['id'],
									'<i class="fa fa-pencil"></i> Edit');
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-body">
				
				<div class="form-group">
					<h4>
						<small><?php echo lang('create_user_fname_label');?></small><br/>
						<?php echo (isset($users['first_name']))? $users['first_name'] : '';?>
					</h4>
				</div>
				<div class="form-group">
					<h4>
						<small><?php echo lang('create_user_lname_label');?></small><br/>
						<?php echo (isset($users['last_name']))? $users['last_name'] : '';?>
					</h4>
				</div>
				<div class="form-group">
					<h4>
						<small>User</small><br/>
						<?php echo (isset($users['username']))? $users['username'] : '';?>
					</h4>
				</div>
				<div class="form-group">
					<h4>
						<small><?php echo lang('create_user_email_label');?></small><br/>
						<?php echo (isset($users['email']))? $users['email'] : '';?>
					</h4>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-6">

	</div>
</div>
