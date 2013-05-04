<?php

class News_model extends CI_Model {

    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
	
	}

	function get_newsd($limit, $offset){
		$q = $this->db->select('*')
			->from('articles')
			->where('article_lang',2)
			->order_by('created', 'desc')
			->limit($limit, $offset);
		$ret['rows'] = $q->get()->result();
		//count query
		/*$q = $this->db->select('COUNT(*) as count' , FALSE)
			->from('articles');
		$tmp = $q->get()->result();
		$ret['num_rows'] = $tmp[0]->count;
		*/
		return $ret;
	}
		function get_newsp($limit, $offset){
		$q = $this->db->select('*')
			->from('articles')
			->where('article_lang',3)
			->order_by('created', 'desc')
			->limit($limit, $offset);
		$ret['rows'] = $q->get()->result();
		//count query
		/*$q = $this->db->select('COUNT(*) as count' , FALSE)
			->from('articles');
		$tmp = $q->get()->result();
		$ret['num_rows'] = $tmp[0]->count;
		*/
		return $ret;
	}
	
	public function get_newssd($article_number= FALSE)
	{
		if ($article_number === FALSE)
		{
		$config['per_page']; $this->uri->segment(3);
		}
		$query = $this->db->get_where('articles', array('article_number' => $article_number, 'article_lang' => 2));
		return $query->row_array();
	}
	public function get_newssp($article_number= FALSE)
		{
			if ($article_number === FALSE)
			{
			$config['per_page']; $this->uri->segment(3);
			}
			$query = $this->db->get_where('articles', array('article_number' => $article_number, 'article_lang' => 3));
			return $query->row_array();
		}
}
