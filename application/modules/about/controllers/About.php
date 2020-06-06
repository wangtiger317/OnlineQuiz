<?php defined("BASEPATH") OR exit("No direct script access allowed");

class About extends CI_Controller {

  function __construct() {
    parent::__construct();
    //$this->load->database();
    //$this->load->library('session');
    $this->load->model('user/User_model');
    $this->load->model('Review_model');
  }

  /**
     * This function is used to load page view
     * @return Void
     */
  public function index(){
    is_login();
    $all_reviews = $this->Review_model->get_all_reviews();
    $data['all_reviews'] = $all_reviews;
	$this->load->view("include/header");
    $this->load->view("index", $data);
    $this->load->view("include/footer");
  }

  public function customer_reviews($id){
      //echo $id; die();
      $data['customer_id'] = $id;
      $this->load->view('review', $data);
  }
  public function send_reviews(){

      $customer_id = $this->input->post('customer_id');
      $created_at = date("Y-m-d H:i:s");
      $data = array(
          'content' => $this->input->post('content'),
          'customer_id' => $customer_id,
          'name' => $this->User_model->get_users($customer_id)[0]->name,
          'email' => $this->User_model->get_users($customer_id)[0]->email,
          'phone_number' => $this->User_model->get_users($customer_id)[0]->phone_number,
          'created_at'=>$created_at
      );
      //echo $data;die();
      $this->Review_model->create_review($data);
      echo $data;
  }
  public function delete_review($id){

      $this->Review_model->delete_review($id);
      redirect('about');
  }
}
?>