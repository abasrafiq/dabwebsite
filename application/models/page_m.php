<?php
class Page_m extends MY_Model
{
	protected $_table_name = 'department';
	protected $_order_by = 'dep_id, order';
	public $rules = array(
		'dep_id' => array(
			'field' => 'dep_id', 
			'label' => 'ID', 
			'rules' => 'trim|intval'
		), 
		'dep_name' => array(
			'field' => 'dep_name', 
			'label' => 'dep_name', 
			'rules' => 'trim|required|xss_clean'
		), 
		'dep_body' => array(
			'field' => 'dep_body', 
			'label' => 'dep_body', 
			'rules' => 'trim|required|max_length[100]|xss_clean'
		), 
		'foundation_date' => array(
			'field' => 'foundation_date', 
			'label' => 'foundation_date', 
			'rules' => 'trim|required|max_length[100]|url_title|callback__unique_slug|xss_clean'
		), 
		'dep_aim' => array(
			'field' => 'dep_aim', 
			'label' => 'dep_aim', 
			'rules' => 'trim|required'
		),
		'dep_acheivement' => array(
			'field' => 'dep_acheivement', 
			'label' => 'dep_acheivement', 
			'rules' => 'trim|required'
		),
		'dep_lang' => array(
			'field' => 'dep_lang', 
			'label' => 'dep_lang', 
			'rules' => 'trim|required'
		),
		'dep_created' => array(
			'field' => 'dep_created', 
			'label' => 'dep_created', 
			'rules' => 'trim|required'
		),
		'dep_modified' => array(
			'field' => 'dep_modified', 
			'label' => 'dep_modified', 
			'rules' => 'trim|required'
		),
		'dep_number' => array(
			'field' => 'dep_number', 
			'label' => 'dep_number', 
			'rules' => 'trim|required'
		),
		'status' => array(
			'field' => 'status', 
			'label' => 'status', 
			'rules' => 'trim|required'
		)
	);

	public function get_new ()
	{
		$page = new stdClass();
		$page->dep_name = '';
		$page->dep_body = '';
		$page->foundation_date = '';
		$page->dep_aim = '';
		$page->dep_acheivment = '';
		$page->foundation_date = '';
		$page->dep_lang = '';
		$page->dep_created = '';
		$page->dep_modified = '';
		$page->dep_number = '';
		$page->status= '';

		return $page;
	}

	/*public function get_archive_link(){
		$page = parent::get_by(array('template' => 'news_archive'), TRUE);
		return isset($page->slug) ? $page->slug : '';
	}*/
	
	public function delete ($dep_id)
	{
		// Delete a page
		parent::delete($dep_id);
		
		// Reset parent ID for its children
		$this->db->set(array(
			'dep_id' => 0
		))->where('dep_id', $dep_id)->update($this->_table_name);
	}

	public function save_order ($pages)
	{
		if (count($pages)) {
			foreach ($pages as $order => $page) {
				if ($page['item_id'] != '') {
					$data = array('dep_id' => (int) $page['dep_id'], 'order' => $order);
					$this->db->set($data)->where($this->_primary_key, $page['item_id'])->update($this->_table_name);
				}
			}
		}
	}

	public function get_nested ()
	{
		$this->db->order_by($this->_order_by);
		$pages = $this->db->get('pages')->result_array();
		
		$array = array();
		foreach ($pages as $page) {
			if (! $page['parent_id']) {
				// This page has no parent
				$array[$page['id']] = $page;
			}
			else {
				// This is a child page
				$array[$page['parent_id']]['children'][] = $page;
			}
		}
		return $array;
	}

	public function get_with_parent ($id = NULL, $single = FALSE)
	{
		$this->db->select('pages.*, p.slug as parent_slug, p.title as parent_title');
		$this->db->join('pages as p', 'pages.parent_id=p.id', 'left');
		return parent::get($id, $single);
	}

	public function get_no_parents ()
	{
		// Fetch pages without parents
		$this->db->select('id, title');
		$this->db->where('parent_id', 0);
		$pages = parent::get();
		
		// Return key => value pair array
		$array = array(
			0 => 'No parent'
		);
		if (count($pages)) {
			foreach ($pages as $page) {
				$array[$page->id] = $page->title;
			}
		}
		
		return $array;
	}
}