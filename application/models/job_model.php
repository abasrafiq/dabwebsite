<?php
class Job_model extends CI_Model {
    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }

	function get_jobs(){
	    $this->db->select('jobs.*, department.dep_id, department.dep_name, location.loc_id, location.loc_name');
    	$this->db->from('jobs');
		$this->db->where('jobs.job_status', 1 );
		$this->db->join('department', 'jobs.dep_id = department.dep_id');
        $this->db->join('location', 'location.loc_id = location.loc_id');
		
		
    	return $this->db->get()->result();
		
	}

}