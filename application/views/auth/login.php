<!DOCTYPE html>
<html>
<head>
  <title>Login BKD</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
  <style type="text/css">
  .kotak{
    width: 30%;
    background-color: #f2f2f2;
    padding: 10px;
    margin: auto;
    position: 20px;
    margin-top: 150px;
  }
  input[type=text],input[type=password]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  </style>
</head>
<body>
<div class="kotak">
  <h1><center><?php echo lang('login_heading');?></center></h1>     
  <div id="infoMessage"><?php echo $message;?></div>
    <?php echo form_open("auth/login");?>

            <p>
              <?php echo lang('login_identity_label', 'identity');?>
              <?php echo form_input($identity);?>
            </p>
              
            <p>
              <?php echo lang('login_password_label', 'password');?>
              <?php echo form_input($password);?>
            </p>
            <p>
              <a href='#'>Registrasi</a>
            </p>
            <p>
              <?php echo lang('login_remember_label', 'remember');?>
              <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
            </p>

            <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

            <?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p></div>
  
</body>
</html>
