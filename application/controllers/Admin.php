<?php
class Admin extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->is_admin()) {
			redirect('dashboard/index','refresh');
		}
		$this->load->helper('bkd');
	}

	public function index(){
		$this->crud->set_theme('datatables');
		$this->crud->set_table('identitas');
		$this->crud->set_subject('Identitas');
		$this->crud->required_fields('NIDN');
		$this->crud->columns('Nama','Gelar_Depan','Gelar_Belakang','email','No_HP');
		$this->crud->unset_add();
		$this->crud->unset_edit();
		$this->crud->unset_delete();
		$output = (array) $this->crud->render();
		$this->layout
		->set_template('grocery_admin_template')
		->set_title('Identitas')
		->render_action_view($output);
	}
	public function pengajaran(){
		$this->crud->set_theme('datatables');
		$this->crud->set_table('pengajaran');
		$this->crud->set_subject('Pengajaran');
		$this->crud->required_fields('nama_pengajaran');
		$this->crud->columns('nama_pengajaran','semester','th_ajaran','SKS');
		$this->crud->unset_add();
		$this->crud->unset_edit();
		$this->crud->unset_delete();

		$output = (array) $this->crud->render();

		$this->layout
		->set_template('grocery_admin_template')
		->set_title('Pengajaran')
		->render_action_view($output);
	}

	public function pengabdian_masyarakat()
	{
		$this->crud->set_theme('datatables');
		$this->crud->set_table('pengabdian_masyarakat');
		$this->crud->set_subject('Pengabdian');
		$this->crud->required_fields('nama_pengabdian');
		$this->crud->columns('nama_pengabdian','smt','th_ajaran','SKS','masa_penugasan');
		$this->crud->unset_add();
		$this->crud->unset_edit();
		$this->crud->unset_delete();

		$output = (array) $this->crud->render();

		$this->layout
		->set_template('grocery_admin_template')
		->set_title('Pengabdian')
		->render_action_view($output);
	}

	public function penelitian()
	{
		$this->crud->set_theme('datatables');
		$this->crud->set_table('penelitian');
		$this->crud->set_subject('Penelitian');
		$this->crud->required_fields('nama_penelitian');
		$this->crud->columns('kategori','nama_penelitian','smt','th_ajaran','SKS');
		$this->crud->unset_add();
		$this->crud->unset_edit();
		$this->crud->unset_delete();

		$output = (array) $this->crud->render();
		$this->layout
		->set_template('grocery_admin_template')
		->set_title('Penelitian')
		->render_action_view($output);
	}

	public function penunjang()
	{
		$this->crud->set_theme('datatables');
		$this->crud->set_table('penunjang');
		$this->crud->set_subject('Penunjang');
		$this->crud->required_fields('nama_kegiatan');
		$this->crud->columns('nama_kegiatan','smt','th_ajaran','SKS','masa_penugasan');

		$this->crud->unset_add();
		$this->crud->unset_edit();
		$this->crud->unset_delete();

		$output = (array )$this->crud->render();
		$this->layout
		->set_template('grocery_admin_template')
		->set_title('Penunjang')
		->render_action_view($output);

	}

	public function kirim_konfirmasi($user_id='',$id_identitas='')
	{
		$this->load->model('users');
		$dosen = $this->users->get($user_id);
		if (!is_null($dosen) && isset($dosen["email"])) {
			$this->load->library('email');
			$this->load->library('bkdmail');

			$to_email = $dosen["email"];
			if ($this->bkdmail->kirim_konfirmasi_dosen($to_email)) {
				$this->load->model('identitas');
				$data['disetujui'] = 'ya';
				$this->identitas->update($id_identitas,$data);
				$this->layout->set_alert('success','Selamat dosen berhasil disetujui :D');
			}else{
				$this->layout->set_alert('danger','Gagal mengirim email ');
			}
		}
		redirect('dashboard/index','refresh');
		
	}

}

?>