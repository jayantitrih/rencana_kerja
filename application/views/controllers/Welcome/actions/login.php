<div class="login-5">
    <h3 class="text-left">Login</h3>
    <p class="paragraf text-left" style="margin-top: 20px;">
    Fill out the from below to get started</p>
    <?php echo form_open('welcome/verify_login');?>
    <div class="form-group">
        <?php echo form_input($identity);?>
    </div>
    <div class="form-group">
        <?php echo form_input($password);?>
    </div>
    
    <?php echo form_submit('submit', lang('login_submit_btn'),array('class'=>'btn login-7'));?>
    <?php echo form_close();?>
    <p class="paragraf text-left">
        <?php echo lang('login_remember_label', 'remember');?>
        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
        <!--Don't have an <a href="#">account?</a> / -->
        <?php echo anchor('welcome/forgot_password',lang('login_forgot_password'));?>
    </p>
</div>