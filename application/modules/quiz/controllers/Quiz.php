<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Quiz extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Quiz_model');
    $this->load->model('user/Subject_model');
    $this->load->library('session');
  }

  /**
     * This function is used to load page view
     * @return Void
     */
    public function QuizTable(){
      is_login();
      $all_quiz = $this->Quiz_model->get_all_quiz();
      $subjects = $this->Subject_model->get_all_subjects();
      $data['subjects'] = $subjects;
      $data['all_quiz'] = $all_quiz;
      $this->load->view("include/header");
      $this->load->view("quiztable", $data);
      $this->load->view("include/footer");
    }


    public function TeacherQuiz(){
        is_login();
        $subject = $this->session->userdata('user_details')[0]->subject;
        $all_quiz = $this->Quiz_model->get_quiz($subject);
        $subjects = $this->Subject_model->get_all_subjects();
        $data['subjects'] = $subjects;
        $data['all_quiz'] = $all_quiz;
        $this->load->view("include/header");
        $this->load->view("teacherquiz", $data);
        $this->load->view("include/footer");
    }

    public function MakeQuiz() {
        is_login();
        $this->router->method = "TeacherQuiz";
        $subject = $this->session->userdata('user_details')[0]->subject;
        $subjects = $this->Subject_model->get_all_subjects();
        $data['subjects'] = $subjects;
        $title = $this->input->get('title');
        $questions = $this->Quiz_model->get_questions($title, $subject);
        $data['questions'] = $questions;
        $this->load->view("include/header");
        $this->load->view("makequiz", $data);
        $this->load->view("include/footer");
    }

    public function MakeAnswer() {
        is_login();
        $this->router->method = "TeacherQuiz";
        $subject = $this->session->userdata('user_details')[0]->subject;
        $subjects = $this->Subject_model->get_all_subjects();
        $data['subjects'] = $subjects;
        $title = $this->input->get('title');
        $questions = $this->Quiz_model->get_questions($title, $subject);
        $data['questions'] = $questions;
        $this->load->view("include/header");
        $this->load->view("makeanswer", $data);
        $this->load->view("include/footer");
    }

    public function EditAnswer() {
        is_login();
        $this->router->method = "TeacherQuiz";
        $subject = $this->session->userdata('user_details')[0]->subject;
        $subjects = $this->Subject_model->get_all_subjects();
        $data['subjects'] = $subjects;
        $id = $this->input->get('id');
        $questions = $this->Quiz_model->get_quiz_by_id($id);
        $data['questions'] = $questions;
        $this->load->view("include/header");
        $this->load->view("editanswer", $data);
        $this->load->view("include/footer");
    }

    public function EditQuiz() {
        is_login();
        $this->router->method = "TeacherQuiz";
        $subject = $this->session->userdata('user_details')[0]->subject;
        $subjects = $this->Subject_model->get_all_subjects();
        $data['subjects'] = $subjects;
        $title = $this->input->get('title');
        $questions = $this->Quiz_model->get_questions($title, $subject);
        $data['questions'] = $questions;
        $this->load->view("include/header");
        $this->load->view("editquiz", $data);
        $this->load->view("include/footer");
    }

    public function ShowQuizcode() {
        is_login();
        $this->router->method = "TeacherQuiz";
        $subjects = $this->Subject_model->get_all_subjects();
        $data['subjects'] = $subjects;
        $this->load->view("include/header");
        $this->load->view("showquizcode", $data);
        $this->load->view("include/footer");
    }

    public function DisplayQuiz() {
        is_login();
        $this->router->method = "TeacherQuiz";
        $subject = $this->session->userdata('user_details')[0]->subject;
        $subjects = $this->Subject_model->get_all_subjects();
        $data['subjects'] = $subjects;
        $title = $this->input->get('title');
        $questions = $this->Quiz_model->get_questions($title, $subject);
        $data['questions'] = $questions;
        $this->load->view("include/header");
        $this->load->view("displayquiz", $data);
        $this->load->view("include/footer");
    }

    public function AnswerQuiz() {
        is_login();
        $this->router->method = "Absense";
        $subjects = $this->Subject_model->get_all_subjects();
        $data['subjects'] = $subjects;
        $this->load->view("include/header");
        $this->load->view("answerquiz", $data);
        $this->load->view("include/footer");
    }

    public function StudentQuiz() {
        is_login();
        $this->router->method = "Absense";
//        $subject = $this->session->userdata('user_details')[0]->subject;
        $subject = $this->input->get('subject');
        $subjects = $this->Subject_model->get_all_subjects();
        $data['subjects'] = $subjects;
        $title = $this->input->get('title');
        $questions = $this->Quiz_model->get_questions($title, $subject);
        $data['questions'] = $questions;
        $this->load->view("include/header");
        $this->load->view("studentquiz", $data);
        $this->load->view("include/footer");
    }

    public function imgupload() {
        is_login();
        if ( $_FILES['file']['error'] > 0 ){
            echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        }
        else {
            if(move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']))
            {
                echo 'uploads/' . $_FILES['file']['name'];
            }
        }
    }

    public function removerow(){
        $id = $_GET['id'];
        $this->Quiz_model->delete($id);
        echo true;
    }

    public function removetitle(){
        $title = $_GET['title'];
        $this->Quiz_model->deletetitle($title);
        echo true;
    }

    public function updaterow(){
        $users_id = $_GET['id'];
        $values = $_GET['values'];
        $th_names = $_GET['th_names'];
        $table = $_GET['table'];
        for ($i = 1; $i < count($th_names); $i++){
            $data = array($th_names[$i]=>$values[$i]);
            $this->Quiz_model->updateRow($table, 'id', $users_id, $data);
        }
    }

    public function getquiz(){
        $quiz_id = $_GET['quiz_id'];
        $quiz = $this->Quiz_model->get_quiz_by_id($quiz_id);
        echo json_encode($quiz);
    }

    public function addquiz(){
        $data['subject'] = $this->session->userdata('user_details')[0]->subject;
        $data['title'] = $_GET['title'];
        $data['description'] = $_GET['description'];
        $data['image'] = $_GET['image'];
        $data['question'] = $_GET['question'];
        $data['timelimit'] = $_GET['timelimit'];
        $data['question_image'] = $_GET['question_image'];
        $data['score_weight'] = $_GET['score'];
        $data['answer_1'] = $_GET['answer_1'];
        $data['answer_2'] = $_GET['answer_2'];
        $data['answer_3'] = $_GET['answer_3'];
        $data['answer_4'] = $_GET['answer_4'];
        $data['correct_answer'] = $_GET['correct_answer'];
        $data['correct_answer_id'] = $_GET['correct_answer_id'];
        $result = $this->Quiz_model->insertRow('quiz', $data);
        echo $result;
    }

    public function editquiz_id(){
        $data['subject'] = $this->session->userdata('user_details')[0]->subject;
        $id = $_GET['id'];
        $data['description'] = $_GET['description'];
        $data['image'] = $_GET['image'];
        $data['question'] = $_GET['question'];
        $data['timelimit'] = $_GET['timelimit'];
        $data['question_image'] = $_GET['question_image'];
        $data['score_weight'] = $_GET['score'];
        $data['answer_1'] = $_GET['answer_1'];
        $data['answer_2'] = $_GET['answer_2'];
        $data['answer_3'] = $_GET['answer_3'];
        $data['answer_4'] = $_GET['answer_4'];
        $data['correct_answer'] = $_GET['correct_answer'];
        $data['correct_answer_id'] = $_GET['correct_answer_id'];
        $result = $this->Quiz_model->updateRow('quiz', 'id', $id, $data);
        echo $result;
    }

    public function updatequizcode(){
        $quiz_id = $_GET['quiz_id'];
        $subject = $this->session->userdata('user_details')[0]->subject;
        $title = $_GET['title'];
        $description = $_GET['description'];
        $quiz_code = $_GET['quiz_code'];

        $data['quiz_code'] = $quiz_code;

        $questions = $this->Quiz_model->updatequizcodes($title, $subject, $description, $data);
        echo $questions;

    }

}
?>