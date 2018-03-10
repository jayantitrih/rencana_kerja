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
	}

	public function index(){
		$this->load->config('config_permission');
		$this->load->model('permissions');
		$icons = $this->config->item('icon');
		$permissions 	= $this->permissions->get_many_by('group_id',2);
		$launcher 		= array();
		if ($permissions) {
			foreach ($permissions as $key => $value) {
				if (isset($value['aksi']) && isset($value['modul'])) {
					if (strpos($value['aksi'], 'index_') !== false) {
						$icon = 'fa-info';
						if (isset($icons[$value['aksi']]) && !empty($icons[$value['aksi']])) {
							$icon = $icons[$value['aksi']];
						}
						$launcher[] = array(
							'label' => set_module_name($value['aksi'],5) ,
							'icon' => 'fa '.$icon,
							'url' => site_url($value['modul'].'/'.$value['aksi'])
						);
						
					}
				}
			}
		}
		$data['launcher'] = $launcher;
		
		$data['username'] = $this->current_user['username'];
		if ($this->ion_auth->is_admin()) {
			$this->layout->set_template('admin_template');
		}else{
			$this->layout->set_template('dashboard_template');
		}

		$this->layout->add_breadcrumb_item('Home','index')
            ->set_title('Set permissions')
            ->render_action_view($data);
	}

	public function profile(){
		
	}

	public function logout(){
		if ($this->ion_auth->logout()) {
			$this->session->sess_destroy();
			redirect('welcome/index','refresh');
		}
	}
}