<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<p>
	This Codeigniter framework is already setup with the following libraries
</p>
<div class="links">
<?php
	if (isset($links)) {
		foreach ($links as $key => $value) {
			echo anchor($value,strtoupper($key),array('target'=>'blank'));
		}
	}
?>
</div>