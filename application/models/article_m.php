<?php
class Article_m extends MY_Model
{
	protected $_table_name = 'articles';
	protected $_order_by = 'pubdate desc, id desc';
	protected $_timestamps = TRUE;
	public $rules = array(
		'pubdate' => array(
			'field' => 'pubdate', 
			'label' => 'Publication date', 
			'rules' => 'trim|required|exact_length[10]|xss_clean'
		), 
		'title' => array(
			'field' => 'title', 
			'label' => 'Title', 
			'rules' => 'trim|required|max_length[500]|xss_clean'
		), 
		'slug' => array(
			'field' => 'slug', 
			'label' => 'Slug', 
			'rules' => 'trim|required|max_length[100]|url_title|xss_clean'
		), 
		'body' => array(
			'field' => 'body', 
			'label' => 'Body', 
			'rules' => 'trim|required'
		),
		'article_number' => array(
			'field' => 'article_number', 
			'label' => 'article number', 
			'rules' => 'trim|required'
		),
		'article_lang' => array(
			'field' => 'article_lang', 
			'label' => 'language', 
			'rules' => 'trim|required'
		),
		'status' => array(
			'field' => 'status', 
			'label' => 'Status', 
			'rules' => 'trim|required'
		),
		'article_pic' => array(
			'field' => 'article_pic', 
			'label' => 'Picture', 
			'rules' => 'trim|required'
		)
	);

	public function get_new ()
	{
		$article = new stdClass();
		$article->title = '';
		$article->slug = '';
		$article->body = '';
		$article->pubdate = date('Y-m-d');
		$article->article_number = '';
		$article->article_lang = '';
		$article->status = '';
		$article->article_pic = '';
		return $article;
	}
	
	public function set_published(){
		$this->db->where('pubdate <=', date('Y-m-d'));
	}
	
	public function get_recent($limit = 3){
		
		// Fetch a limited number of recent articles
		$limit = (int) $limit;
		$this->set_published();
		$this->db->limit($limit);
		return parent::get();
	}

}