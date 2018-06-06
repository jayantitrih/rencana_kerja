<?php
/**
* 
*/
class Penunjang extends MY_Model
{
	public $primary_key ='id_penunjang';
	public $return_type ='array';
	function __construct()
	{
		parent::__construct();
	}

	public function get_jumlah_sks($id_identitas=''){
		$this->_database->from($this->_table); //table penunjang
		$this->_database->select_sum('penunjang.SKS');
		$this->_database->join('identitas','penunjang.id_identitas = identitas.id_identitas','LEFT');
		$this->_database->where('penunjang.id_identitas',$id_identitas);
		return $this->_database->get()->row_array();
	}
}