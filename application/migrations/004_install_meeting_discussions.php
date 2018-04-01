<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_Meeting_discussions extends CI_Migration {
	
	

	public function __construct() {
		parent::__construct();
		
	}

	public function up() {
		// Drop table 'meeting' if it exists
		//$this->dbforge->drop_table('meeting_discussions', TRUE);

		// Table structure for table 'meeting'
		$this->dbforge->add_field(array(
			'id_discussion' => array(
				'type'           => 'BIGINT',
				'constraint'     => '20',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			),
			'id_meeting' => array(
				'type'       => 'DATE',
				'null'=>TRUE
			),
			'discussion' => array(
				'type'       => 'VARCHAR',
				'constraint' => '225',
				'null'=>TRUE
			),
			'discussion_pic' => array(
				'type'=>'MEDIUMINT',
				'constraint' => '8',
				'null'=>TRUE
			),
			'discussion_start' => array(
				'type'=>'DATETIME',
				'null'=>TRUE
			),
			'discussion_finish' => array(
				'type'=>'DATETIME',
				'null'=> TRUE
			),
			'discussion_target' => array(
				'type'=>'DATETIME',
				'null'=> TRUE
			),
			'discussion_status' => array(
				'type' => 'ENUM("open","close")',
				'default'=>'close',
			),
			'created_by' => array(
				'type'           => 'BIGINT',
				'constraint'     => '20',
				'null'=> TRUE
			),
			'approved_by' => array(
				'type'           => 'BIGINT',
				'constraint'     => '20',
				'null'=>TRUE
			)
		));
		$this->dbforge->add_key('id_discussion', TRUE);
		$this->dbforge->create_table('meeting_discussions');		
	}

	public function down() {
		$this->dbforge->drop_table('meeting_discussions', TRUE);
		
	}
}
