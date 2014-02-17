<?php
?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_account extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('manage_account_model');
    }

    function index(){
        $result = $this->manage_account_model->get_accounts();

        $this->load->view('manage_account_view', array("result" => $result));
    }

    public function manipulate_account(){
        if(isset($_POST["approve"])){
            $this->manage_account_model->approve_account();
        }
        else if(isset($_POST["deactivate"])){
            $this->manage_account_model->deactivate_account();
        }
        else if(isset($_POST["delete"])){
            $this->manage_account_model->delete_account();
        }
        else if(isset($_POST["activate"])){
            $this->manage_account_model->activate_account();
        }
    }
}