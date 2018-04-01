<?php defined('BASEPATH') OR exit('No direct script access allowed');

	
class Migration_Modify_meetings_add_columns extends CI_Migration {

	public function up()
	{
		
		$field_edit = array(
				'meeting_time'=>array(
				'type' => 'time',
				'null'=>TRUE
			),
			'start_at'=>array(
				'type' => 'time',
				'null'=>TRUE
			),
			'finish_at'=>array(
				'type' => 'time',
				'null'=>TRUE
			),
			'archived'=>array(
				'type' => 'ENUM("true","false")',
				'default'=>'false',
			)
		);
		$this->dbforge->add_column('meetings',$field_edit);
	}

	public function down()
	{

	}

}