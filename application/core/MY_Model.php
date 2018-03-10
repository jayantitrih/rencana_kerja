<?php

/**
* 
*/
require 'Jamie_Model.php';
class MY_Model extends Jamie_Model
{
	/**
	 * [$list_join larik pernyataan perintah join sql]
	 * @var array
	 */
	public $list_join;
	/**
	 * [$column larik daftar kolom dari table yang sedang digunakan]
	 * @var [array]
	 */
	public $column;
	/**
	 * [$condition larik pernyataan kondisi perintah join sql]
	 * @var array
	 */
	public $condition = array();
	/**
	 * [$select_join pernyataan perintah sql untuk meyeleksi kolom yang akan digunakan]
	 * @var [type]
	 */
	protected $select_join;
	/**
	 * [$from_join pernyataan perintah ]
	 * @var [string]
	 */
	protected $from_join;
	
	function __construct()	
	{
		parent::__construct();
		/**
		 * [$this->column mengisikan default column dari fields table yang sedang digunakan]
		 * @var [type]
		 */
		$this->column = $this->_database->list_fields($this->_table);
	}
	/**
	 * [check_query_statement memeriksa isi pernyataan query terakhir yang dijalankan]
	 * @return [string] [pernyataan sql]
	 */
	public function check_query_statement()
	{
		return $this->_database->last_query();
	}
	/**
	 * [set_query_like membuat pernyataan perintah like dalam pencarian data pada tabel]
	 */
	public function set_query_like($table_name='')
	{
		$find		='';//default empty 
		$this->_database->query(" SET collation_connection = 'utf8_general_ci'"); //mengurangi resiko gagal pada perintah like
		if (isset($_REQUEST['searchPhrase'])) {//jika menggunakan request jquerybootgrid
			$find 	= $_REQUEST['searchPhrase'];//ambil data keyword dari pengguna
		}
		if (isset($_POST['search'])) { //jika menggunakan request datatables
			$query 	= $_POST['search'];
			$find 	= $query['value'];//ambil data keyword dari pengguna
		}
		$find		= trim($find); //menghilangkan spasi kosong dengan trim
		$table_name = trim($table_name);

		if (isset($find) && !empty($find)) {//
			foreach ($this->column as $key => $item) {
				if ($item !='id') { //selain column id
					//memisahkan kolom pertama yang menggunakan syntax like dengan syntax selanjutnya menggunakan or like.
					if ($key == 1) {
						
						if (empty($table_name)) {
							$this->_database->like($item, $find);
						}else{
							$this->_database->like($table_name.'.`'.$item.'`', $find);	
						}
						

					}else{
						if (empty($table_name)) {
							$this->_database->or_like($item, $find); 
						}else{
							$this->_database->or_like($table_name.'.`'.$item.'`', $find); 
						}
					}
				}
			}
		}
	}
	/**
	 * [set_query_limit membuat query untuk membuat halaman pada tampilan tabel]
	 */
	public function set_query_limit()
	{
		$page 			= 1;
		if (isset($_POST['length']) && isset($_POST['start'])) {
			if($_POST['length'] != -1)
				$this->_database->limit($_POST['length'], $_POST['start']);
		}elseif (isset($_REQUEST['current']) && isset($_REQUEST['rowCount']))  {
			$limit 		= $_REQUEST['rowCount'];
			$page 		= $_REQUEST['current'];
			$start_from = ($page-1) * $limit;
			if($limit != -1)
				$this->_database->limit($limit,$start_from);
		}
	}

	/**
	 * [show_all query select yang dapat digunakan sebagai resource datatables atau jquerybootgrid.]
	 * @return [array] [larik semua data]
	 */
	public function show_all()
	{
		$this->set_query_like();
		$this->set_query_limit();
		return $this->as_array()->get_all();
	}
	/**
	 * [get_join description]
	 * @param  string $output [description]
	 * @return [type]         [description]
	 */
	public function get_join($output = 'result_array')
	{

		$join_table = $this->config->item('table')['join'];
		$select 	= (is_null($this->select_join))? '*' 		: $this->select_join;
		$from 		= (is_null($this->from_join))? $this->_table 	: $this->from_join;
		$this->_database->select($select);
		$this->_database->from($from);
		if ($this->condition) {
			$this->_database->where($this->condition); //
		}
		if ($this->list_join) {
			foreach ($this->list_join as $key => $value) {
				if (in_array($key, $join_table)) {
					$this->_database->join($key,$value);
				}
			}
		}
		return $this->_database->get()->$output();
	}

