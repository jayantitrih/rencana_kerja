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
    <?php $CI->layout->trigger_css(); ?>

    <?php if(isset($css_files) && isset($js_files)): ?>

        <?php foreach($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>

        <?php foreach($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>

    <?php endif; ?>

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
                    <?php
                    if (!isset($app_name)) {
                        $app_name = 'Codeigniter Apps';
                    }
                    if ($CI->current_user) {
                        echo anchor('dashboard/index',$app_name,array('class'=>'navbar-brand'));
                    }else{
                        echo anchor('welcome/index',$app_name,array('class'=>'navbar-brand'));
                    }
                    ?>
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
                    //$controller = $CI->router->fetch_class();
                    $method     = $CI->router->fetch_method();
                    if ($method != 'index') {
                        if($CI->current_user){
                           // $CI->layout->trigger_breadcrumb();
                        }
                    }
                    
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">

                    <?php echo (isset($alert))? $alert : ''; ?>
                    
                    <?php $CI->layout->trigger_content_section('main'); ?>
                    
                </div>
            </div>
        </div>
    </div>
    <?php
        if (
            $CI->router->fetch_method() == 'index' && 
            $CI->router->fetch_class() !='admin'
            ) {
            //selain grocery
            $CI->layout->add_js_uri('js/jquery-1.9.1.min.js');
        } 
    ?>
    <?php $CI->layout->add_js_uri('js/bootstrap.min.js');?>
    <!-- render javascripts depedency -->
    <?php $CI->layout->trigger_js(); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            var url = window.location;
            $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
            $('ul.nav a').filter(function() {
                return this.href == url;
            }).parent().addClass('active');
        });
    </script>
</body>
</html>