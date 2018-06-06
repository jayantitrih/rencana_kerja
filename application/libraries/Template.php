<?php

/**
* 
*/
class Template 
{
	protected $layout;
	protected $content;
	protected $ci;	
	protected $menu;

	function __construct()
	{
		$this->ci =&get_instance();
	}

	public function set_layout($view=''){
		$this->layout = $view;
		return $this;
	}

	public function set_content($content='',$data=array())
	{
		

		$data['me'] 	= $this->ci->router->fetch_class();
		$view_path 		= APPPATH.'views/'.$content.'.php';
		//if (!is_null($this->ci->logged_in)) {
		//	$data['my']	= $this->ci->logged_in;
		//}
		$this->content 	= $content;
		if (file_exists($view_path)) {
			$this->content = $this->ci->load->view($content,$data,true);
		}
		return $this;
	}
	public function render($custom=array())
	{
		
		$data['content'] 	= $this->content;
		if (is_object($custom)) {
			$custom = (array)$custom;
		}

		if ($custom) {
			$data 			= array_merge($custom);
		}
		$data['me'] 		= $this->ci->router->fetch_class();
		if ($this->menu) {
			//ini menunya, biar bisa kamu ganti aku buat config baru ya namanya config/rencana_kerja.php
			
			$data['menu']	= $this->menu; //ambil dari properti menu yang sudah diset melalui method set_menu($menu)
		}
		
		$data['alert']		= $this->ci->session->flashdata('alert'); 
		//$data['navigasi']	= get_menu_by_current_user();
		$data['default_c']	= $this->ci->router->default_controller;
		$data['current_menu'] = $this->ci->router->fetch_method();//untuk mengambil method yang sedang diakses oleh user
		if ($custom) {
			$data = array_merge($data,$custom);
		}

		//yah udah banyak banget kodingnya.
		//karena udah banyak langsung taruh saja dipaling bawah
		//yang penting varibel yang dikirim view itu sama. Apa? yaitu $data
		// yaps tinggal tambah kan saja dibawah ini
		// kita buat kunci array sesuai kebutuhan ya? karena kita butuh username
		// jadi kita namakan username
		//  cus!!!
		//ingat load modelnya dulu
		//// $this->ci-> == hanya menyesuiakan didalam library kalau udah 
		///di controller langsung $this-> saja
		
		$this->ci->load->model('users');//nah sepele tapi penting, kita belum menambahkan load

		$data_primary_key 	= $this->ci->session->userdata('user_id'); //nah kalau kita ga ngikut library langsung pake $this-> jadi error. jadi kita tambahkan $this->ci
		//tapi inget ya!! cuma dilibrary!!
		// ini default dari ion_auth
		$current_user 		= $this->ci->users->get($data_primary_key); //current == saat ini
		$data['username'] 	= $current_user['username'];
		$data['jumlah_notif']=$this->ci->db->get_where('message',array('read_status'=>'0'))->num_rows();
		if (!is_null($this->layout) || !empty($this->layout)) {
			$this->ci->load->view($this->layout,$data);
		}else{
			echo 'set layout terlebih dahulu';
		}
		
	}
	
	public function set_alert($status='',$pesan='')
	{
		
		$data['alert']	= (is_array($pesan))? implode(' ', $pesan) : $pesan;
		$pesan 			= trim($pesan);
		if (!empty($pesan)) {
			$alert 		='<div class="alert alert-'.$status.' alert-dismissible" role="alert">';
			$alert 		.='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
			$alert 		.='<span aria-hidden="true">&times;</span></button>';
			$alert 		.=$pesan;
			$alert 		.='</div>';
			$this->ci->session->set_flashdata('alert',$alert);
  		}
		return $this;
	}

	public function set_menu($menu=array()){
		//pindah sini aja biar dirender ga kebanyakan coding
		$data = array();
		if ($menu) {
			$this->ci->load->config('rencana_kerja');
			$config = $this->ci->config->item('menu');
			
				foreach ($menu as $key => $value) {
					if (!in_array($value, $config['kecuali'])) {
						$data[] = $value;
					}
				}
		}
		$this->menu = $data;
		return $this;
	}

}