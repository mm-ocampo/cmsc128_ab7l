<?php

?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_account_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_accounts($operation){
        $query = "SELECT last_name, first_name, middle_name, email, student_number, employee_number, is_student, degree_program, status FROM user";

        $result = $this->db->query($query)->result();
        $result["operation"] = $operation;
        //var_dump($result);
        return $result;
    }

    public function approve_account(){
        $query = "UPDATE user SET status='Active' WHERE email='" . $this->input->post('approve') . "'";

        $this->db->query($query);

        header("Location:../");
    }

    public function deactivate_account(){
        $query = "UPDATE user SET status='Deactivated' WHERE email='" . $this->input->post('deactivate') . "'";

        $this->db->query($query);

        header("Location:../");
    }

    public function delete_account(){
        $query = "DELETE FROM user WHERE email='" . $this->input->post('delete') . "'";

        $this->db->query($query);
        header("Location:../");
    }

    public function activate_account(){
        $query = "UPDATE user SET status='Active' WHERE email='" . $this->input->post('activate') . "'";

        $this->db->query($query);
        header("Location:../");
    }
}