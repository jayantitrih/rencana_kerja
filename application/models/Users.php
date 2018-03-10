<?php
/**
* 
*/
class Users extends MY_Model
{
	public $return_type = 'array';	
	public $after_get = array('forbidden_to_shown');
	function __construct()
	{
		parent::__construct();
		
	}

	public function forbidden_to_shown($users){
		$data = array('password','ip_address','forgotten_password_code','remember_code');
		foreach ($data as $key => $value) {
			
			if (isset($users[$value]) && !is_object($users)) {
				
				unset($users[$value]);
			}
			
		}
		return $users;
	}

	public function join_with_groupname()
	{
		$fields 		= array('users.id','users.created_on','users.username','users.email','users.phone','groups.name AS user_role');
		$this->column 		= array_merge(array('name'),$this->column);
		$this->_database->select($fields);
		$this->set_query_limit();
		$this->set_query_like();
		$this->_database->from('users_groups');
		$this->_database->join('users', 'users.id = users_groups.user_id');
		$this->_database->join('groups', 'groups.id = users_groups.group_id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_by_group_name($name='')
	{
		# code...SELECT users.id_message FROM users LEFT JOIN users_groups ON users_groups.user_id = users.id LEFT JOIN groups ON users_groups.group_id = groups.id WHERE groups.name ="'.$message_to.'
		$this->_database->select('users.id_message');
		$this->_database->from('users');
		$this->_database->join('users_groups','users_groups.user_id = users.id','left');
		$this->_database->join('groups','users_groups.group_id = groups.id','left');
		$this->_database->where('groups.name',$name);
		return $this->_database->get()->result();
	}
	
}