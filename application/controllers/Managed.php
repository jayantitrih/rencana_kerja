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
            ->set_title('Set permissions')
            ->render_action_view($data);
	}

	public function groups(){
		$this->load->model('groups');
		$data['groups'] = $this->users->get_all();
		$this->layout->set_template('admin_template')
			->add_breadcrumb_item('Home',site_url('dashboard/index'))
			->add_breadcrumb_item('groups',site_url('managed/groups'))
            ->set_title('Set permissions')
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
		$this->load->model('users');
		$data['users'] = $this->users->get($id);
		$this->layout->set_template('admin_template')
			->add_breadcrumb_item('Home',site_url('dashboard/index'))
			->add_breadcrumb_item('Users',site_url('managed/users'))
			->add_breadcrumb_item($data['users']['email'],site_url('managed/users/'.$id))
            ->set_title('Details User')
            ->render_action_view($data);

	}

}