<?php
  
  class Formate_model extends CI_Model {

    
    function __construct()
    {
        // Call the Mode l constructor
        parent::__construct();
	
    }
   function search($query_array, $limit, $offset, $sort_by, $sort_order) {
		
		$sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
		$sort_columns = array('*');
		$sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'ftitle';
		
		// results query
		$q = $this->db->select('formate.*, department.dep_id, department.dep_name')
			      ->from('formate')
				  ->where('formate.fstatus = 1')
				  ->join('department', 'formate.dep_id =department.dep_id')
				 // ->join('category', 'formate.cat_id = category.cat_id')
			      ->limit($limit, $offset)
			      ->order_by($sort_by, $sort_order);
		
		if (strlen($query_array['ftitle'])) {
			$q->like('ftitle', $query_array['ftitle']);
		}
		if (strlen($query_array['category'])) {
			$q->where('category', $query_array['category']);
		}
		
		
		$ret['rows'] = $q->get()->result();
		
		// count query
		$q = $this->db->select('COUNT(*) as count', FALSE)
			->from('formate');
		
		if (strlen($query_array['ftitle'])) {
			$q->like('ftitle', $query_array['ftitle']);
		}
		if (strlen($query_array['category'])) {
			$q->where('category', $query_array['category']);
		}
		
		$tmp = $q->get()->result();
		
		$ret['num_rows'] = $tmp[0]->count;
		
		return $ret;
	}
	
	function category_options() {
		
		$rows = $this->db->select('cat_name')
			->from('category')
			->get()->result();
		
		$category_options = array('' => '');
		foreach ($rows as $row) {
			$category_options[$row->cat_name] = $row->cat_name;
		}
		
		return $category_options;
	}
	
}
