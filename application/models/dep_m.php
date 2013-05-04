<?php
class Dep_m extends MY_Model
{
	protected $_table_name = 'department';
	protected $_primary_key = 'dep_id';
	protected $_order_by = 'dep_id desc';
	public $rules = array(
		'dep_id' => array(
			'field' => 'dep_id', 
			'label' => 'ID', 
			'rules' => 'trim|intval'
		), 
		'dep_name' => array(
			'field' => 'dep_name', 
			'label' => 'dep_name', 
			'rules' => 'trim|required|xss_clean'
		), 
		'dep_body' => array(
			'field' => 'dep_body', 
			'label' => 'dep_body', 
			'rules' => 'trim|required|max_length[100000]|xss_clean'
		), 
		'foundation_date' => array(
			'field' => 'foundation_date', 
			'label' => 'foundation_date', 
			'rules' => 'trim|required|xss_clean'
		), 
		'dep_aim' => array(
			'field' => 'dep_aim', 
			'label' => 'dep_aim', 
			'rules' => 'trim|required'
		),
		
		'dep_acheivement' => array(
			'field' => 'dep_acheivement', 
			'label' => 'dep_acheivement', 
			'rules' => 'trim|required'
		),
		
		'dep_lang' => array(
			'field' => 'dep_lang', 
			'label' => 'dep_lang', 
			'rules' => 'trim|required'
		),
		'dep_created' => array(
			'field' => 'dep_created', 
			'label' => 'dep_created', 
			'rules' => 'trim|required'
		),
		'dep_modified' => array(
			'field' => 'dep_modified', 
			'label' => 'dep_modified', 
			'rules' => 'trim|required'
		),
		'dep_number' => array(
			'field' => 'dep_number', 
			'label' => 'dep_number', 
			'rules' => 'trim|required'
		),
		'status' => array(
			'field' => 'status', 
			'label' => 'status', 
			'rules' => 'trim|required'
		)
	);

	public function get_new ()
	{
		$department = new stdClass();
		$department->dep_name = '';
		$department->dep_body = '';
		$department->foundation_date = date('Y-m-d');
		$department->dep_aim = '';
		$department->dep_acheivement = '';
		$department->foundation_data = '';
		$department->dep_lang = '';
		$department->dep_created = date('Y-m-d');
		$department->dep_modified = date('Y-m-d');
		$department->dep_number = '';
		$department->status = '';
		
		return $department;
	}
	


}
