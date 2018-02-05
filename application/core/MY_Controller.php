<?php
/**
* 
*/
class MY_Controller extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('ion_auth', 'form_validation'));
		$this->do_migration();
	} 

	public function do_migration($version = NULL)
	{
		$this->load->library('migration');
    	if(isset($version) && ($this->migration->version($version) === FALSE)){
      		$this->session->set_flashdata('message',$this->migration->error_string());
      	}elseif(is_null($version) && $this->migration->latest() === FALSE){
      		$this->session->set_flashdata('message',$this->migration->error_string());
    	}
	}
	/**
	 * Log the user out
	 */
	public function logout()
	{
		$this->data['title'] = "Logout";

		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('auth/login', 'refresh');
	}
}