<?php
class Quiz_model extends CI_Model {
	function __construct(){            
	  	parent::__construct();
        $this->load->database();
	}
    public function get_quiz($subject=""){
        $this->db->where('subject', $subject);
        $quiz = $this->db->get('quiz');
        return $quiz->result();
    }

    public function get_quiz_by_id($quiz_id=""){
        $this->db->where('id', $quiz_id);
        $quiz = $this->db->get('quiz');
        return $quiz->result();
    }

    public function get_questions($title="", $subject=""){
        $this->db->where('title', $title);
        $this->db->where('subject', $subject);
        $quiz = $this->db->get('quiz');
        return $quiz->result();
    }

    public function get_all_quiz(){
        $quiz = $this->db->get('quiz');
        return $quiz->result();
    }

    public function updateRow($table, $col, $colVal, $data) {
        $this->db->where($col,$colVal);
        $this->db->update($table,$data);
        return true;
    }

    function delete($id='') {
        $this->db->where('id', $id);
        $this->db->delete('quiz');
    }

    function deletetitle($title='') {
        $this->db->where('title', $title);
        $this->db->delete('quiz');
    }

    public function insertRow($table, $data){
        $this->db->insert($table, $data);
        return  $this->db->insert_id();
    }

    public function updatequizcodes($title = "", $subject = "", $description = "", $data = ""){
        $this->db->where('title', $title);
        $this->db->where('subject', $subject);
        $this->db->where('description', $description);
        $quiz = $this->db->update('quiz',$data);
        return $quiz->result();
    }
}