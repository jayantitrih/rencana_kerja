<?php
/**
* 
*/
class Groups extends MY_Model
{
	public $return_type 	= 'array';
	function __construct()
	{
		parent::__construct();
	}

	public function get_id_groups_by_user_id($user_id=''){
		$this->db->where('user_id',$user_id);
		$data = $this->db->get('users_groups')->result_array();
		$send = array();
		if ($data) {
			foreach ($data as $key => $value) {
				$send[] = $value['group_id'];
			}
		}
		return $send;
	}

}