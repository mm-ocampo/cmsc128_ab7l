<?php

	class Notification_model extends CI_Model{

		public function __construct(){

			$this->load->database();

		}

		public function get_notifications(){

			$email = $this->session->userdata('email');
			$type = $this->session->userdata('type');

			$query = $this->db->query("SELECT date_borrowed num FROM borrows where email='$email'");
			$count = 0;

			foreach ($query->result() as $row):
				$stat = (strtotime("".date("Y-m-d")." 00:00:00") - strtotime($row->num))/ 86400;
				if($row->num == '0000-00-00 00:00:00'){
					$count++;
				}
				if($stat>=3 && $type=="student")	$count++;
			endforeach;

			return "Notifications ($count)";

		}

		public function get_notifications_ajax(){

			$email = $this->session->userdata('email');
			$type = $this->session->userdata('type');

			$query = $this->db->query("SELECT date_borrowed num FROM borrows where email='$email'");
			$count = 0;

			foreach ($query->result() as $row):
				$stat = (strtotime("".date("Y-m-d")." 00:00:00") - strtotime($row->num))/ 86400;
				if($row->num == '0000-00-00 00:00:00')	$count++;
				if($stat>=3 && $type=="student")	$count++;
			endforeach;

			echo "Notifications ($count)";

		}

		public function print_notifications(){

			$email = $this->session->userdata('email');
			$type = $this->session->userdata('type');

			$query = $this->db->query("SELECT title,date_borrowed num FROM borrows left join material on borrows.accession_number = material.accession_number where email='$email'");
			$count = 0;

			foreach ($query->result() as $row):
				$stat = (strtotime("".date("Y-m-d")." 00:00:00") - strtotime($row->num))/ 86400;
				if($row->num == '0000-00-00 00:00:00'){
					$count = $count++;
					echo $row->title . " is now ready for pickup.";
				}
				if($stat>=3 && $type=="student"){
					$count = $count++;
					echo $row->title . " you borrowed is already due. Please return it immediately";
				}
			endforeach;

		}


	}
?>