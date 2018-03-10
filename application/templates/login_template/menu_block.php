<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
    $ci     =&get_instance();
    $method = $ci->uri->segment(2);
?>
<ul class="nav navbar-nav navbar-right">
    <li <?php echo ($method == 'login' || empty($method))? 'class="active"' : '';?>>
        <?php echo anchor('welcome/login','Login');?>
    </li>
    <li <?php echo ($method == 'register')? 'class="active"' : '';?>>
        <?php echo anchor('welcome/register','Register');?>
    </li>
</ul>