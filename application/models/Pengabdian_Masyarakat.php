<?php
/**
* 
*/
class Pengabdian_Masyarakat extends MY_Model
{
	public $primary_key ='id_pengabdian';
	public $return_type ='array';
	function __construct()
	{
		parent::__construct();
	}

	public function get_jumlah_sks($id_identitas=''){
		$this->_database->from($this->_table); //table pengabdian
		$this->_database->select_sum('pengabdian_masyarakat.SKS');
		$this->_database->join('identitas','pengabdian_masyarakat.id_identitas = identitas.id_identitas','LEFT');
		$this->_database->where('pengabdian_masyarakat.id_identitas',$id_identitas);
		return $this->_database->get()->row_array();
	}
}