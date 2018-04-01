<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_emp_has_departements extends CI_Migration {
	
	

	public function __construct() {
		parent::__construct();
		
	}

	public function up() {
		// Drop table 'meeting' if it exists
		//$this->dbforge->drop_table('emp_has_departements', TRUE);

		// Table structure for table 'meeting'
		$this->dbforge->add_field(array(
			'id' => array(
				'type'           => 'BIGINT',
				'constraint'     => '20',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			),
			'id_emp' => array(
				'type'           => 'BIGINT',
				'constraint'     => '20',
				'null'=>TRUE
			),
			'id_dept' => array(
				'type'           => 'BIGINT',
				'constraint'     => '20',
				'null'=>TRUE
			),
			'created_at' => array(
				'type' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
				'null'=> FALSE
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('emp_has_departements');		
	}

	public function down() {
		$this->dbforge->drop_table('emp_has_departements', TRUE);
		
	}
}
