<div class="panel panel-default">
	<div class="panel-heading">
	</div>
	<div class="panel-body">
		<?php echo form_open('managed/store_user/');?>
		<div class="row">
			<div class="col-xs-12 col-md-6">
				<div class="form-group">
					<label>First Name</label>
					<input type="text" name="first_name" class="form-control">
				</div>
				<div class="form-group">
					<label>Last Name</label>
					<input type="text" name="last_name" class="form-control">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control">
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input type="text" name="phone" class="form-control">
				</div>

			</div>
			<div class="col-xs-12 col-md-6">
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="identity" class="form-control">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control">
				</div>
				<div class="form-group">
					<label>Confirm Password</label>
					<input type="password" name="password_confirm" class="form-control">
				</div>
			</div>
		</div>

		<div class="text-right">
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-save"></i>&nbsp;
				Save
			</button>
		</div>
		<?php echo form_close();?>
	</div>
</div>