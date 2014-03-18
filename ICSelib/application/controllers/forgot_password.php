<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Forgot_password extends CI_Controller {

    function Forgot_password(){
        parent::__construct();
        $this->load->model('forgot_password_model');
    }
	
	public function create_password() {
		if($_POST["vercode"] != $_SESSION["security_code"] OR $_SESSION["security_code"]=='') {
			$this->load->view('code_password_fail');
		}
		else {
			$this->forgot_password_model->update_data();
		
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

			$message=$this->load->view('password_email', '', TRUE);
			$this->email->from('ics.elib.administrator@gmail.com', 'ICS e-lib Admistrator');
			$this->email->to($this->input->post('email'));
			$this->email->subject('ICS eLib Reset Password Request');
			$this->email->message($message);

			if( $this->email->send()){
				$result = $this->forgot_password_model->fetch_data();
				$this->load->view('reset_code_success', $result);
			}
			else{
				show_error($this->email->print_debugger());
			}
		}
		
	}
	
	public function checkEmailExist() {
		$this->forgot_password_model->checkEmailExist();
	}
	
}