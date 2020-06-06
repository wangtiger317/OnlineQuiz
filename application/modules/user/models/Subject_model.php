<?php
class Subject_model extends CI_Model {
	function __construct(){            
	  	parent::__construct();
        $this->load->database();
	}
    public function get_all_subjects(){
        $subjects = $this->db->get('subjects');
        return $subjects->result();
    }

    public function get_subject_id($subject){
        $this->db->where('subject', $subject);
        $result = $this->db->get('subjects');
        $ret = $result->row();
        return $ret->id;
    }
}