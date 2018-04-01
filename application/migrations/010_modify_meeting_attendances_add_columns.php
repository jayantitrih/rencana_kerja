<?php defined('BASEPATH') OR exit('No direct script access allowed');

	
class Migration_Modify_meeting_attendances_add_columns extends CI_Migration {

	public function up()
	{
		
		$fields = array(
			'email'=>array(
				'type'       => 'VARCHAR',
				'constraint' => '254',
				'null'=>TRUE
			),
			'attendance_desc'=>array(
				'type' => 'VARCHAR',
				'constraint' => '175',
				'null'=>TRUE
			),
			'confirmation_status'=>array(
				'type' => 'ENUM("true","false")',
				'default'=>'false',
			),
			'last_modified' => array(
				'type' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
				'null' => TRUE,
			)
		);
		$this->dbforge->add_column('meeting_attendances',$fields);
	}

	public function down()
	{

	}

}