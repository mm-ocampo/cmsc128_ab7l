<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Signup extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('signup_model');
    }

    function index(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('student_number', 'Student_number', 'trim|required|xss_clean');
        $this->form_validation->set_rules('degree_program', 'Degree_program', 'trim|required|min_length[4]|xss_clean');
        $this->form_validation->set_rules('classification', 'Classification', 'trim|required|xss_clean');
        $this->form_validation->set_rules('books_borrowed', 'Books_borrowed', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
        $this->form_validation->set_rules('first_name', 'First_name', 'required|min_length[2]|xss_clean');
        $this->form_validation->set_rules('middle_name', 'Middle_name', 'required|min_length[1]|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last_name', 'required|min_length[1]|xss_clean');
        $this->form_validation->set_rules('gender', 'Gender', 'required|min_length[4]|xss_clean');
        $this->form_validation->set_rules('birth_date', 'Birth_date', 'required|xss_clean');
        $this->form_validation->set_rules('employee_number', 'Employee_number', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE){
            $this->load->view('signup_view');
        }
    }

    function insert_info(){
       if($_POST["vercode"] != $_SESSION["security_code"] OR $_SESSION["security_code"]=='') {
            $this->load->view("code_fail");
        }
        else {
            $this->signup_model->insert_data();

            $email_config = Array(
                'protocol'  => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'ics.elib.admistrator@gmail.com',
                'smtp_pass' => 'icselibadmin'
            );

            $this->load->library('email', $email_config);
            $this->email->set_newline("\r\n");
            $this->email->set_mailtype('html');

            $message=$this->load->view('request_email', '', TRUE);
            $this->email->from('ics.elib.administrator@gmail.com', 'ICS e-lib Admistrator');
            $this->email->to($this->input->post('email'));
            $this->email->subject('ICS eLib Account Request Waiting for Approval');
            $this->email->message($message);

            if( $this->email->send()){
                $result = $this->signup_model->fetch_data();
                $this->load->view('success_view', $result);
            }
            else{
                show_error($this->email->print_debugger());
            }
        }
    }

    function checkAvailEmail(){
        $this->signup_model->checkAvailEmail();
    }

    function checkAvailsNumber(){
        $this->signup_model->checkAvailsNumber();
    }
}

?>