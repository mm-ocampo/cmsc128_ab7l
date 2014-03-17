<?php

	class Statistics_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function get_statistics(){
			
			$query = $this->db->query("SELECT * FROM material WHERE type='book' ORDER BY borrow_count DESC LIMIT 10");

			return $query->result();

		}

		public function get_most_bookmark(){
			
			$query = $this->db->query("SELECT * FROM material ORDER BY bookmark_count DESC LIMIT 10");

			return $query->result();

		}

	}
?>