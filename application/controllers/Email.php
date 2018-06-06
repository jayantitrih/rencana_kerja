<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Email extends MY_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->lang->load('auth');
        $user_id = $this->ion_auth->get_user_id();
        if ($user_id) {
            redirect('email/pesan');
        }
    }

    

    public function send_email()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules("fullName","Full Name", "required|alpha|xss_clean");
        $this->form_validation->set_rules("email","Email Address","required|valid_email|xss_clean");
        $this->form_validation->set_rules("message","Message","required|xss_clean");

        if ($this->form_validation->run()==FALSE) {
            $data ["message"]= "";

        }else{
            $data["message"]="Email berhasil dikirim";

            $this->load->library('email');
            $this->email->from(set_value('email'), set_value('fullName'));
            $this->email->to('jayantith29@gmail.com');

            $this->email->subject('Sending Email Test');
            $this->email->message(set_value('message'));

            $this->email->send();

            echo $this->email->print_debugger();


        }
    }
}
    
