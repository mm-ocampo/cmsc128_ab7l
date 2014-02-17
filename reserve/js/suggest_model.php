<?php

	class Suggest_model extends CI_Model{

		public function __construct(){

			$this->load->database();

		}

		/*
		*	Gumagawa lang to ng string. Yung string na yun ay yung query. Tapos irereturn yung result ng query.
		*/
		public function suggest(){

			if($this->input->post("search_query")){

				$search_query = $this->input->post("search_query");
				$filter = $this->input->post("filter");

				$pstmt = "SELECT * FROM material WHERE ";

				switch($filter){
					
					case "title":			$pstmt = $pstmt."title REGEXP '.*[[:punct:]|[:space:]]{$search_query}[[:punct:]|[:space:]].*' OR title REGEXP '.*[[:punct:]|[:space:]]$search_query' OR title REGEXP '{$search_query}[[:punct:]|[:space:]].*' OR title='$search_query'";
											
											break;
					case "publisher":		$pstmt = $pstmt."publisher REGEXP '.*[[:punct:]|[:space:]]{$search_query}[[:punct:]|[:space:]].*' OR publisher REGEXP '.*[[:punct:]|[:space:]]$search_query' OR publisher REGEXP '{$search_query}[[:punct:]|[:space:]].*' OR publisher='$search_query'";
											
											break;
					case "author":			$pstmt = $pstmt."author REGEXP '.*[[:punct:]|[:space:]]{$search_query}[[:punct:]|[:space:]].*' OR author REGEXP '.*[[:punct:]|[:space:]]$search_query' OR author REGEXP '{$search_query}[[:punct:]|[:space:]].*' OR author='$search_query'";
											
											break;
					case "subject":			$pstmt = $pstmt."AND subject='$search_query'";
											break;
					case "accession_number":$pstmt = $pstmt."AND material.accession_number = '$search_query'";
											break;

					default:				return "error";
					
				}

			}

			$query = $this->db->query($pstmt);
			echo $pstmt;

		}

	}

?>