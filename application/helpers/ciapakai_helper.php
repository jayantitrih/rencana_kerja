<?php


function get_info_user($user_id='',$field='username')
{
	$ci =&get_instance();
	$ci->load->model('users');

	if ($user = $ci->users->get($user_id)) {
		if (isset($user[$field])) {
			return ucwords($user[$field]);
		}
	}
}