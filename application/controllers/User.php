<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	

	public function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
		$this->load->library('template');
		$this->template->set_layout('layout_grocery');
		$menu = get_class_methods($this); // mengambil semua methods dalam class
		$this->template->set_menu($menu);
	} 

	public function index()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('dosen');
			$crud->set_subject('Dosen');
			$crud->set_relation('NIDN','identitas','NIDN');
			

			$crud->set_relation('id_akademik','akademik','nama_perguruan');
			$crud->display_as('id_akademik','Nama Perguruan');

			$crud->set_relation('id_kepegawaian','kepegawaian','status');
			$crud->display_as('id_kepegawaian','Status');

			$crud->set_relation('id_pendidikan','pendidikan','nama_pelatihan');
			$crud->display_as('id_pendidikan','Pendidikan');

			$crud->set_relation('id_pengajaran','pengajaran','nama_pengajaran');
			$crud->display_as('id_pengajaran','Pengajaran');

			$crud->set_relation('id_penelitian','penelitian','nama_penelitian');
			$crud->display_as('id_penelitian','Judul penelitian');

			$crud->set_relation('id_pengabdian','pengabdian_masyarakat','nama_pengabdian');
			$crud->display_as('id_pengabdian','Pengabdian');

			$crud->set_relation('id_penunjang','penunjang','nama_kegiatan');
			$crud->display_as('id_penunjang','Kegiatan');
					
			$columns 	= array('NIDN','id_pendidikan','id_penelitian','id_pengabdian','id_penunjang');
			$fields 	= array('id_akademik','id_kepegawaian','id_pengajaran');
			$fields 	= array_merge($columns,$fields);

			$crud->fields($fields);
			
			$crud->columns($columns);

			$output = $crud->render();
			$this->template->render($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	} 

	public function identitas($id='')
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('identitas');
			$crud->set_subject('Identitas');
			//$crud->set_relation('NIDN','dosen','NIDN');
			$crud->required_fields('NIDN');
			$crud->columns('Nama','Gelar_Depan','Gelar_Belakang','email','No_HP');

			$output = $crud->render();
			$this->template->render($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function akademik($id='')
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('akademik');
			$crud->set_subject('Akademik');
			//$crud->set_relation('NIDN','dosen','NIDN');
			$crud->required_fields('nama_perguruan');
			$crud->columns('nama_perguruan','jenis_pendidikan_tinggi','jurusan','prodi');

			$output = $crud->render();
			$this->template->render($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function kepegawaian($id='')
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('kepegawaian');
			$crud->set_subject('Kepegawaian');
			//$crud->set_relation('NIDN','dosen','NIDN');
			$crud->required_fields('status');
			$crud->columns('kementrian_induk','status','jabatan_akademikterakhir','tmt_jabatan');

			$output = $crud->render();
			$this->template->render($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function pengabdian_masyarakat($id='')
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('pengabdian_masyarakat');
			$crud->set_subject('Pengabdian');
			//$crud->set_relation('NIDN','dosen','NIDN');
			$crud->required_fields('nama_pengabdian');
			//$crud->columns('nama_pengabdian','smt','th_ajaran','SKS','masa_penugasan');

			//upload bukti_penugasan
			$crud->set_field_upload('bukti_penugasan','assets/uploads/files');

			$output = $crud->render();
			$this->template->render($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function penunjang($id='')
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('penunjang');
			$crud->set_subject('Penunjang');
			//$crud->set_relation('NIDN','dosen','NIDN');
			$crud->required_fields('nama_kegiatan');
			$crud->columns('nama_kegiatan','smt','th_ajaran','SKS','masa_penugasan');

			$crud->set_field_upload('bukti_penugasan','assets/uploads/files');

			$output = $crud->render();
			$this->template->render($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function penelitian($id='')
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('penelitian');
			$crud->set_subject('Penelitian');
			//$crud->set_relation('NIDN','dosen','NIDN');
			$crud->required_fields('nama_penelitian');
			$crud->columns('kategori','nama_penelitian','smt','th_ajaran','laman_publikasi');

			$crud->set_field_upload('bukti_penugasan','assets/uploads/files');

			$output = $crud->render();
			$this->template->render($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function pendidikan($id='')
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('pendidikan');
			$crud->set_subject('Pendidikan');
			//$crud->set_relation('NIDN','dosen','NIDN');
			$crud->required_fields('nama_pelatihan');
			$crud->columns('nama_pelatihan','smt','th_ajaran','SKS','tempat');

			$crud->set_field_upload('bukti_penugasan','assets/uploads/files');

			$output = $crud->render();
			$this->template->render($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function pengajaran($id='')
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('pengajaran');
			$crud->set_subject('Pengajaran');
			//$crud->set_relation('NIDN','dosen','NIDN');
			$crud->required_fields('nama_pengajaran');
			$crud->columns('nama_pengajaran','smt','th_ajaran','SKS','jml_mhs');

			$crud->set_field_upload('bukti_penugasan','assets/uploads/files');
			
			$output = $crud->render();
			$this->template->render($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
       
}

