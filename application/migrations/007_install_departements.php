<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_departements extends CI_Migration {
	
	

	public function __construct() {
		parent::__construct();
		
	}

	public function up() {
		// Drop table 'meeting' if it exists
		//$this->dbforge->drop_table('departements', TRUE);

		// Table structure for table 'meeting'
		$this->dbforge->add_field(array(
			'id_dept' => array(
				'type'           => 'BIGINT',
				'constraint'     => '20',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			),
			'departement_code' => array(
				'type'=>'varchar',
				'constraint' => '10',
				'null'=>TRUE
			),
			'departement_name' => array(
				'type' => 'varchar',
				'constraint' => '175',
				'null'=>TRUE
			),
			'departement_desc' => array(
				'type' => 'varchar',
				'constraint' => '225',
				'null'=>TRUE
			),
			'departement_sub' => array(
				'type' => 'varchar',
				'constraint' => '175',
				'null'=>TRUE
			),
			'departement_status' => array(
				'type' => 'ENUM("active","non-active")',
				'default'=>'active',
			),
			'created_at' => array(
				'type' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
				'null'=> FALSE
			)
		));
		$this->dbforge->add_key('id_dept', TRUE);
		$this->dbforge->create_table('departements');		
	}

	public function down() {
		$this->dbforge->drop_table('departements', TRUE);
		
	}
}
