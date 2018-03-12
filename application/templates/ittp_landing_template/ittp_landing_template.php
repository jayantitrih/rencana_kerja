<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html> 
<head>
    <?php $CI->layout->trigger_title(); ?>
    <?php $CI->layout->trigger_charset(); ?>
    <?php $CI->layout->trigger_metadata(); ?>
    <?php $CI->layout->trigger_http_equiv(); ?>
    <?php $CI->layout->add_css_uri('css/app.landing.css');?>
    <?php //$CI->layout->add_css_uri('css/emom.core.css');?>
    <?php $CI->layout->add_css_uri('css/font-awesome.min.css','local');?>
    <?php $CI->layout->trigger_css(); ?>
</head>
<body >
    <div class="flex-center position-ref full-height">
        <div class="top-right links" >
            <?php echo anchor('#','Need Help?');?>
            <?php echo anchor('welcome/login','Login',array('class'=>'btn btn-primary'));?>
        </div>
        <div class="content" style="background-color: rgba(0,0,0,0.5);width: 100%;">
            <div class="title m-b-md">
                <?php echo (isset($app_name))? $app_name : 'Codeigniter Apps';?>
            </div>
            <div >
                <?php $CI->layout->trigger_content_section('main'); ?>
            </div>
        </div>
    </div>



    <?php //$CI->layout->include_template('footer_partial'); ?>
    <?php $CI->layout->trigger_js(); ?>
</body>

</html>