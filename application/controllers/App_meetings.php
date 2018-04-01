<?php

/**
* 
*/
class App_meetings extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index_meetings(){
		$this->load->model('meetings');
		$this->meetings->_database->order_by('meeting_date','ASC');
		$data['meetings'] = $this->meetings->get_all();
		$this->layout->set_template('dashboard_template')
            ->set_title('Daftar pertemuan')
            ->render_action_view($data);
	}
	public function index_my_tasks(){

	}
	public function index_events(){
		$this->load->model('meetings');
		$data['meetings'] = $this->meetings->get_all();
		$this->layout->set_template('dashboard_template')
            ->set_title('Daftar Acara')
            ->render_action_view($data);
	}

	public function index_users(){

	}

	public function add_meeting(){
		$this->layout->set_template('dashboard_template')
            ->set_title('Buat pertemuan')
            ->render_action_view();
	}

	public function submit_add_meeting(){
		if ($this->form_validation->run('add_meeting')) {
			$data = $this->input->post(NULL,true);
			$this->load->model('meetings');
			
			if ($this->current_user) {
				$data['created_by'] = $this->current_user['id'];
			}
			if (isset($data['files'])) {
				unset($data['files']);
			}
			if ($id_meeting = $this->meetings->insert($data)) {
				$data['id_meeting'] = $id_meeting;
				$this->session->set_userdata('meeting',$data);
				redirect('app_meetings/add_partisipant/','refresh');
			}else{
				$this->layout->set_alert('error','gagal menyimpan meeting :(');
				redirect('app_meetings/add_meeting','refresh');
			}
		}else{
			$this->layout->set_alert('warning',validation_errors());
			redirect('app_meetings/add_meeting','refresh');
		}
	}

	public function add_partisipant(){
		if ($this->session->userdata('meeting')) {
			$this->load->model('meeting_attendances');

			$meeting = $this->session->userdata('meeting');
			$data['meeting'] = $meeting;
			$data['partisipant'] = $this->meeting_attendances->get_all();
			$this->layout->set_template('dashboard_template')
            	->set_title('Tambah Partisipant')
            	->render_action_view($data);
		}else{
			$this->layout->set_alert('warning','Buat meeting terlebih dahulu');
			redirect('dashboard/index','refresh');
		}
	}

	public function submit_add_partisipant(){
			
		if ($this->form_validation->run('add_partisipant')) {
			$data = $this->input->post(NULL,true);
			$this->load->model('meeting_attendances');
			$data = $this->input->post(NULL,true);
			if (! $this->meeting_attendances->insert($data)) {
				$this->layout->set_alert('danger','gagal mengundang partisipan');
			}
		}else{
			$this->layout->set_alert('warning',validation_errors());
		}
		redirect('app_meetings/add_partisipant','refresh');
	}

	public function add_task(){
		if ($this->session->userdata('meeting')) {
			$meeting = $this->session->userdata('meeting');
			$data['meeting'] = $meeting;
			$this->layout->set_template('dashboard_template')
            	->set_title('Tambah Agenda & Pembahasan')
            	->render_action_view($data);
		}else{
			$this->layout->set_alert('warning','Buat meeting terlebih dahulu');
			redirect('dashboard/index','refresh');
		}
	}

	public function edit_meeting($id=''){
		$this->load->model('meetings');
		$details_meeting = $this->meetings->get($id);
		if ($details_meeting) {
			# code...
		}else{
			redirect('dashboard/index','refresh');
		}
	}

	public function save_draft(){
		if ($this->session->userdata('meeting')) {
			$this->layout->set_alert('success','meeting berhasil terarsip');

			$this->session->unset_userdata('meeting');
		}
		redirect('dashboard/index','refresh');
	}

	public function archive_meeting(){

	}

	public function details_meeting($id=''){

	}

}