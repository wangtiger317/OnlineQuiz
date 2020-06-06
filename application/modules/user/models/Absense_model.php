<?php
class Absense_model extends CI_Model {
	function __construct(){            
	  	parent::__construct();
        $this->load->database();
	}
    public function get_data(){
        $result = $this->db->get('absence');
        return $result->result();
    }
    public function get_data_subject($subject){
        $this->db->where('subject', $subject);
        $result = $this->db->get('absence');
        return $result->result();
    }
    public function get_student($id){
        $this->db->where('student_id', $id);
        $query=$this->db->get('absence');
        $result=$query->result();
        return $result;
    }
    public function insertRow($table, $data){
        $this->db->insert($table, $data);
        return  $this->db->insert_id();
    }
}