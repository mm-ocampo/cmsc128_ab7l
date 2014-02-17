<?php

?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function fetch_data(){
        $this->db->query("INSERT * INTO `user`(`email`, `student_number`, `degree_program`,
                                                    `classification`, `books_borrowed`, `password`, `first_name`,
                                                    `middle_name`, `last_name`, `sex`, `birth_date`, `employee_number`,
                                                    `is_student`, `is_faculty`)
                                        VALUES (" . $_POST['email'] . "," . $_POST['student_number'] . "," . $_POST['degree_program'] .
                                                    "," . $_POST['classification'] . "," . $_POST['books_borrowed'] . ","
                                                    . $_POST['password'] . "," . $_POST['first_name'] . "," .
                                                     $_POST['middle_name'] . "," . $_POST['last_name'] . "," . $_POST['sex']
                                                    . "," . $_POST['birth_date'] . "," . $_POST['employee_number'] . ","
                                                    . $_POST['class'] . "," . $_POST['class'] . ")" );

        $result = $this->db->query("select * from user where email=" . $_POST['email'])->result();

        return $result;
    }
}
?>