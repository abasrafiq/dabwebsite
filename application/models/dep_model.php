<?php
class Dep_model extends CI_Model {
	function __construct() {
		// Call the Model constructor
		parent::__construct();
	}

	function get_depsd() {
		$this -> db -> select('*');
		$this -> db -> from('department');
		$this -> db -> where('status', 0);
		$this -> db -> where('dep_lang', 2);
		//$this->db->limit(6);
		$this -> db -> order_by('dep_id', 'asc');
		return $this -> db -> get() -> result();
	}

	function get_depsp() {
		$this -> db -> select('*');
		$this -> db -> from('department');
		$this -> db -> where('status', 0);
		$this -> db -> where('dep_lang', 3);
		//$this->db->limit(6);
		$this -> db -> order_by('dep_id', 'asc');
		return $this -> db -> get() -> result();
	}

	public function get_depd($dep_number = false) {
		$query = $this -> db -> get_where('department', array('dep_number' => $dep_number, 'dep_lang' => 2));
		return $query -> row_array();
	}

	public function get_depp($dep_number = false) {
		$query = $this -> db -> get_where('department', array('dep_number' => $dep_number, 'dep_lang' => 3));
		return $query -> row_array();
	}

}
