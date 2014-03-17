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

        $date = str_replace('/', '-', $this->input->post('birthday'));
        $birthday = date('Y-m-d', strtotime($date));

        if($this->input->post('type') == 'Student'){

            switch($this->input->post('classification')){
                case 'Freshman':
                    $classification = 'FM';
                    break;
                case 'Sophomore':
                    $classification = 'SO';
                    break;
                case 'Junior':
                    $classification = 'JR';
                    break;
                case 'Senior':
                    $classification = 'SR';
                    break;
                case 'Graduate':
                    $classification = 'GR   ';
                    break;
            }

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
                                           is_student,
                                           is_faculty)
                                VALUES ('" . $this->input->post('email') . "','" .
                                            $this->input->post('student_number') . "','" .
                                            $this->input->post('degree_program') . "','" .
                                            $classification . "','" .
                                            sha1($this->input->post('password')) . "','" .
                                            $this->input->post('first_name') . "','" .
                                            $this->input->post('middle_name') . "','" .
                                            $this->input->post('last_name') . "','" .
                                            $this->input->post('gender') . "','" .
                                            $birthday . "'," .
                                            1 . "," .
                                            0 . ");");
        }
        else if($this->input->post('type') == 'Faculty'){
            $this->db->query("INSERT INTO user(email,
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
                                            $this->input->post('password') . "','" .
                                            $this->input->post('first_name') . "','" .
                                            $this->input->post('middle_name') . "','" .
                                            $this->input->post('last_name') . "','" .
                                            $this->input->post('gender') . "','" .
                                            $birthday . "','" .
                                            $this->input->post('employee_number') . "'," .
                                            0 . "," .
                                            1 . ");");
        }

    }

    function checkAvailEmail(){
        $email = $this->input->get('email');

        $query = "SELECT * FROM user WHERE email='$email'";

        $result = $this->db->query($query);

        $count = 0;
        foreach($result->result() as $i){
            $count++;
        }
        if($count < 1)
            echo 'Email is available.';
        else if($count >= 0)
            echo 'Email has already been used.';
    }

    function checkAvailsNumber(){
        $student_number = $this->input->get('student_number');

        $query = "SELECT * FROM user WHERE student_number='$student_number'";

        $result = $this->db->query($query);

        $count = 0;
        foreach($result->result() as $i){
            $count++;
        }
        if($count < 1)
            echo 'Student Number is available.';
        else if($count >= 0)
            echo 'Student Number has already been used.';
    }
}
?>