<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Dashboard extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();		
		if (!$this->ion_auth->get_user_id()) {
            redirect('welcome/index','refresh');
        }
        $this->load->helper('bkd');
	}

	public function index(){
		$this->load->model('identitas');
		if (isset($this->current_user['username'])) {
			$data['username'] = $this->current_user['username'];
		}
		
		if ($this->ion_auth->is_admin()) {
			$this->layout->set_template('admin_template');
			$data['identitas']	= $this->identitas->get_all();
		}else{
			$this->layout->set_template('grocery_dosen_template');
			$user_id = $this->session->userdata('user_id');
		$data['identitas']	 = $this->identitas->get_many_by('user_id',$user_id);
		}
		
		//$this->layout->add_breadcrumb_item('Home','dashboard/index')
		$this->layout->set_title('Home - BKD')
            ->render_action_view($data);
	}

	public function profile(){
		$this->load->model('identitas');
		$user_id=$this->session->userdata('user_id');
		$data['profile'] = $this->current_user;
		$data['identitas']=$this->identitas->get_by('user_id',$user_id);
		if ($this->ion_auth->is_admin()) {
			$this->layout->set_template('admin_template');
		}
		else{
			$this->layout->set_template('dashboard_template');
		}
		
		$this->layout->set_title('Profile')
            ->render_action_view($data);	
	}

	public function logout(){
		if ($this->ion_auth->logout()) {
			$this->session->sess_destroy();
			redirect('welcome/index','refresh');
		}
	}

	public function update_profile(){

		
	}
	public function pemberitahuan($user_id=''){
		$data ['notifikasi']= (object) array(
            array(
				'id'=>1,
				'message' =>'hello'
			),
        );
        $this->db->update('dosen',$data);
	}
}