<?php

/**
* 
*/
class App_rapat extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('meetings');
		$this->meetings->_database->order_by('meeting_date','ASC');
		$this->meetings->_database->where('archived','false');
		$data['meetings'] 	= $this->meetings->get_all();
		if (isset($this->current_user['id'])) {
			$data['user_id'] = $this->current_user['id'];
		}
		else{
			$data['user_id'] = 1;
		}

		$this->layout->set_template('dashboard_template')
		->set_title('Daftar rapat')
		->render_action_view($data);
	}

	public function buat_rapat(){
		$this->layout->set_template('dashboard_template')
		->set_title('Buat Rapat')
		->render_action_view();
	}

	public function buat_notulen($id=''){
		$this->load->model(array(
			'meetings'
			,'meeting_discussions'
			,'meeting_attendances'
		));

		$this->meetings->_database->where('archived','false');
		$data['meeting'] 		= $this->meetings->get($id);
		$meeting['discussions'] = $this->meeting_discussions->get_many_by('id_meeting',$id);
		$data['tabel_notulen']	= $this->load->view('controllers/app_rapat/tabel_notulen',$meeting,true);
		$this->meeting_attendances->_database->where('id_meeting',$id);
		$data['partisipant'] = $this->meeting_attendances->get_by('attendance_status','true');
		$this->layout->set_template('dashboard_template')
		->set_title('Notulen rapat')
		->render_action_view($data);

	}

	public function terarsip(){
		$this->load->model('meetings');
		$this->meetings->_database->order_by('meeting_date','ASC');
		$this->meetings->_database->where('archived','true');
		$data['meetings'] 	= $this->meetings->get_all();
		if (isset($this->current_user['id'])) {
			$data['user_id'] = $this->current_user['id'];
		}
		$this->layout->set_template('dashboard_template')
		->set_title('Daftar rapat')
		->render_action_view($data);
	}

	public function join_rapat($id=''){
		$this->load->model(array('meeting_attendances','meetings'));
		$meeting = $this->meetings->get($id);
		if ($meeting) {
			if ($this->current_user) {
				$id_user = $this->current_user['id'];
				$attend =$this->meeting_attendances->get_by('id_user',$id_user);
				if ($attend) {
					$attend_id = $attend->id_attendance;
					$data['attendance_status'] = 'true';
					$this->meeting_attendances->update($attend_id,$data);
					$this->lihat_notulen($id);
				}else{
					$this->layout->set_alert('warning','maaf anda tidak terdaftar :(');
					redirect('app_rapat/index','refresh');
				}
			}else{
				$this->layout->set_alert('warning','Mohon login terlebih dahulu');
				redirect('welcome/index','refresh');
			}
		}else{
			$this->layout->set_alert('error','Rapat tidak dikenal :(');
			redirect('dashboard/index','refresh');
		}
	}

	public function lihat_notulen($id){
		$this->load->model(array(
			'meetings'
			,'meeting_discussions'
		));

		$this->meetings->_database->where('archived','false');
		$data['meeting'] 		= $this->meetings->get($id);
		$meeting['discussions'] = $this->meeting_discussions->get_many_by('id_meeting',$id);
		$data['tabel_notulen']	= $this->load->view('controllers/app_rapat/tabel_notulen',$meeting,true);
		$this->layout->set_template('dashboard_template')
		->set_title('Notulen rapat')
		->render_action_view($data);
	}

	public function details_rapat($id=''){
		$this->load->model('meetings');
		$data['meeting'] = $this->meetings->get($id);
		$this->layout->set_template('dashboard_template')
		->set_title('Notulen rapat')
		->render_action_view($data);
	}


	public function checklist_tugas($id_discussion=''){
		$this->load->model('meeting_discussions');
		$discussions = $this->meeting_discussions->get($id_discussion);
		if ($discussions) {
			$id_meeting ='';
			if (isset($discussions->id_meeting)) {
				$id_meeting = $discussions->id_meeting;
			}
			if ($this->form_validation->run('checklist_tugas')) {
				$data = $this->input->post(NULL,true);
				$this->meeting_discussions->update($id_discussion,$data);
				$success_msg = 'Terima kasih :D mohon tunggu konfirmasi dari pelaksana rapat';
				$this->layout->set_alert('success',$success_msg);
				redirect('app_rapat/lihat_notulen/'.$id_meeting,'refresh');
			}else{
				$this->layout->set_alert('warning',validation_errors());
				redirect('app_rapat/index','refresh');
			}
		}else{
			$this->layout->set_alert('error','tugas tidak sesuai :(');
			redirect('app_rapat/index','refresh');
		}
	}

	public function edit_rapat($id=''){
		$this->load->model('meetings');
		$data['meeting'] = $this->meetings->get($id);
		$this->layout->set_template('dashboard_template')
		->set_title('Notulen rapat')
		->render_action_view($data);
	}

	public function tutup_rapat($id=''){
		$this->load->model('meetings');
		$meeting = $this->meetings->get($id);
		if ($meeting) {
			$data['archived'] = 'true';
			$this->meetings->update($id,$data);
			$this->layout->set_alert('success','rapat berhasil ditutup :D');
			redirect('app_rapat/index','refresh');
		}else{
			$this->layout->set_alert('error','rapat tidak ditemukan');
			redirect('app_rapat/index','refresh');
		}
	}

	public function buka_rapat($id=''){
		$this->load->model('meetings');
		$meeting = $this->meetings->get($id);
		if ($meeting) {
			$data['archived'] = 'false';
			$this->meetings->update($id,$data);
			$this->layout->set_alert('success','rapat berhasil ditutup :D');
			redirect('app_rapat/index','refresh');
		}else{
			$this->layout->set_alert('error','rapat tidak ditemukan');
			redirect('app_rapat/index','refresh');
		}
	}

}