<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_meeting_attendances extends CI_Migration {
	
	

	public function __construct() {
		parent::__construct();
		
	}

	public function up() {
		// Drop table 'meeting' if it exists
		//$this->dbforge->drop_table('meeting_attendances', TRUE);

		// Table structure for table 'meeting'
		$this->dbforge->add_field(array(
			'id_attendance' => array(
				'type'           => 'BIGINT',
				'constraint'     => '20',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			),
			'id_meeting' => array(
				'type'           => 'BIGINT',
				'constraint'     => '20',
				'null'=>TRUE
			),
			'id_user' => array(
				'type'=>'MEDIUMINT',
				'constraint' => '8',
				'null'=>TRUE
			),
			'attendance_status' => array(
				'type' => 'ENUM("true","false")',
				'default'=>'false',
			)
		));
		$this->dbforge->add_key('id_attendance', TRUE);
		$this->dbforge->create_table('meeting_attendances');		
	}

	public function down() {
		$this->dbforge->drop_table('meeting_attendances', TRUE);
		
	}
}
