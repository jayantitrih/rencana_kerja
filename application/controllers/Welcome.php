<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->lang->load('auth');
        $user_id = $this->ion_auth->get_user_id();
        if ($user_id) {
            redirect('dashboard/index','refresh');
        }
    }

    public function index() {
        $this->layout->set_template('ittp_landing_template')
        ->set_title('Welcome to Codeigniter !')
        ->set_metadata('description', 'simple framework php with MVC pattern')
        ->set_http_equiv('refresh', 30)
        ->add_basic_assets()
        ->render_action_view();
    }

    public function login() {
        $data['identity'] = array('name' => 'identity',
            'id'    => 'identity',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('identity'),
            'class' =>'form-control login-6',
            'placeholder'=>'Email'
        );
        $data['password'] = array(
            'name' => 'password',
            'id'   => 'password',
            'type' => 'password',
            'class'=>'form-control login-6',
            'placeholder'=>'Password'
            //'placeholder' => lang('login_password_label', 'password')
        );
        $title = $this->lang->line('login_heading');
        $this->layout->set_template('login_template')
        ->set_title($title)
            //->set_http_equiv('refresh', 30)
        ->add_basic_assets()
        ->render_action_view($data);
    }

    public function verify_login(){
        if ($data = $this->input->post(NULL,true)) {
            if ($this->form_validation->run('login')) {
                $remember = (bool) $this->input->post('remember');
                if ($this->ion_auth->login($data['identity'], $data['password'], $remember))
                {
                    //if the login is successful
                    redirect('dashboard','refresh');
                }else{
                    $this->layout->set_alert('error',$this->ion_auth->errors());
                }
            }else{
                $this->layout->set_alert('warning',validation_errors());
            }
        }
        redirect('welcome/login','refresh');
    }

    public function register(){
        $data['first_name'] = array(
            'name'  => 'first_name',
            'id'    => 'first_name',
            'type'  => 'text',
            'class'  => 'form-control',
            'value' => $this->form_validation->set_value('first_name'),
        );
        $data['last_name'] = array(
            'name'  => 'last_name',
            'id'    => 'last_name',
            'type'  => 'text',
            'class'  => 'form-control',
            'value' => $this->form_validation->set_value('last_name'),
        );
        $data['identity'] = array(
            'name'  => 'identity',
            'id'    => 'identity',
            'type'  => 'text',
            'class'  => 'form-control',
            'value' => $this->form_validation->set_value('identity'),
        );
        $data['email'] = array(
            'name'  => 'email',
            'id'    => 'email',
            'type'  => 'email',
            'class'  => 'form-control',
            'value' => $this->form_validation->set_value('email'),
        );
        $data['phone'] = array(
            'name'  => 'phone',
            'id'    => 'phone',
            'type'  => 'number',
            'class'  => 'form-control',
            'maxlength' =>12,
            'value' => $this->form_validation->set_value('phone'),
        );
        $data['password'] = array(
            'name'  => 'password',
            'id'    => 'password',
            'type'  => 'password',
            'class'  => 'form-control',
            'value' => $this->form_validation->set_value('password'),
        );
        $data['password_confirm'] = array(
            'name'  => 'password_confirm',
            'id'    => 'password_confirm',
            'type'  => 'password',
            'class'  => 'form-control',
            'value' => $this->form_validation->set_value('password_confirm'),
        );
        $this->layout->set_template('login_template')
        ->set_title('Register new member')
        //->set_http_equiv('refresh', 30)
        ->add_basic_assets()
        ->render_action_view($data);
    }

    public function submit_register(){
        //$identity_column    = $this->config->item('identity','ion_auth');
        if ($data = $this->input->post(NULL,true)) {
            if ($this->form_validation->run('register')) {
                $email = strtolower($this->input->post('email'));
                
                $identity = $data['identity'];
                $password = $this->input->post('password');

                $additional_data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'company' => $this->input->post('company'),
                    'phone' => $this->input->post('phone'),
                );
                $register = $this->ion_auth->register($identity, $password, $email, $additional_data);
                if ($register > 0) {
                    if ($this->ion_auth->login($data['email'], $password, false)){
                        redirect('dashboard/index','refresh');
                    }else{
                        $this->layout->set_alert('error','login failed');
                    }
                }else{
                    $this->layout->set_alert('error','register failed');
                }
            }else{
                $this->layout->set_alert('warning',validation_errors());
            }
        }else{
            $this->layout->set_alert('warning','data is empty');
        }
        redirect('welcome/register','refresh');
    }

    public function forgot_password(){
        $data['type']      = $this->config->item('identity','ion_auth');
        $data['identity']  = array(
            'name' => 'identity',
            'class' =>'form-control login-6',
            'placeholder'=>'Email'
        );
        if ( $this->config->item('identity', 'ion_auth') != 'email' ){
            $data['identity_label'] = $this->lang->line('forgot_password_identity_label');
        }else{
            $data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
        }
        $this->layout->set_template('login_template')
        ->set_title('Forgot password')
        ->add_basic_assets()
        ->render_action_view($data);
    }


    public function submit_forgot_password(){
        
        $identity_column    = $this->config->item('identity','ion_auth');
        $post_identity      = $this->input->post('identity');
        $identity           = $this->ion_auth->where($identity_column, $post_identity)->users()->row();
        $config_identity    = $this->config->item('identity', 'ion_auth');

        if(empty($identity)) {
            if($config_identity != 'email'){
                $this->ion_auth->set_error('forgot_password_identity_not_found');
            }else{
                $this->ion_auth->set_error('forgot_password_email_not_found');
            }
            $this->layout->set_alert('error',$this->ion_auth->errors());
            redirect("welcome/forgot_password", 'refresh');
        }
        // run the forgotten password method to email an activation code to the user
        $forgotten = $this->ion_auth->forgotten_password($identity->{$config_identity});

        if ($forgotten){
            // if there were no errors
            $this->layout->set_alert('success',$this->ion_auth->messages());
            //send random password email
            //$change   = $this->ion_auth->reset_password($identity, $this->input->post('new'));
            redirect("welcome/login", 'refresh'); //we should display a confirmation page here instead of the login page
        }else{
            $this->layout->set_alert('warning',$this->ion_auth->errors());

            redirect("welcome/forgot_password", 'refresh');
        }
    }


}