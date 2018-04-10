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
		$this->load->model(array('meeting_attendances','meetings'));
		$id_user 	  = 1;
		$id_meetings  = array();
		$attendances  = $this->meeting_attendances->get_many_by('id_user',$id_user);
		if ($attendances) {
			foreach ($attendances as $key => $value) {
				$id_meetings[] = $value->id_meeting;
			}
		}
		$this->meetings->_database->where_in('id_meeting',$id_meetings);
		$this->meetings->_database->where('archived','false');
		$this->meetings->_database->order_by('meeting_date','ASC');
		$data['meetings'] = $this->meetings->get_all();
		$this->layout->set_template('dashboard_template')
		->set_title('Daftar rapat')
		->render_action_view($data);
	}

	public function buat_rapat(){
		$this->load->model('meeting_attendances');

		$data = array();
		if (!is_null($this->session->userdata('meeting'))) {
			$meeting 			= (object) $this->session->userdata('meeting');
			$data['meeting'] 	= $meeting;
			$data['partisipan'] = $this->meeting_attendances->get_many_by('id_meeting',$meeting->id_meeting);
		}
		
		$this->layout->set_template('dashboard_template')
		->set_title('Buat Rapat')
		->render_action_view($data);
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
			//if ($this->current_user) {

				//$id_user 	= $this->current_user['id'];
				$id_user 	= 1;//$this->current_user['id'];
				$this->meeting_attendances->_database->where('id_meeting',$id);
				$attend 	= $this->meeting_attendances->get_by('id_user',$id_user);
				if ($attend) {
					$attend_id = $attend->id_attendance;
					$data['attendance_status'] = 'true';
					$this->meeting_attendances->update($attend_id,$data);
					redirect('app_rapat/lihat_notulen/'.$id,'refresh');
				}else{
					$this->layout->set_alert('warning','maaf anda tidak terdaftar :(');
					redirect('app_rapat/index','refresh');
				}
			/*
			}else{
				$this->layout->set_alert('warning','Mohon login terlebih dahulu');
				redirect('welcome/index','refresh');
			}
			*/
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
		
		$id_user 				= 1;

		$data['my_tasks']		= $this->meeting_discussions->get_many_by('discussion_pic',$id_user);
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

	public function submit_buat_rapat(){
		if ($this->form_validation->run('add_meeting')) {
			$this->load->model('meetings');
			$data = $this->input->post(NULL,true);
			if (isset($data['files'])) {
				unset($data['files']);
			}
			if (isset($this->current_user['id'])) {
				$data['created_by'] = $this->current_user['id'];
			}

			if ($id_meeting = $this->meetings->insert($data)) {
				$data['id_meeting'] = $id_meeting;
				$this->session->set_userdata('meeting',$data);
				$msg ='rapat berhasil dibuat :D';
				$this->layout->set_alert('success',$msg);
			}else{
				$msg ='rapat gagal dibuat ';
				$this->layout->set_alert('warning',$msg);
			}
		}else{
			$this->layout->set_alert('warning',validation_errors());
		}
		redirect('app_rapat/buat_rapat','refresh');
	}

	public function submit_update_rapat($id=''){
		if ($this->form_validation->run('update_meeting')) {
			$this->load->model('meetings');
			$data = $this->input->post(NULL,true);
			if (isset($data['files'])) {
				unset($data['files']);
			}

			$meeting = $this->meetings->get($id);
			if ($meeting) {
				if ($this->meetings->update($id,$data)) {
					$data['id_meeting'] = $id;
					$this->session->unset_userdata('meeting');
					$this->session->set_userdata('meeting',$data);
					$msg ='rapat berhasil update :D';
					$this->layout->set_alert('success',$msg);
				}else{
					$msg ='rapat gagal update :( ';
					$this->layout->set_alert('warning',$msg);
				}
			}else{
				$msg ='Rapat tidak terdaftar';
				$this->layout->set_alert('error',$msg);
			}
		}else{
			$this->layout->set_alert('warning',validation_errors());
		}
		redirect('app_rapat/buat_rapat','refresh');
	}

	public function undang_partisipan($id_meeting=''){
		$this->load->model(array('meetings','meeting_attendances'));
		$meeting 	= $this->meetings->get($id_meeting);
		$data 		= $this->input->post(NULL,true);
		if ($meeting && isset($data['id_user'])) {
			$data['id_meeting'] = $id_meeting;
			if (!$this->meeting_attendances->insert($data)) {
				$msg ='partisipan gagal diundang :( ';
				$this->layout->set_alert('warning',$msg);
			}
			redirect('app_rapat/buat_rapat','refresh');
		}else{
			$msg ='Rapat tidak terdaftar';
			$this->layout->set_alert('error',$msg);
			redirect('dashboard/index','refresh');
		}
	}

	public function kirim_rapat(){
		if (!is_null($this->session->userdata('meeting'))) {
			$this->session->unset_userdata('meeting');
			redirect('app_rapat/index','refresh');
		}else{
			$msg ='Buat rapat terlebih dahulu';
			$this->layout->set_alert('warning',$msg);
			redirect('app_rapat/buat_rapat','refresh');
		}
	}

	public function submit_buat_notulen($id_meeting=''){
		$this->load->model(array('meetings','meeting_discussions'));
		$meeting = $this->meetings->get($id_meeting);
		if ($meeting) {
			if ($this->form_validation->run('buat_notulen')) {
				$data = $this->input->post(NULL,true);
				$data['discussion_status']	='open';
				$data['id_meeting'] 		= $id_meeting;
				if (isset($data['self_pic'])) {
					if ($data['self_pic'] > 0) {
						$data['discussion_pic'] = $data['self_pic'];
					}
					unset($data['self_pic']);
				}elseif (isset($data['discussion_pic'])) {
					if (
							$data['discussion_pic'] < 0 ||
							empty($data['discussion_pic'])
						) {
						$msg = 'Penanggung jawab belum dipilih';
						$this->layout->set_alert('warning',$msg);
					}
				}
				if (isset($data['files'])) {
					unset($data['files']);
				}
				if (isset($data['email'])) {
					unset($data['email']);
				}
				if (isset($this->current_user['id'])) {
					$data['created_by'] = $this->current_user['id'];
				}
				if (!$this->meeting_discussions->insert($data)) {
					$msg = 'notulen gagal disimpan :(';
					$this->layout->set_alert('warning',$msg);
				}
			}else{
				$this->layout->set_alert('warning',validation_errors());
			}
			redirect('app_rapat/buat_notulen/'.$id_meeting,'refresh');
		}else{
			$this->layout->set_alert('error','Rapat tidak dikenal :(');
			redirect('dashboard/index','refresh');
		}
	}

}