<?php

/**
* 
*/
class MY_Controller extends CI_Controller
{
	public $current_user = array();
	function __construct()
	{
		parent::__construct();
		$this->do_migration();
		$this->load->library('ion_auth');
		
		$meta['charset']     = 'utf-8';
        $meta['csrf-token']  = bin2hex(random_bytes(32));
        $meta['viewport']    = 'width=device-width, initial-scale=1';
        $this->layout->set_metadata_array($meta);
        $this->set_current_user();
        $this->load->helper('tools');
        //$this->verify_permission();
        
    }

    protected function set_current_user(){
        if ($this->ion_auth->get_user_id()) {
            $this->load->model('users');
            $user_id = $this->ion_auth->get_user_id();
            $this->current_user = $this->users->get($user_id);
        }
    }

    public function verify_permission(){
        $this->load->model('permissions');
        $controller 	= $this->router->fetch_class();
        $method 		= $this->router->fetch_method();
        $user_id 		= $this->ion_auth->get_user_id();
        if (!is_null($user_id)) {
            $groups = $this->ion_auth->get_users_groups($user_id)->result_array();
            if ($groups) {
                $group_ids = array();
                foreach ($groups as $value) {
                    $group_ids[] = $value['id'];
                }
            }
            $allow 		= $this->permissions->get_by_multi_groups($group_ids);            

            $allow_methods      = array();
            $allow_controllers  = array('dashboard','api');
            if ($allow) {
                foreach ($allow as $key => $value) {
                    $allow_controllers[] = $value['modul'];
                    $allow_methods[] 	 = $value['aksi'];
                }	
            }

            if ($this->ion_auth->is_admin()) {
                array_push($allow_controllers, 'managed');
            }

            if (
                !in_array($controller, $allow_controllers) && 
                !in_array($method, $allow_methods)
            ) {
                $this->layout->set_alert('warning',"The page could not be found or you don't have permission to view it");
                redirect('dashboard/index','refresh');
            }

        }else{

            if (!in_array($controller, array('welcome'))) {
                $this->layout->set_alert('warning',"Please login first");

                //redirect('welcome/index','refresh');
            }
        }    
    }

    public function json_get_methods()
    {
        $this->load->config('config_permission');
        $methods 	= get_class_methods($this);
        $prefix 	= $this->config->item('prefix_method');
        $json 		= array(); 
        if ($prefix && $methods) {
            foreach ($methods as $key => $value) {
                foreach ($prefix as $index => $word) {
                    if (strpos($value, $word) !== false) {
                        $json[] = $value; 
                    }
                }
            }
        }
        echo json_encode($json);
    }


    public function do_migration($version = NULL){
        $this->load->library('migration');
        if(isset($version) && ($this->migration->version($version) === FALSE)){
            $this->session->set_flashdata('message',$this->migration->error_string());
        }elseif(is_null($version) && $this->migration->latest() === FALSE){
            $this->session->set_flashdata('message',$this->migration->error_string());
        }
    }
}