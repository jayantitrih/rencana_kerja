<?php

/**
* 
*/
class Managed extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('tools','permission'));
		if (!$this->ion_auth->is_admin()) {
			redirect('dashboard/index','refresh');
		}
		$this->lang->load(array('ion_auth_lang','auth_lang'));
	}

	public function index($controller_name='',$group_id='')
	{
		$this->load->model(array('permissions','groups'));

		if (!empty($controller_name)) {
			$site_url 	= site_url($controller_name.'/json_get_methods');
			if (function_exists('get_http_response_code')) {
				if (get_http_response_code($site_url) == '200') {
					$json 			= file_get_contents($site_url);
					$data['actions']= json_decode($json);
				}
			}
			
		}
		$controllers 	= array();
		if (function_exists('get_controllers_names')) {
			$controllers = get_controllers_names();
		}
		$app_controllers = array();
		if ($controllers) {
			foreach ($controllers as $key => $value) {
				
				if (stripos($value, 'app') !== false) {
					
					$app_controllers[] = $value;
				}
				
			}
		}
		
		$data['controller_name'] = $controller_name;
		
		$data['group_id']		 = $group_id;

		$data['actions_selected'] = $this->permissions->get_actions_by_modul_and_group_id($controller_name,$group_id);

		$data['modules'] = $app_controllers;
		$data['groups']	 = $this->groups->get_all();
		
		$this->layout->set_template('admin_template')
			->add_breadcrumb_item('Home',site_url('dashboard/index'))
			->add_breadcrumb_item('Permission',site_url('permission/index'))
            ->set_title('Set Group Permissions')
            ->render_action_view($data);
	}

	public function groups(){
		$this->load->model('groups');
		$data['groups'] = $this->groups->get_all();
		$this->layout->set_template('admin_template')
			->add_breadcrumb_item('Home',site_url('dashboard/index'))
			->add_breadcrumb_item('groups',site_url('managed/groups'))
            ->set_title('Set Group Permissions')
            ->render_action_view($data);
	}


	public function users(){
		$this->load->model('users');
		$data['users'] = $this->users->get_all();
		$this->layout->set_template('admin_template')
			->add_breadcrumb_item('Home',site_url('dashboard/index'))
			->add_breadcrumb_item('Users',site_url('managed/users'))
            ->set_title('List Users')
            ->render_action_view($data);
	}

	public function details_user($id=''){
		$this->load->model(array('users','groups'));
		$data['users'] = $this->users->get($id);
		$data['groups']= $this->groups->get_all();
		$this->layout->set_template('admin_template')
			->add_breadcrumb_item('Home',site_url('dashboard/index'))
			->add_breadcrumb_item('Users',site_url('managed/users'))
			->add_breadcrumb_item($data['users']['email'],site_url('managed/users/'.$id))
            ->set_title('Details User')
            ->render_action_view($data);

	}

	public function remove_user($id=''){
		$this->load->model('users');
		$users = $this->users->get($id);
		if ($users) {
			$this->users->delete($id);
		}
		redirect('managed/users','refresh');
	}

	public function remove_group($id=''){
		$this->load->model('groups');
		$groups = $this->groups->get($id);
		if ($groups) {
			$this->groups->delete($id);
		}
		redirect('managed/groups','refresh');
	}

	public function edit_group($id=''){
		$this->load->model('groups');
		$data['id']		= $id;
		$data['group'] 	= $this->groups->get($id);
		$this->layout->set_template('admin_template')
			->add_breadcrumb_item('Home',site_url('dashboard/index'))
			->add_breadcrumb_item('Groups',site_url('managed/groups'))
			->add_breadcrumb_item($data['group']['name'],site_url('managed/edit_group/'.$id))
            ->set_title('Details Group')
            ->render_action_view($data);
	}

	public function update_group($id=''){
		$this->load->model('groups');
		$this->form_validation->set_rules('name','Name','trim|required');
		if ($this->form_validation->run()) {
			$group 	=  $this->groups->get($id);
			$data 	= $this->input->post(NULL,true);
			if ($group) {
				$this->groups->update($id,$data);
			}
			redirect('managed/groups','refresh');
		}else{
			$this->layout->set_alert('warning',validation_errors());
			redirect('managed/edit_group/'.$id,'refresh');
		}
	}

	public function add_user(){
		$this->load->model('groups');
		$data['groups'] = $this->groups->get_all();
		$this->layout->set_template('admin_template')
			->add_breadcrumb_item('Home',site_url('dashboard/index'))
			->add_breadcrumb_item('Users',site_url('managed/users'))
			->add_breadcrumb_item('Add User',site_url('managed/add_user'))
            ->set_title('Add User')
            ->render_action_view($data);
	}

	public function store_user(){
		$this->load->model('users');
		$data 	= $this->input->post(NULL,true);
		if ($this->form_validation->run('register')) {
			$additional_data = array(
				'first_name' => $data['first_name'],
				'last_name' => $data['last_name'],
				'phone' => $data['phone'],
			);
			
			$new_user_id = $this->ion_auth->register($data['identity'], $data['password'], $data['email'], $additional_data);
			
			
			if ($new_user_id > 0) {
				redirect('managed/details_user/'.$new_user_id,'refresh');
			}else{
				$this->layout->set_alert('danger',$this->ion_auth->errors());
				redirect('managed/add_user/','refresh');
			}
		}else{
			$this->layout->set_alert('warning',validation_errors());
			redirect('managed/add_user/','refresh');	
		}

	}

	public function add_group(){
		$this->layout->set_template('admin_template')
			->add_breadcrumb_item('Home',site_url('dashboard/index'))
			->add_breadcrumb_item('Groups',site_url('managed/groups'))
			->add_breadcrumb_item('Add Group',site_url('managed/add_group'))
            ->set_title('Add Group')
            ->render_action_view();
	}

	public function store_group(){
		$this->load->model('groups');
		$this->form_validation->set_rules('name','Name','trim|required');
		$data 	= $this->input->post(NULL,true);
		if ($this->form_validation->run()) {
			$new_group_id = $this->groups->insert($data);
			if ($new_group_id > 0) {
				redirect('managed/groups/','refresh');
			}else{
				$this->layout->set_alert('error','group not created');
				redirect('managed/add_group','refresh');
			}
		}else{
			$this->layout->set_alert('warning',validation_errors());
			redirect('managed/add_group/','refresh');	
		}
	}

	public function add_group_permission($user_id=''){
		$this->load->model('users');
		$this->form_validation->set_rules('group_id','Group Name','trim|required|is_natural_no_zero');

		if ($this->form_validation->run()) {
			$data['group_id'] 	= $this->input->post('group_id');
			$user = $this->users->get($user_id);
			if ($user) {
				$data['user_id'] = $user_id;
				$this->db->insert('users_groups',$data);
			}else{
				$this->layout->set_alert('warning','user not registered');	
			}
		}else{
			$this->layout->set_alert('warning',validation_errors());
		}
		redirect('managed/details_user/'.$user_id,'refresh');
	}

	public function remove_group_permission($user_id='',$group_id=''){
		$this->db->where('user_id',$user_id);
		$this->db->where('group_id',$group_id);
		if ($this->db->delete('users_groups')) {
			$this->layout->set_alert('success','success to remove group permission');
		}
		redirect('managed/details_user/'.$user_id,'refresh');
	}

	

}