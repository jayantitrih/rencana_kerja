<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
    <title></title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Roboto+Condensed"
      rel="stylesheet">
    <?php $CI->layout->add_css_uri('bootstrap/css/bootstrap.min.css');?>
    <?php $CI->layout->add_css_uri('css/rifqi.css');?>

    <?php $CI->layout->trigger_css(); ?>
    <?php $CI->layout->add_js_uri('js/jquery-3.2.1.min.js');?>
    <?php $CI->layout->add_js_uri('font-awesome/svg-with-js/js/fontawesome-all.js');?>
    <?php $CI->layout->add_js_uri('bootstrap/js/bootstrap.min.js');?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <?php $CI->layout->add_js_uri('js/rifqi.js');?>

</head>
<body>

    <div class="login">
        <div class="container">
            <div class="box-login">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="login-1">
                           <a href="<?=site_url('welcome')?>" ><i data-toggle="tooltip" data-placement="top" title="Back to home" class="material-icons arrow-login">arrow_back</i></a>
                            <i class="fab fa-accusoft login-4"></i>
                            <h3 class="login-31">Welcome</h3>
                            <p>it's cold outside....Enter!</p>
                            <ul class="login-2 text-left">
                                <li><i class="far fa-dot-circle"></i>&nbsp;&nbsp; Simply create your calendar</li>
                                <li><i class="far fa-dot-circle"></i>&nbsp;&nbsp; Add content for each days</li>
                                <li><i class="far fa-dot-circle"></i>&nbsp;&nbsp; Share it to the world (become a rockstar</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="login-5">
                            <h3 class="text-left">Login</h3>
                            <p class="paragraf text-left" style="margin-top: 20px;">Fill out the from below to get started</p>
                            <form class="login-8">
                              <div class="form-group">
                                <input type="email" class="form-control login-6" placeholder="Username">
                              </div>
                              <div class="form-group">
                                <input type="password" class="form-control login-6" placeholder="Password">
                              </div>
                              <button type="submit" class="btn login-7">Login</button>
                            </form>
                            <p class="paragraf text-left">Don't have an <a href="#">account?</a> / <a href="#">Forgot password</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php $CI->layout->trigger_js(); ?>
</body>
</html>