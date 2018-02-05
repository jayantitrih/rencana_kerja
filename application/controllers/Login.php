<?php //define('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')){
			redirect(base_url('admin'));
		}
		$this->load->model(array('Mod_Login'));
	}

	function index(){
		$this->load->view('pages/login');
	}

	function proses(){
		$this->form_validation->set_rules('username','username','reuired|trim|xss_clean');
		$this->form_validation->set_rules('username','password','reuired|trim|xss_clean');
		if($this->form_validation->run() == FALSE){
			$this->load->view('login');
		}else{
			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			$u = $user;
			$p = md5($pass);
			     if ($cek->num_rows() > 0) {
        //login berhasil, buat session
        foreach ($cek->result() as $qad) {
          $sess_data['id_admin'] = $qad->id_pengguna;
          $sess_data['nama_admin'] = $qad->nama_pengguna;
          $sess_data['username'] = $qad->username;
          $sess_data['level'] = $qad->level;
          $this->session->set_userdata($sess_data);
        }
        $this->session->set_flashdata('success', 'Login Berhasil !');
        redirect(base_url('admin'));
      } else {
        $this->session->set_flashdata('result_login', '
Username atau Password yang anda masukkan salah.');
        redirect(base_url('login'));
      }
		}
	}
}
