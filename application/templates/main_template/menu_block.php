<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<li
	<?php echo anchor('welcome/login',ucfirst('login'),array('class'=>'nav-link'));?>
</li>
<li>
	<?php echo anchor('welcome/register',ucfirst('regisster'),array('class'=>'nav-link'));?>
</li>