<?php
/**
* 
*/
class Permissions extends MY_Model
{
	protected $return_type = 'array';
	protected $primary_key = 'id_permission';
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_actions_by_modul_and_group_id($modul='',$group_id='')
	{
		$this->db->select('aksi');
		$this->db->where('modul',$modul);
		$this->db->where('group_id',$group_id);
		$data = $this->db->get($this->_table)->result_array();
		$send = array();
		if ($data) {
			foreach ($data as $value) {
				$send[] = $value['aksi'];
			}
		}
		return $send;
	}
	
	public function delete_by($modul='',$aksi='',$group_id='')
	{
		$this->db->where('modul',$modul);
		$this->db->where('aksi',$aksi);
		$this->db->where('group_id',$group_id);
		return $this->db->delete($this->_table);
	}

	public function get_by_multi_groups($group_ids=array()){
		if ($group_ids) {
			$this->db->where_in('group_id',$group_ids);
			return $this->db->get($this->_table)->result_array();
		}
	}
}