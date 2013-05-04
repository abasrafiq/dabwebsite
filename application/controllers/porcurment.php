<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Porcurment extends MY_Controller {
	  public $layout = 'default';
	  
	  public function __construct(){
            parent::__construct();
            $this->load->model('slide_model');
			 $this->load->model('por_model');
			$this->load->language('mci');
		   
        }
		
	   public function index(){

			$data['porsd'] = $this->por_model->get_pord();
			$data['porsp'] = $this->por_model->get_porp();
			$data['exchanges'] = $this->slide_model->get_exchangerate();
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
			$this->load->view('porcurment/index',$data);
		}
	   public function upload(){

		
			$data['exchanges'] = $this->slide_model->get_exchangerate();
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
			$this->load->view('porcurment/upload',$data);
		}
	  

}