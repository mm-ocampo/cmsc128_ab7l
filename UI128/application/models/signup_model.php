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

        $date = str_replace('/', '-', $this->input->post('birthday'));
        $birthday = date('Y-m-d', strtotime($date));

        echo "type: " . $this->input->post('type');
        if($this->input->post('type') == 'Student'){

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

            echo "INSERT INTO user(email,
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
                                            $this->input->post('password') . "','" .
                                            $this->input->post('first_name') . "','" .
                                            $this->input->post('middle_name') . "','" .
                                            $this->input->post('last_name') . "','" .
                                            $this->input->post('sex') . "','" .
                                            $birthday . "'," .
                                            1 . "," .
                                            0 . ");"
            ;
        }
        else{
            echo "INSERT INTO user(email,
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
                                            $this->input->post('sex') . "','" .
                                            $birthday . "','" .
                                            $this->input->post('employee_number') . "'," .
                                            0 . "," .
                                            1 . ");"
            ;
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
}
?>