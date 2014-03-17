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

			$query = $this->db->query("SELECT date_borrowed num FROM borrows where email='$email'");
			$count = 0;

			foreach ($query->result() as $row):
				$stat = (strtotime("".date("Y-m-d")." 00:00:00") - strtotime($row->num))/ 86400;
				if($row->num == '0000-00-00 00:00:00'){
					$count = $count++;
					echo "Pakshet ka, kunin mo libro mo dito";
				}
				if($stat>=3 && $type=="student"){
					$count = $count++;
					echo "Pakshet ka, sauli mo libro namen dito";
				}
			endforeach;

		}


	}
?>