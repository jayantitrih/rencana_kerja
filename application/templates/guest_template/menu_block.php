<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
	echo anchor('welcome/login',ucfirst('login'));
	echo anchor('welcome/register',ucfirst('register'));
?>