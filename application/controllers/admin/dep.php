<?php
class Dep extends Admin_Controller
{

	public function __construct ()
	{
		parent::__construct();
		$this->load->model('dep_m');
	}

	public function index ()
	{
		// Fetch all articles
		$this->data['departments'] = $this->dep_m->get();
		
		// Load view
		$this->data['subview'] = 'admin/department/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit ($dep_id = NULL)
	{
		// Fetch a article or set a new one
		if ($dep_id) {
			$this->data['department'] = $this->dep_m->get($dep_id);
			count($this->data['department']) || $this->data['errors'][] = 'article could not be found';
		}
		else {
			$this->data['department'] = $this->dep_m->get_new();
		}
		
		// Set up the form
		$rules = $this->dep_m->rules;
		$this->form_validation->set_rules($rules);
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->dep_m->array_from_post(array(
				'dep_name', 
				'dep_body', 
				'foundation_date', 
				'dep_aim',
				'dep_acheivement', 
				'dep_lang',
				'dep_created', 
				'dep_modified', 
				'dep_number', 
				'status'
			));
			$this->dep_m->save($data, $dep_id);
			redirect('admin/dep');
		}
		
		// Load the view
		$this->data['subview'] = 'admin/department/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function delete ($dep_id)
	{
		$this->dep_m->delete($dep_id);
		redirect('admin/dep');
	}

}