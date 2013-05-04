<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {
	  public $layout = 'default';
	  
	  public function __construct(){
            parent::__construct();
            $this->load->model('slide_model');
        }
		
	   public function index(){
	   $data['i18n'] = $this->lang->mci_current();
	   $data['content'] = 'mci_example_1';
		
			$data['newsesd'] = $this->slide_model->get_newsd();
			$data['newsesp'] = $this->slide_model->get_newsp();
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
		
		/////////////////////////////////////////////  
			$this->load->view('wlc',$data);
		}
}