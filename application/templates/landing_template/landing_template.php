<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html> 
    <head>
        <?php $CI->layout->trigger_title(); ?>
        <?php $CI->layout->trigger_charset(); ?>
        <?php $CI->layout->trigger_metadata(); ?>
        <?php $CI->layout->trigger_http_equiv(); ?>
        <?php $CI->layout->add_css_uri('css/app.css');?>
        <?php $CI->layout->add_css_uri('css/app.landing.css');?>
        <?php $CI->layout->add_css_uri('css/font-awesome.min.css','local');?>
        <?php $CI->layout->trigger_css(); ?>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
                <?php $CI->layout->block('menu_block'); ?>
            </div>
            <div class="content">
                <div class="title m-b-md">
                    <?php echo (isset($app_name))? $app_name : 'Codeigniter Apps';?>
                </div>
                <?php $CI->layout->trigger_content_section('main'); ?>
                <hr/>
                <?php $CI->layout->include_template('footer_partial'); ?>
            </div>
        </div>
        <?php $CI->layout->trigger_js(); ?>

    </body>

</html>