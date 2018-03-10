<div class="row">
    <div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-offset-2">
        <?php echo form_open('welcome/submit_register');?>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>
                                <?php echo lang('create_user_fname_label', 'first_name');?>
                            </label>
                            <?php echo form_input($first_name);?>
                        </div>
                        <div class="form-group">
                            <label>
                                <?php echo lang('create_user_lname_label', 'last_name');?>
                            </label>
                            <?php echo form_input($last_name);?>
                        </div>
                        <div class="form-group">
                            <label>
                                <?php echo lang('create_user_identity_label', 'identity');?>
                            </label>
                            <?php echo form_input($identity);?>
                        </div>

                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>
                                <?php echo lang('create_user_email_label', 'email');?>
                            </label>
                            <?php echo form_input($email);?>
                        </div>
                        <div class="form-group">
                            <label>
                                <?php echo lang('create_user_phone_label', 'phone');?>
                            </label>
                            <?php echo form_input($phone);?>
                        </div>
                        <div class="form-group">
                            <label>
                                <?php echo lang('login_password_label', 'password');?>
                            </label>
                            <?php echo form_input($password);?>
                        </div>
                        <div class="form-group">
                            <label>
                                <?php echo lang('create_user_password_confirm_label', 'password_confirm');?>
                            </label>
                            <?php echo form_input($password_confirm);?>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-xs-6">
                        <?php echo anchor('welcome/login','Back');?>
                    </div>
                    <div class="col-xs-6">
                        <div class="text-right">
                            <?php echo form_submit('submit','Register',array('class'=>'btn btn-primary'));?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close();?>
    </div>
</div>