<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_meetings extends CI_Migration {
	
	

	public function __construct() {
		parent::__construct();
		
	}

	public function up() {
		// Drop table 'meeting' if it exists
		$this->dbforge->drop_table('meetings', TRUE);

		// Table structure for table 'meeting'
		$this->dbforge->add_field(array(
			'id_meeting' => array(
				'type'           => 'BIGINT',
				'constraint'     => '20',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			),
			'meeting_date' => array(
				'type'       => 'DATE',
				'null'=>TRUE
			),
			'meeting_place' => array(
				'type'       => 'VARCHAR',
				'constraint' => '225',
				'null'=>TRUE
			),
			'meeting_review' => array(
				'type'       => 'TEXT',
				'null'=>TRUE
			),
			'meeting_information' => array(
				'type'=>'TEXT',
				'null'=>TRUE
			),
			'created_at' => array(
				'type'=>'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
				'null'=>FALSE
			),
			'created_by' => array(
				'type'=>'MEDIUMINT',
				'constraint' => '8',
				'null'=>FALSE
			)
		));
		$this->dbforge->add_key('id_meeting', TRUE);
		$this->dbforge->create_table('meetings');		
	}

	public function down() {
		$this->dbforge->drop_table('meetings', TRUE);
		
	}
}
