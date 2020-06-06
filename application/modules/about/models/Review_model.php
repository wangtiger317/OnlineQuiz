<?php
/**
 * Created by PhpStorm.
 * User: JinZheBai
 * Date: 7/18/2019
 * Time: 8:06 PM
 */

class Review_model extends CI_Model
{
    function __construct(){
        parent::__construct();
        $this->load->database();
        //$this->user_id =isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
    }
    public function get_all_reviews(){
        $all_reviews = $this->db->get('customer_review');
        return $all_reviews->result();
    }
    public function create_review($data){
        try{
            $this->db->trans_start(FALSE);
            $this->db->insert('customer_review', $data);
            $this->db->trans_complete();
            $db_error = $this->db->error();
            if (!empty($db_error)) {
                throw new Exception('Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message']);
                return false; // unreachable retrun statement !!!
            }
            return TRUE;
        }catch (Exception $e){
            log_message('error: ',$e->getMessage());
            return;
        }
    }
    public function delete_review($id){
        $this->db->where('id', $id);
        $this->db->delete('customer_review');
    }
}