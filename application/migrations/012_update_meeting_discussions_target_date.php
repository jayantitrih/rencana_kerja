<?php defined('BASEPATH') OR exit('No direct script access allowed');

	
class Migration_Update_meeting_discussions_target_date extends CI_Migration {

	public function up()
	{
		
		$fields = array(
			'discussion_start' => array(
				'name'=>'discussion_start',
				'type' => 'date',
				'null' => true
			),
			'discussion_finish' => array(
				'name'=>'discussion_finish',
				'type' => 'date',
				'null' => true
			),
			'discussion_target' => array(
				'name'=>'discussion_target',
				'type' => 'date',
				'null' => true
			)
		);
		$this->dbforge->modify_column('meeting_discussions', $fields);
	}

	public function down()
	{

	}

}