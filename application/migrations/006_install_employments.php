<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_employments extends CI_Migration {
	
	

	public function __construct() {
		parent::__construct();
		
	}

	public function up() {
		// Drop table 'meeting' if it exists
		//$this->dbforge->drop_table('employments', TRUE);

		// Table structure for table 'meeting'
		$this->dbforge->add_field(array(
			'id_emp' => array(
				'type'           => 'BIGINT',
				'constraint'     => '20',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			),
			'id_user' => array(
				'type'=>'MEDIUMINT',
				'constraint' => '8',
				'null'=>TRUE
			),
			'identity_number' => array(
				'type'=>'varchar',
				'constraint' => '25',
				'null'=>TRUE
			),
			'join_at' => array(
				'type'=>'date',
				'null'=>TRUE
			),
			'terminate_at' => array(
				'type'=>'date',
				'null'=>TRUE
			),
			'employee_type' => array(
				'type' => 'ENUM("permanent","contract","probation","apprentice")',
				'default'=>'contract',
			),
			'employee_status' => array(
				'type' => 'ENUM("active","non-active")',
				'default'=>'active',
			),
			'born_place' => array(
				'type'=>'varchar',
				'constraint' => '125',
				'null'=>TRUE
			),
			'date_of_birth' => array(
				'type'=>'date',
				'null'=>TRUE
			),
			'address' => array(
				'type'=>'text',
				'null'=>TRUE
			),
			'gender' => array(
				'type'=>'ENUM("male","female")',
				'null'=>TRUE
			),
			'photo' => array(
				'type'=>'text',
				'null'=>TRUE
			)
		));
		$this->dbforge->add_key('id_emp', TRUE);
		$this->dbforge->create_table('employments');		
	}

	public function down() {
		$this->dbforge->drop_table('employments', TRUE);
		
	}
}
