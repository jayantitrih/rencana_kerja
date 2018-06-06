<?php
/**
* 
*/
class Pengajaran extends MY_Model
{
	public $primary_key ='id_pengajaran';
	public $return_type ='array';
	function __construct()
	{
		parent::__construct();
	}

	public function get_jumlah_sks($id_identitas=''){
		$this->_database->from($this->_table); //table pendidikan
		$this->_database->select_sum('pengajaran.SKS');
		$this->_database->join('identitas','pengajaran.id_identitas = identitas.id_identitas','LEFT');
		$this->_database->where('pengajaran.id_identitas',$id_identitas);
		return $this->_database->get()->row_array();
	}
}