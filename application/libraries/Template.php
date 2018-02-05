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
			$data['menu']	= $this->menu; //ambil dari properti menu yang sudah diset melalui method set_menu($menu)
		}
		
		$data['alert']		= $this->ci->session->flashdata('alert'); 
		//$data['navigasi']	= get_menu_by_current_user();
		$data['default_c']	= $this->ci->router->default_controller;

		if ($custom) {
			$data = array_merge($data,$custom);
		}

		//if (!is_null($this->ci->logged_in)) {
		//	$data 			= array_merge($data,$this->ci->logged_in);
		//	$data['my']		= $this->ci->logged_in;
		//}

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
		$this->menu = $menu;
		return $this;
	}

}