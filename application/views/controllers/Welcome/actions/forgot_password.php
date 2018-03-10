
<div class="row">
	<div class="col-xs-12 col-md-6 col-md-offset-3 col-lg-offset-3">
		<?php echo form_open('welcome/submit_forgot_password');?>
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
					<label>
						<?php 
						if ($type == 'email') {
							echo sprintf(lang('forgot_password_email_label'), $identity_label);
						}else{
							echo sprintf(lang('forgot_password_identity_label'), $identity_label);
						}?>
					</label>
					<?php echo form_input($identity);?>
				</div>
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-xs-6">
						<?php echo anchor('welcome/login','Back');?>
					</div>
					<div class="col-xs-6">
						<div class="text-right">
							<button type="submit" class="btn btn-primary">Send Password Reset Link</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php echo form_close();?>
	</div>
</div>