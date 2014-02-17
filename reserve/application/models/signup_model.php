<?php

?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function fetch_data(){
        $result = $this->db->query("select * from user")->result();

        return $result;
    }

    function insert_data(){
        $this->load->database();

        if($this->input->post('type') == 'Student'){
            $is_student = 1;
            $is_faculty = 0;
            $student_number = $this->input->post('student_number');
            $employee_number = 0;
        }
        else if($this->input->post('type') == 'Faculty'){
            $is_student = 1;
            $is_faculty = 0;
            $student_number = 0;
            $employee_number = $this->input->post('employee_number');
        }

        switch($this->input->post('classification')){
            case 'freshman':
                $classification = 'FM';
                break;
            case 'sophomore':
                $classification = 'SO';
                break;
            case 'junior':
                $classification = 'JR';
                break;
            case 'senior':
                $classification = 'SR';
                break;
            case 'graduate':
                $classification = 'GR   ';
                break;
        }

        $date = str_replace('/', '-', $this->input->post('birthday'));
        $birthday = date('Y-m-d', strtotime($date));
        echo $birthday;

        $this->db->query("INSERT INTO user(email,
                                           student_number,
                                           degree_program,
                                           classification,
                                           password,
                                           first_name,
                                           middle_name,
                                           last_name,
                                           sex,
                                           birth_date,
                                           employee_number,
                                           is_student,
                                           is_faculty)
                                    VALUES ('" . $this->input->post('email') . "','" .
                                           $student_number . "','" .
                                           $this->input->post('degree_program') . "','" .
                                           $classification . "','" .
                                           $this->input->post('password') . "','" .
                                           $this->input->post('first_name') . "','" .
                                           $this->input->post('middle_name') . "','" .
                                           $this->input->post('last_name') . "','" .
                                           $this->input->post('sex') . "','" .
                                           $birthday . "'," .
                                           $employee_number . "," .
                                           $is_student . "," .
                                           $is_faculty . ");"
        );
    }
}
?>