<?php defined('BASEPATH') OR exit('No direct script access allowed');

	
class Migration_Modify_meetings_add_leaders extends CI_Migration {

	public function up()
	{
		
		$fields = array(
			'chairman'=>array(
				'type'=>'MEDIUMINT',
				'constraint' => '8',
				'null'=>FALSE
			),
			'secretary'=>array(
				'type'=>'MEDIUMINT',
				'constraint' => '8',
				'null'=>FALSE
			)
		);
		$this->dbforge->add_column('meetings',$fields);
	}

	public function down()
	{

	}

}