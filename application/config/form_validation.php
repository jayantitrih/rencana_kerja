<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
	'simpan_permission'=>array(
		array('field'=>'group_id','label'=>'Level User','rules'=>'trim|required'),
		array('field'=>'modul','label'=>'Module aplikasi','rules'=>'trim|required')
	),
	'login'=>array(
		array('field'=>'identity','label'=>'Email','rules'=>'trim|required'),
		array('field'=>'password','label'=>'Password','rules'=>'trim|required')
	),
	'register'=>array(
		array('field'=>'first_name','label'=>'First Name','rules'=>'trim|required'),
		array('field'=>'last_name','label'=>'Last Name','rules'=>'trim|required'),
		array('field'=>'identity','label'=>'Identity','rules'=>'trim|required'),
		array('field'=>'email','label'=>'Email','rules'=>'trim|required|valid_email|is_unique[users.email]'),
		array('field'=>'phone','label'=>'Phone','rules'=>'trim|required'),
		//array('field'=>'company','label'=>'Password','rules'=>'trim|required'),
		array('field'=>'password','label'=>'Password','rules'=>'trim|required'),
		array('field'=>'password_confirm','label'=>'Confirm Password','rules'=>'trim|required|matches[password]')
	),
);