	/**
	 * [get_enum_values ambil isi data pada kolom yang bertype ENUM]
	 * @param  [string] $field [nama kolom yang bertype ENUM]
	 * @return [array] [data]
	 */
	public function get_enum_values($field)
	{
		$type = $this->db
			->query( "SHOW COLUMNS FROM ".$this->_database->dbprefix."{$this->_table} WHERE Field = '{$field}'" )
			->row(0)
			->Type; 
		preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches); //mengekstraksi data enum dari kolom
		$enum = explode("','", $matches[1]);//memecah hasil ekstrasi dengan koma untuk mendapatkan nilai enumnya.
		return $enum; 	  	
	}
	/**
	 * [get_from_requester ambil data dari akun yang melakukan permintaan kepada akun lain]
	 * @param  [integer] $id [id data primary key]
	 * @return [array]     [detail data sesuai dengan tabel dan id yang sedang digunakan]
	 */
	public function get_from_requester($id)
	{
		return $this->get_many_by('id_permintaan_dari',$id);
	}
	/**
	 * [get_from_creator ambil data dari akun yang menanggapi permintaan dari akun lain ]
	 * @param  [integer] $id [description]
	 * @return [array]     [detail data sesuai dengan tabel dan id yang sedang digunakan]
	 */
	public function get_from_creator($id)
	{
		return $this->get_many_by('id_tanggapi_oleh',$id);
	}
	/**
	 * [get_requester_username mengambil username yang melakukan permintaan dari tabel yang sedang aktif]
	 * @param  [integer] $id_user [id akun dari tabel users]
	 * @return [string]          [username]
	 */
	public function get_requester_username($id_user)
	{
		$query = $this->_database->get_where('users',array('id' => $id_user));
		if ($query->num_rows() > 0) {
			$data = $query->row();
			return $data->username; //ambil username
		}
	}

	public function last_id()
	{
		$db_name = $this->_database->database;
		$sql 	 = "SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$db_name' AND   TABLE_NAME   = '".$this->_table."';";
		$result = $this->_database->query($sql)->row();
		if (!is_null($result->AUTO_INCREMENT)) {
			return intval($result->AUTO_INCREMENT);
		}
		return 1;
	}

	public function get_by_like($fields=array(),$keyword='')
	{
		$data 			= array();
		$intersect 		= array_intersect($fields, $this->column);
		$count_intersect= count($intersect);
		if ($fields && $count_intersect > 0) {
			
			foreach ($fields as $key => $field) {
				if ($key == 0) {
					$this->_database->like($field,$keyword);
				}else{
					$this->_database->or_like($field,$keyword);
				}
			}

			$data 	 = $this->_database->get($this->_table)->result_array();
		}
		return $data;
	}

	public function get_primary_key(){
		$query 	= "SHOW KEYS FROM ".$this->_table." WHERE Key_name = 'PRIMARY'";
  		$result = $this->_database->query($query)->row();
  		if ($result) {
  			return $result->Column_name;
		}else{
			return false;
		}
	}

	public function set_query_sorting()
	{
		if (isset($_REQUEST['sort'])) {
			if ($_REQUEST['sort']) {
				foreach ($_REQUEST['sort'] as $key => $value) {
					$this->_database->order_by($key,$value);
				}
			}
		}
	}


	public function json_jquerybootgrid($where=array(),$join=array())
	{
		
		$this->_database->query("SET collation_connection = 'utf8_general_ci'"); 
		
		$this->_database->from($this->_table);
		
		if (isset($_REQUEST['searchPhrase'])) {
			$keyword 		= trim($_REQUEST['searchPhrase']);
			$keyword_len 	= strlen($keyword);
			if (
					$this->column && 
					!empty($keyword) &&
					$keyword_len > 3
				) {

				foreach ($this->column as $key => $field) {
					if ($key == 0) {
						$this->_database->like($field,$keyword);
					}else{
						$this->_database->or_like($field,$keyword);
					}
				}
			}
		}
		
		$limit 		= 10;
		$start_from = 1;
		
		$start_from = 0;

		if (isset($_REQUEST['current']) && isset($_REQUEST['rowCount']))  {
			$limit 		= $_REQUEST['rowCount'];
			$page 		= $_REQUEST['current'];
			$start_from = ($page-1) * $limit;
		}

		if ($join) {
			foreach ($join as $key => $value) {
				if (
					isset($value['table']) &&
					isset($value['equal']) &&
					isset($value['type']) 
					) {

					$this->_database->join(
						$value['table'],
						$value['equal'],
						$value['type']
					);
				}
			}
		}

		if ($where) {
			
			if( $start_from != -1){
				$data['rows']  = $this->_database
					->where($where)
				 	->limit($limit,$start_from)
				 	->get()->result_array();
			}

		}else{
			
			if($start_from != -1){
				$data['rows'] = $this->db
				->limit($limit,$start_from)
				->get()->result_array();
			}

			
		}


		if ($where) {
			if ($join) {
				if (
					isset($join[0]['table']) &&
					isset($join[0]['equal']) &&
					isset($join[0]['type']) 
					) {

					$data['total'] 	= $this->_database
					->from($this->_table)
					->join($join[0]['table'],$join[0]['equal'],$join[0]['type'])
					->where($where)->count_all_results();
					//return $this->_database->last_query();
				}

			}else{
				$data['total'] 	= $this->_database->from($this->_table)->where($where)->count_all_results();
			}
		}else{
			$data['total'] 	=$this->_database->from($this->_table)->count_all_results();
		}

		if (isset($data['rows'])) {
			$data['rowCount'] = count($data['rows']);
		}

		$data['current'] 	  = 1;
		if (isset($_REQUEST['current'])) {
			$data['current']  = $_REQUEST['current'];
		}

		return $data;
		
	}
}