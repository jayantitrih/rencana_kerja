<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_nilai extends CI_Migration {
	private $tables;

	public function __construct() {
		parent::__construct();
		$this->load->dbforge();

		//$this->load->config('ion_auth', TRUE);
		//$this->tables = $this->config->item('tables', 'ion_auth');
	}

	public function up() {
		// Drop table 'groups' if it exists
		$this->dbforge->drop_table('nilai', TRUE);

		// Table structure for table 'groups'
		$this->dbforge->add_field(array(
			'id' => array(
				'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			),
			'predikat' => array(
				'type'       => 'VARCHAR',
				'constraint' => '20',
			),
			'bobot' => array(
				'type'       => 'INT',
				'constraint' => '11',
				'NULL' => TRUE
			)
		));
		
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('nilai');

	}

	public function down() {
		$this->dbforge->drop_table('nilai', TRUE);
	}
}
