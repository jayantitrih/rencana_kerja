<div class="login-5">
    <h3 class="text-left"><?php echo lang('forgot_password_heading');?></h3>
    <p class="paragraf text-left" style="margin-top: 20px;">
        <?php echo lang('forgot_password_subheading');?>
    </p>
    <?php echo form_open('welcome/submit_forgot_password');?>
    <div class="form-group">
        <?php echo form_input($identity);?>
    </div>
    <?php echo form_submit('submit', lang('forgot_password_submit_btn'),array('class'=>'btn login-7'));?>
    <?php echo form_close();?>
    <p class="paragraf text-left">
        <?php echo anchor('welcome/login','Back');?>
    </p>
</div>