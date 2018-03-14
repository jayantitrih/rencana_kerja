<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html> 
<head>
    <?php //$CI->layout->trigger_title(); ?>
    <?php //$CI->layout->trigger_charset(); ?>
    <?php //$CI->layout->trigger_metadata(); ?>
    <?php //$CI->layout->trigger_http_equiv(); ?>
    <?php //$CI->layout->add_css_uri('css/app.landing.css');?>
    <?php //$CI->layout->add_css_uri('css/emom.core.css');?>
    <?php //$CI->layout->add_css_uri('css/font-awesome.min.css','local');?>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Roboto+Condensed|Raleway|Lato"
      rel="stylesheet">
    <?php $CI->layout->add_css_uri('bootstrap/css/bootstrap.min.css');?>
    <?php $CI->layout->add_css_uri('css/rifqi.css');?>

    <?php $CI->layout->trigger_css(); ?>
    <?php $CI->layout->add_js_uri('js/jquery-3.2.1.min.js');?>
    <?php $CI->layout->add_js_uri('bootstrap/js/bootstrap.min.js');?>
    <?php $CI->layout->add_js_uri('font-awesome/svg-with-js/js/fontawesome-all.js');?>
    <?php $CI->layout->add_js_uri('js/rifqi.js');?>

</head>
<body data-spy="scroll" data-target="#navbar-scrollspy" data-offset="50">
    <div class="arrow">
        <a href="#home" style="color: #fff;"><i class="fas fa-arrow-up gotop"></i></a>
    </div>
<!--     <div class="flex-center position-ref full-height">
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
    </div> -->

    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="navbar-scrollspy">
        <div class="container">
          <a class="navbar-brand" href="#">Logo</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="#whatwedo">What We Do</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#tentangkami">Tentang Kami</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#feedback">Feedback</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Need Help ?</a>
              </li>
              <li class="nav-item">
                <?php echo anchor('welcome/login','Login',array('class'=>'nav-link button-login'));?>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <div class="content-1" id="home">
        <div class="content-2 text-center">
            <h1>Electronic Minute Of Meeting</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor<br> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud<br> exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.</p>
            <div class="content-4">
                <button class="btn button-outline">Learn More</button>
                <a href="#whatwedo" class="btn button">Get Started</a>
            </div>
        </div>
    <div class="content-3"></div>
    </div>

    <div class="howto" id="whatwedo">
        <div class="container">
            <div class="text-center">
                <h2 class="judul">What We Do</h2>
                <div class="judul-line"></div>
                 <p class="paragraf-judul">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                 consequat.</p>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="box">
                        <i class="material-icons icons-1" style="color: #8D5DFA;">record_voice_over</i>
                        <h3>Konfirmasi Akun</h3>
                        <p class="paragraf">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box">
                        <i class="material-icons icons-1" style="color: #1C81CE;">fingerprint</i>
                        <h3>Ceklist Kehadiran</h3>
                        <p class="paragraf">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box">
                        <i class="material-icons icons-1" style="color: #E32415;">done_all</i>
                        <h3>Menyelesaikan Tugas</h3>
                        <p class="paragraf">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tentangkami" id="tentangkami">
        <div class="container">
            <div class="text-center">
                <div class="box">
                    <h2 class="judul">Tentang Kami</h2>
                    <div class="judul-line"></div>
                     <p class="paragraf-judul">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                     consequat.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="feedback" id="feedback">
        <div class="container">
            <div class="text-center">
                <h2 class="judul">Feedback</h2>
                <div class="judul-line"></div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box">
                            <div class="row">
                                <div class="col-md-4">
                                    <i class="fas fa-comments feedback-icons-1"></i>
                                </div>
                                <div class="col-md-8 text-left">
                                    <h4 style="font-weight: 100;">How do you feel about the support you received from Mat</h4>
                                </div>
                            </div>
                                 <p class="paragraf">Do you have any additional feedback for us? We're listening.</p>
                            <form>
                              <div class="form-group">
                                <input type="text" class="form-control feedback-input" placeholder="Nama Lengkap">
                              </div>
                              <div class="form-group">
                                <input type="email" class="form-control feedback-input" placeholder="Email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                              </div>
                              <div class="form-group">
                                <textarea class="form-control feedback-input" id="exampleFormControlTextarea1" rows="3"></textarea>
                              </div>
                              <button type="submit" class="btn button-feedback">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 text-left" style="padding: 0px 25px;">
                        <h3 class="iwanfirmawan">Iwan Firmawan</h3>
                        <p class="paragraf" style="margin-top: 5%;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                        <p class="paragraf" style="margin-top: 5%;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                        <div class="feedback-email">
                            <div class="row">
                                <div class="col-lg-12 feedback-icons">
                                    <i class="fas fa-envelope-square"></i>
                                    <p class="paragraf feedback-custom">iwanfirmawan@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <ul class="social-network social-circle">
                            <li><a href="#" class="facebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" class="twitter" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" class="linkedin" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#" class="google" title="Google"><i class="fab fa-google"></i></a></li>
                        </ul>
                        <p class="copyright">Copyright 2018 © EMoM, Designed by: <a class="copyright-1" target="_blank" href="https://www.facebook.com/rifqymuskar">Rifqi-Muskar</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php //$CI->layout->include_template('footer_partial'); ?>
    <?php $CI->layout->trigger_js(); ?>

</body>

</html>