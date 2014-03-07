<?php
?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_account extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('manage_account_model');
    }

    function index(){

    }

    public function manipulate_account(){
        //construct mailer
        $email_config = Array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'ics.elib.admistrator@gmail.com',
            'smtp_pass' => 'icselibadmin'
        );

        $user_email = $_POST["email"];

        if(isset($_POST["approve"])){
            $this->load->library('email', $email_config);
            $this->email->set_newline("\r\n");
            $this->email->set_mailtype('html');

            $message=$this->load->view('approved_email', '', TRUE);
            $this->email->from('ics.elib.administrator@gmail.com', 'ICS e-lib Admistrator');
            $this->email->to($user_email);
            $this->email->subject('ICS eLib Account Request Approved');
            $this->email->message($message);

            if( $this->email->send()){
                $this->manage_account_model->approve_account();
            }
            else{
                show_error($this->email->print_debugger());
            }
        }

        else if(isset($_POST["deactivate"])){
            $this->load->library('email', $email_config);
            $this->email->set_newline("\r\n");
            $this->email->set_mailtype('html');

            $message=$this->load->view('deactivate_email', '', TRUE);
            $this->email->from('ics.elib.administrator@gmail.com', 'ICS e-lib Admistrator');
            $this->email->to($user_email);
            $this->email->subject('ICS eLib Account Deactivation');
            $this->email->message($message);

            if( $this->email->send()){
                $this->manage_account_model->deactivate_account();
            }
            else{
                show_error($this->email->print_debugger());
            }

        }
        else if(isset($_POST["delete"])){
            $this->load->library('email', $email_config);
            $this->email->set_newline("\r\n");
            $this->email->set_mailtype('html');

            $message=$this->load->view('delete_email', '', TRUE);
            $this->email->from('ics.elib.administrator@gmail.com', 'ICS e-lib Admistrator');
            $this->email->to($user_email);
            $this->email->subject('ICS eLib Account Deleted');
            $this->email->message($message);

            if( $this->email->send()){
                $this->manage_account_model->delete_account();
            }
            else{
                show_error($this->email->print_debugger());
            }
        }
        else if(isset($_POST["activate"])){
            $this->load->library('email', $email_config);
            $this->email->set_newline("\r\n");
            $this->email->set_mailtype('html');

            $message=$this->load->view('activate_email', '', TRUE);
            $this->email->from('ics.elib.administrator@gmail.com', 'ICS e-lib Admistrator');
            $this->email->to($user_email);
            $this->email->subject('ICS eLib Account Activation');
            $this->email->message($message);

            if( $this->email->send()){
                $this->manage_account_model->activate_account();
            }
            else{
                show_error($this->email->print_debugger());
            }
        }
    }
}