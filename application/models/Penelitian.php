<?php
/**
* 
*/
class Penelitian extends MY_Model
{
	public $primary_key ='id_penelitian';
	public $return_type ='array';
	function __construct()
	{
		parent::__construct();
	}

	public function get_jumlah_sks($id_identitas=''){
		$this->_database->from($this->_table); //table penelitian
		$this->_database->select_sum('penelitian.SKS');
		$this->_database->join('identitas','penelitian.id_identitas = identitas.id_identitas','LEFT');
		$this->_database->where('penelitian.id_identitas',$id_identitas);
		return $this->_database->get()->row_array();
	}
}