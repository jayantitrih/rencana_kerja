<?php
/**
* 
*/
require APPPATH.'libraries/REST_Controller.php';

class Api extends REST_Controller
{
	/**
	* @example insert data
	* @param $_POST
	* $input = $_POST;
	* $this->db->insert('nama tabel',$input);
	* @example update data
	* @param $_POST
	* $input = $_POST;
	* $this->db->where('primary_key',$_POST['primary_key']);
	* $this->db->update('nama tabel',$input);
	* @example delete data
	* @param $_POST
	* $this->db->where('primary_key',$_POST['primary_key']);
	* $this->db->insert('nama tabel');
	* @example get data
	* @param $_GET
	* $input = $_POST;
	* $this->db->where('column_name',$_POST['column_name']);
	* $this->db->get('nama tabel')->result_array();
	**/
	function __construct()
	{
		parent::__construct();
	}

	public function add_permission_post(){
		$this->load->model('permissions');
		if (isset($_POST)) {
			$message = '0';
			if ($this->form_validation->run('simpan_permission')) {
				if (
					isset($_POST['modul']) &&
					isset($_POST['aksi']) &&
					isset($_POST['group_id']) 
				) {
					$inserted_id  = $this->permissions->insert($_POST);
					$message = $inserted_id;
				}
			}
			$this->response($message);
		}else{
			$this->response('not allowed',REST_Controller::HTTP_FORBIDDEN);
		}
	}

	public function delete_permission_post(){
		$this->load->model('permissions');
		if (isset($_POST)) {
			$message ='0';
			if ($this->form_validation->run('simpan_permission')) {
				if (
					isset($_POST['modul']) &&
					isset($_POST['aksi']) &&
					isset($_POST['group_id']) 
				) {
					$this->permissions->delete_by(
						$_POST['modul'],
						$_POST['aksi'],
						$_POST['group_id']
					);
					$message = '1';
				}
			}
			$this->response($message);
		}else{
			$this->response('not allowed',REST_Controller::HTTP_FORBIDDEN);
		}
	}

	public function activation_user_post($user_id='',$active=0){
		$this->load->library('ion_auth');
		if ($this->ion_auth->is_admin()) {
			$this->db->where('id',$user_id);
			$data['active'] = $active;
			$this->db->update('users',$data);
			$this->response('1');
		}else{
			$this->response('not allowed',REST_Controller::HTTP_FORBIDDEN);
		}
	}
}
