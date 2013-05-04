<?php 
 class MY_Controller extends CI_Controller {
    protected $data; 
	public function __construct(){
        parent::__construct();
       // $this->data['errors'] = array();
		//$this->data['site_name'] = config_item('site_name');
	
		$this->load->model('slide_model');
		$this->load->language('mci');
    
		$this->load->library('poll_lib');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('html');
		
		$this->form_validation->set_error_delimiters('<dd class="error">', '</dd>');
		
		
			
        }

    }