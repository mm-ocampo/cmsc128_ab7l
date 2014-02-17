<?php
/**
 * Created by PhpStorm.
 * User: Jr Pichon Bautista
 * Date: 1/19/14
 * Time: 3:35 PM
 */
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {


    function __construct(){
        parent::__construct();
        $this->load->model('signup_model');
    }

    function index()
    {
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
        $this->form_validation->set_rules('sex', 'Sex', 'required|min_length[4]|xss_clean');
        $this->form_validation->set_rules('birth_date', 'Birth_date', 'required|xss_clean');
        $this->form_validation->set_rules('employee_number', 'Employee_number', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('signup_view');
        }
        else
        {
            $this->load->view('success_view');
        }
    }

    /*function check_database($password)
    {
        //Field validation succeeded.&nbsp; Validate against database
        $student_number = $this->input->post('student_number');

        //query the database
        $result = $this->user->login($student_number, $password);

        if($result)
        {
            $sess_array = array();
            foreach($result as $row)
            {
                $sess_array = array(
                    'id' => $row->id,
                    'student_number' => $row->username
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }*/

    function insert_info(){
        $this->signup_model->insert_data();

        $result = $this->signup_model->fetch_data();
        $this->load->view('success_view', $result);

    }
}

?>