<!DOCTYPE html>
<html>
<head>
    <?php $CI->layout->trigger_title(); ?>
    <?php $CI->layout->trigger_charset(); ?>
    <?php $CI->layout->trigger_metadata(); ?>
    <?php $CI->layout->trigger_http_equiv(); ?>
    <?php $CI->layout->add_css_uri('css/app.css');?>
    <?php $CI->layout->add_css_uri('css/bootstrap-notifications.min.css');?>
    <?php $CI->layout->add_css_uri('css/font-awesome.min.css','local');?>
    <?php $CI->layout->add_css_uri('css/dataTables.bootstrap.css','local');?>

    <?php $CI->layout->trigger_css(); ?>
</head>
<body>
    <div class="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header"> 
                    <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo site_url('/');?>">
                        <?php echo (isset($app_name))? $app_name : 'Codeigniter Apps';?>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
                    <?php $CI->layout->block('menu_block'); ?> 
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <?php

                    if($CI->current_user){
                        $CI->layout->trigger_breadcrumb();
                    }
                    
                    ?>
                </div>
                <div class="col-xs-12">
                    <?php echo (isset($alert))? $alert : ''; ?>
                    
                    <?php $CI->layout->trigger_content_section('main'); ?>
                    
                </div>
            </div>
        </div>
    </div>
    <?php $CI->layout->include_template('hidden_partial'); ?>

    <?php $CI->layout->add_js_uri('js/jquery-3.2.1.min.js');?>
    <?php $CI->layout->add_js_uri('js/app.js');?>
    
    <?php $CI->layout->add_js_uri('js/jquery.dataTables.min.js');?>
    <?php $CI->layout->add_js_uri('js/dataTables.bootstrap.js');?>
    

    <?php $CI->layout->add_js_uri('js/ciapakai.js');?>
    
    <?php $CI->layout->trigger_js(); ?>
</body>
</html>