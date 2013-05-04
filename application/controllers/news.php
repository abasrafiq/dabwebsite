<?php 
class News extends MY_Controller {
  
    public $layout = 'default';
   	function __construct() {
					parent::__construct();
					$this->load->database();
					$this->load->model('news_model');
					 $this->load->model('slide_model');	
				
					
			
	}
    public function index($offset =0)
    {
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
    	$data['exchanges'] = $this->slide_model->get_exchangerate();
		$limit = 3;
		$results = $this->news_model->get_newsd($limit,$offset);
		$data['newsesd'] = $results['rows'];
		$results = $this->news_model->get_newsp($limit,$offset);
		$data['newsesp'] = $results['rows'];
		
		//$data['num_results'] = $results['num_rows'];
		
				
		// pagination
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = site_url('news/index');
		//$config['total_rows'] = $data['num_results'];
		$config['per_page'] = $limit;
		$config['uri_segment'] = 6;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
       ///end pagination	
   
		$this->load->view('news/index',$data);
		
	
    }
	
	public function single($article_number)
		{
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
		$data['exchanges'] = $this->slide_model->get_exchangerate();
	///////////////////////////////single news	
		$data['news_itemd'] = $this->news_model->get_newssd($article_number);
			if (empty($data['news_itemd']))
			{
				show_404();
			}
		$data['article_number'] = $data['news_itemd']['article_number'];
		
		$data['news_itemp'] = $this->news_model->get_newssp($article_number);
		if (empty($data['news_itemp']))
		{
		show_404();
		}
		$data['article_number'] = $data['news_itemp']['article_number'];
		
		$this->load->view('news/single', $data);
	
		}
}