<?php 
	
class Formate extends MY_Controller {
  
    public $layout = 'default';
   	
	function __construct() {
					parent::__construct();
					$this->load->database();
					$this->load->model('formate_model');
					 $this->load->model('slide_model');	
					 	$this->load->language('mci');	
	}
	function index($query_id = 0, $sort_by = 'ftitle', $sort_order = 'asc', $offset = 0) {
		$data['exchanges'] = $this->slide_model->get_exchangerate();
		$data['i18n'] = $this->lang->mci_current();
		$data['content'] = 'mci_example_1';
		$data['uri'] = 'example/test';
		$limit = 2;
		$data['fields'] = array(
			'FID' => 'شمار',
			'ftitle' => 'عنوان',
			'category' => 'طبقه',
			'dep_id' => 'دیپارتمنت',
			'f_link' => 'دانلود'
		);
		
		$this->input->load_query($query_id);
		
		$query_array = array(
			'ftitle' => $this->input->get('ftitle'),
			'category' => $this->input->get('category')
		);
		
		$data['query_id'] = $query_id;
		
		
		$results = $this->formate_model->search($query_array, $limit, $offset, $sort_by, $sort_order);
		
		$data['formates'] = $results['rows'];
		$data['num_results'] = $results['num_rows'];
		
		// pagination
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = site_url("formate/index/$query_id/$sort_by/$sort_order");
		$config['total_rows'] = $data['num_results'];
		$config['per_page'] = $limit;
		$config['uri_segment'] = 6;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		$data['sort_by'] = $sort_by;
		$data['sort_order'] = $sort_order;
		
		$data['category_options'] = $this->formate_model->category_options();
		///////////////////////////////////the polls
		    $data['title'] = 'Polls';
		    $data['base_styles'] = 'res/css/base.css';
			
			$config['base_url'] = site_url('poll/page');
			$config['total_rows'] = $this->poll_lib->num_polls();
			$config['per_page'] = 10;
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			
			$data['results'] = $this->poll_lib->all_polls($config['per_page'], $this->uri->segment(3));
			$data['paging_links'] = $this->pagination->create_links();
			
	 //////////////////////////////////////////////end polls
		$this->load->view('formate/index', $data);
	}
	
	
	function searchd() {
		 $data['i18n'] = $this->lang->mci_current();
		$data['content'] = 'mci_example_1';
		$data['uri'] = 'example/test';
		
		
		$query_array = array(
			'ftitle' => $this->input->post('ftitle'),
			'category' => $this->input->post('category')
		);
		
		$query_id = $this->input->save_query($query_array);
		
		redirect("da/formate/index/$query_id");
		
	}
	function searchp() {
		///////////////////////////////////the polls
		    $data['title'] = 'Polls';
		    $data['base_styles'] = 'res/css/base.css';
			
			$config['base_url'] = site_url('poll/page');
			$config['total_rows'] = $this->poll_lib->num_polls();
			$config['per_page'] = 10;
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			
			$data['results'] = $this->poll_lib->all_polls($config['per_page'], $this->uri->segment(3));
			$data['paging_links'] = $this->pagination->create_links();
			
	 //////////////////////////////////////////////end polls
	 
		 $data['i18n'] = $this->lang->mci_current();
		$data['content'] = 'mci_example_1';
		$data['uri'] = 'example/test';
		
		
		$query_array = array(
			'ftitle' => $this->input->post('ftitle'),
			'category' => $this->input->post('category')
		);
		
		$query_id = $this->input->save_query($query_array);
		
		redirect("pa/formate/index/$query_id");
		
	}
	
}
