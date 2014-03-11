<?php

	class Notification_model extends CI_Model{

		public function __construct(){

			$this->load->database();

		}

		public function get_notifications(){

			$email = $this->session->userdata('email');

			$query = $this->db->query("SELECT COUNT(*) num FROM borrows where email='$email' AND date_borrowed='0000-00-00'");
			$count = 0;

			foreach ($query->result() as $row):
				$count = $row->num;
			endforeach;

			echo "Notifications ($count)";

		}


	}
?>