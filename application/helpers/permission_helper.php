<?php

	function get_http_response_code($url) {
    	$headers = get_headers($url);
    	return substr($headers[0], 9, 3);
	}

	function get_controllers_names()
	{
		$files = array();
		
		if (function_exists('get_files_in')) {
			$files =  get_files_in(APPPATH.'controllers');	
		}

		$names = array();
		if ($files) {
			foreach ($files as $key => $name) {
				$names[] = removeFromEnd($name,'.php');
			}
		}
		return $names;
	}

	function set_module_name($text='',$length=3)
	{
		$text 	= str_replace('_', ' ', $text);
		$size 	= strlen($text);
		$len 	= $size-$length;
		$text 	= substr($text, $length,$len);
		return ucwords($text);
	}

	function get_user_groups_by($user_id=''){
		$ci =&get_instance();
		$data = $ci->db->where('user_id',$user_id)->get('users_groups')->result_array();
		$send = array();
		if ($data) {
			foreach ($data as $key => $value) {
				$send[] = array(
					'id'=> $value['group_id'],
					'name'=> get_group_name($value['group_id'])
				);
			}
		}
		return $send;
	}

	function get_group_name($id_group=''){
		$ci =&get_instance();
		$ci->load->model('groups');
		$data = $ci->groups->get($id_group);
		if (isset($data['name'])) {
			return $data['name'];
		}
		return false;
	}