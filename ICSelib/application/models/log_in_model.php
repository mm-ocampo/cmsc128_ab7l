<?php

	class Log_in_model extends CI_Model{

		public function __construct(){

			$this->load->database();

		}

		public function login_user(){

			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$count = 0;

			$pstmt = "SELECT * FROM user WHERE email='$email' AND password= '". sha1($password) . "' AND status='Active'";
			$query = $this->db->query($pstmt);

			foreach ($query->result() as $row):
				$count++;
				$name = $row->first_name;	
			endforeach;

			if($count == 1){

				$newdata = array(
					'type'  => "user",
                	'email' => $email,
                	'name'  => $name
            	);
				$this->session->set_userdata($newdata);

			}

		}

		public function login_admin(){

			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$count = 0;

			$pstmt = "SELECT * FROM admin WHERE email='$email' AND password='". sha1($password) . "'";
            $query = $this->db->query($pstmt);

			foreach ($query->result() as $row):
				$count++;
				$name = $row->first_name;	
			endforeach;

			if($count == 1){

				$newdata = array(
					'type'  => "admin",
                	'email' => $email,
                	'name'  => $name
            	);
				$this->session->set_userdata($newdata);

			}

		}

		function checkEmail(){
            $email = $this->input->get('email');

            $query = "SELECT * FROM user WHERE email='$email' and status='Active'";

            $result = $this->db->query($query);

            $count = 0;
            foreach($result->result() as $i){
                $count++;
            }
            if($count < 1)

            $query = "SELECT * FROM admin WHERE email='$email'";

            $result = $this->db->query($query);

            $count = 0;
            foreach($result->result() as $i){
                $count++;
            }

            if($count < 1 && $email != "")
                echo 'Invalid email/password.';
        }

	}
?>