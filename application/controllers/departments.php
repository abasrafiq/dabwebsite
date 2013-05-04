<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Departments extends MY_Controller {
	public $layout = 'default';

	public function __construct() {
		parent::__construct();
		$this -> load -> model('slide_model');
		$this -> load -> model('dep_model');
		$this -> load -> language('mci');
	}

	public function index() {
		///////////////////////////////////the polls
		$data['title'] = 'Polls';
		$data['base_styles'] = 'res/css/base.css';

		$config['base_url'] = site_url('poll/page');
		$config['total_rows'] = $this -> poll_lib -> num_polls();
		$config['per_page'] = 10;
		$this -> load -> library('pagination');
		$this -> pagination -> initialize($config);

		$data['results'] = $this -> poll_lib -> all_polls($config['per_page'], $this -> uri -> segment(3));
		$data['paging_links'] = $this -> pagination -> create_links();

		//////////////////////////////////////////////end polls
		$data['exchanges'] = $this -> slide_model -> get_exchangerate();
		$data['depsd'] = $this -> dep_model -> get_depsd();
		$data['depsp'] = $this -> dep_model -> get_depsp();
		$this -> load -> view('department/index', $data);
	}

	public function single($dep_id) {
		///////////////////////////////////the polls
		$data['title'] = 'Polls';
		$data['base_styles'] = 'res/css/base.css';

		$config['base_url'] = site_url('poll/page');
		$config['total_rows'] = $this -> poll_lib -> num_polls();
		$config['per_page'] = 10;
		$this -> load -> library('pagination');
		$this -> pagination -> initialize($config);

		$data['results'] = $this -> poll_lib -> all_polls($config['per_page'], $this -> uri -> segment(3));
		$data['paging_links'] = $this -> pagination -> create_links();

		//////////////////////////////////////////////end polls
		$data['exchanges'] = $this -> slide_model -> get_exchangerate();

		//////////////dari
		$data['depsd'] = $this -> dep_model -> get_depd($dep_id);
		if (empty($data['depsd'])) {
			show_404();
		}
		$data['dep_id'] = $data['depsd']['dep_id'];
		///////////end dari
		////////////pahsto
		$data['depsp'] = $this -> dep_model -> get_depp($dep_id);
		if (empty($data['depsp'])) {
			show_404();
		}
		$data['dep_id'] = $data['depsp']['dep_id'];
		///////end pashto

		//////////////dari aims

		///////////end dari aims

		$this -> load -> view('department/single', $data);

	}

}
