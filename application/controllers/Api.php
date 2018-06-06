<?php
/**
* 
*/
require APPPATH.'libraries/REST_Controller.php';

class Api extends REST_Controller
{
	
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
					$this->db->where('group_id',$_POST['group_id']);
					$this->db->where('modul',$_POST['modul']);
					$this->db->where('aksi',$_POST['aksi']);
					$exist = $this->db->get('permissions')->row();
					if (!$exist) {
						$inserted_id  = $this->permissions->insert($_POST);
						$message = $inserted_id;
					}else{
						$message = 'already exist';
					}
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

	public function get_by_keyword_get($model='users',$field='email'){
		$data = array();
		if (isset($_GET['term'])) {
			$this->load->model($model);
			
			//customize
			if ($model == 'users') {
				$where_not_in = array();
				if ($meeting = $this->session->userdata('meeting')) {
					array_push($where_not_in, $meeting['chairman'],$meeting['secretary']);
				}
				if ($where_not_in) {
					$this->$model->_database->where_not_in('id',$where_not_in);
				}
			}

			$result = $this->$model->get_by_like(
				array($field),
				$_GET['term']
			);

			$primary_key = $this->$model->get_primary_key();

			if ($result) {
				foreach ($result as $key => $value) {
					if (isset($value[$field])) {
						$data[] = array(
							'key' 	=> $value[$primary_key],
							'value' => $value[$field]
						);
					}
				}
			}
		}
		$this->response($data);
	}


}
