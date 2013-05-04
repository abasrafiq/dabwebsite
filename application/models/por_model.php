<?php
class Por_model extends CI_Model {
    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
	function get_pord(){
		$this->db->select('*');
		$this->db->from('porcurment');
		$this->db->where('Status' , 0);
		$this->db->where('LangugeId' , 2);
		$this->db->order_by('ExpireDate', 'desc');
		return $this->db->get()->result();	
	}
	function get_porp(){
		$this->db->select('*');
		$this->db->from('porcurment');
		$this->db->where('Status' , 0);
		$this->db->where('LangugeId' , 3);
		$this->db->order_by('ExpireDate', 'desc');
		return $this->db->get()->result();	
	}
	
  function insert_file($filename, $title)
   {
      $data = array(
         'filename'     => $filename,
         'title'        => $title
      );
      $this->db->insert('files', $data);
      return $this->db->insert_id();
   }

}