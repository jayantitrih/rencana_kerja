<div class="row">
    <div class="col-xs-12 col-md-6 col-md-offset-3 col-lg-offset-3">
        <?php echo form_open('welcome/verify_login');?>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label>
                        <?php echo lang('login_identity_label', 'identity');?>
                    </label>
                    <?php echo form_input($identity);?>
                </div>
                <div class="form-group">
                    <label>
                        <?php echo lang('login_password_label', 'password');?>
                    </label>
                    <?php echo form_input($password);?>
                </div>
            </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="text-left">
                                <?php echo lang('login_remember_label', 'remember');?>
                                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="text-right">
                                <?php echo form_submit('submit', lang('login_submit_btn'),array('class'=>'btn btn-primary'));?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <a href="<?php echo site_url('welcome/forgot_password');?>">
            <?php echo lang('login_forgot_password');?>
        </a>
        <?php echo form_close();?>
    </div>
</div>