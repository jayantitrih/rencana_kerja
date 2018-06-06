<?php

/**
* 
*/
class Dosen extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('bkd');
	}

	public function daftar_identitas()
	{
			$this->crud->set_theme('datatables');
			$this->crud->set_table('identitas');
			$this->crud->set_subject('Identitas');
			$user_id = $this->session->userdata('user_id');
			$identitas = $this->db->get_where('identitas',array('user_id'=>$user_id))->row();
			if ($identitas) {
				$this->crud->where('id_identitas',$identitas->id_identitas);
			}
			$this->crud->required_fields('NIDN');
			$this->crud->columns('Nama','Gelar_Depan','Gelar_Belakang','email','No_HP');

			$output = (array) $this->crud->render();
			$this->layout
		->set_template('grocery_dosen_template')
		->set_title('Daftar Identitas')
		->render_action_view($output);
	}

	public function daftar_akademik()
	{
		$this->crud->set_theme('datatables');
		$this->crud->set_table('akademik');
		$this->crud->set_subject('Akademik');
		$user_id = $this->session->userdata('user_id');
		$identitas = $this->db->get_where('identitas',array('user_id'=>$user_id))->row();
		if ($identitas) {
			$this->crud->where('id_identitas',$identitas->id_identitas);
		}
		$this->crud->required_fields('nama_perguruan');
		$this->crud->columns('nama_perguruan','jenis_pendidikan_tinggi','jurusan','prodi');

		$output = (array) $this->crud->render();
		$this->layout
		->set_template('grocery_dosen_template')
		->set_title('Daftar Akademik')
		->render_action_view($output);
	}

	public function daftar_kepegawaian(){
		$this->crud->set_theme('datatables');
		$this->crud->set_table('kepegawaian');
		$this->crud->set_subject('Kepegawaian');
		$user_id = $this->session->userdata('user_id');
		$identitas = $this->db->get_where('identitas',array('user_id'=>$user_id))->row();
		if ($identitas) {
			$this->crud->where('id_identitas',$identitas->id_identitas);
		}
		$this->crud->required_fields('status');
		$this->crud->columns('kementrian_induk','status','jabatan_akademikterakhir','tmt_jabatan');

		$output = (array) $this->crud->render();
			$this->layout
		->set_template('grocery_dosen_template')
		->set_title('Daftar Kepegawaian')
		->render_action_view($output);
	}

	public function daftar_pengajaran(){

		$this->crud->set_theme('datatables');
		$this->crud->set_table('pengajaran');
		$this->crud->set_subject('Pengajaran');
		$user_id 	= 1;//$this->session->userdata('user_id');
		$identitas 	= $this->db->get_where('identitas',array('user_id'=>$user_id))->row();
		if ($identitas) {
			$this->crud->where('id_identitas',$identitas->id_identitas);
		}

		$this->crud->required_fields('kategori');
		$this->crud->columns('nama_pengajaran','smt','th_ajaran','SKS','jml_mhs');

		$this->crud->set_field_upload('bukti_penugasan','uploads');		
		
		$output = (array) $this->crud->render();

		$this->layout
		->set_template('grocery_dosen_template')
		->set_title('Daftar Pengajaran')
		->render_action_view($output);
	}

	public function daftar_pengabdian_masyarakat(){

		$this->crud->set_theme('datatables');
		$this->crud->set_table('pengabdian_masyarakat');
		$this->crud->set_subject('Pengabdian');
		$user_id = $this->session->userdata('user_id');
		$identitas = $this->db->get_where('identitas',array('user_id'=>$user_id))->row();
		if ($identitas) {
			$this->crud->where('id_identitas',$identitas->id_identitas);
		}
			//$this->crud->set_relation('NIDN','dosen','NIDN');
		$this->crud->required_fields('nama_pengabdian');
		$this->crud->columns('nama_pengabdian','smt','th_ajaran','SKS','masa_penugasan');

			//upload bukti_penugasan
		$this->crud->set_field_upload('bukti_penugasan','uploads/');

		$output = (array) $this->crud->render();

		$this->layout
		->set_template('grocery_dosen_template')
		->set_title('Daftar Pengabdian')
		->render_action_view($output);
	}

	public function daftar_penelitian(){
		
		$this->crud->set_theme('datatables');
		$this->crud->set_table('penelitian');
		$this->crud->set_subject('Penelitian');
		$user_id = $this->session->userdata('user_id');
		$identitas = $this->db->get_where('identitas',array('user_id'=>$user_id))->row();
		if ($identitas) {
			$this->crud->where('id_identitas',$identitas->id_identitas);
		}
			//$this->crud->set_relation('NIDN','dosen','NIDN');
		$this->crud->required_fields('kategori');
		$this->crud->columns('kategori','nama_penelitian','smt','th_ajaran','laman_publikasi');

		$this->crud->set_field_upload('bukti_penugasan','uploads/');

		$output = (array) $this->crud->render();
		$this->layout
		->set_template('grocery_dosen_template')
		->set_title('Daftar Penelitian')
		->render_action_view($output);
	}

	public function daftar_penunjang(){
		$this->crud->set_theme('datatables');
		$this->crud->set_table('penunjang');
		$this->crud->set_subject('Penunjang');
		$user_id = $this->session->userdata('user_id');
		$identitas = $this->db->get_where('identitas',array('user_id'=>$user_id))->row();
		if ($identitas) {
			$this->crud->where('id_identitas',$identitas->id_identitas);
		}
			//$this->crud->set_relation('NIDN','dosen','NIDN');
		$this->crud->required_fields('nama_kegiatan');
		$this->crud->columns('nama_kegiatan','smt','th_ajaran','SKS','masa_penugasan');

		$this->crud->set_field_upload('bukti_penugasan','uploads/');

		$output = (array )$this->crud->render();
		$this->layout
		->set_template('grocery_dosen_template')
		->set_title('Daftar Penunjang')
		->render_action_view($output);
	}
	

}