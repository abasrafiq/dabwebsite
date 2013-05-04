<?php 
class Jobs extends MY_Controller {
  
    public $layout = 'default';
	
   	function __construct() {	
					parent::__construct();
					$this->load->database();
					$this->load->model('slide_model');	
					$this->load->model('job_model');
					$this->load->language('mci');	
					
			
	}
	function index(){
			$data['exchanges'] = $this->slide_model->get_exchangerate();
			$data['jobs'] = $this->job_model->get_jobs();
			
			
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
	 $this->load->view('job/index', $data);
	}
   
}