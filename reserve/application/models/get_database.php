<?php

	class Get_database extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function search(){
			$search_query = $this->input->post('search_query');
			$filter = $this->input->post('filter');
			$sort = $this->input->post('sort');
			$format = $this->input->post('format');
			$count = count($format);

			$search_query = preg_replace('#[,?!.$=_-]#', ' ', $search_query);
			$size = strlen($search_query);

			$pstmt = "SELECT title,publisher,accession_number FROM material";

			$pstmt = $pstmt." WHERE (type='$format[0]'";

			for($i=1; $i < $count; $i++){
			  $pstmt = $pstmt."OR type='$format[$i]' ";			  
			}
					
			switch($filter){
				case "title":			if($size < 3)	$pstmt = $pstmt.") AND (title LIKE '% $search_query %' OR title LIKE '% $search_query' OR title LIKE '$search_query %' OR title='$search_query')";
										else 			$pstmt = $pstmt.") AND match(title) against ('$search_query' in boolean mode) ";
										break;
				case "publisher":		if($size < 3)	$pstmt = $pstmt.") AND (publisher LIKE '% $search_query %' OR publisher LIKE '% $search_query' OR publisher LIKE '$search_query %' OR publisher='$search_query')";
										else 			$pstmt = $pstmt.") AND match(publisher) against ('$search_query' in boolean mode) ";
										break;
				case "author":			if($size < 3)	$pstmt = $pstmt.") AND (author LIKE '% $search_query %' OR author LIKE '% $search_query' OR author LIKE '$search_query %' OR author='$search_query')";
										else 			$pstmt = $pstmt.") AND match(author) against ('$search_query' in boolean mode) ";
										break;
				case "subject":			$pstmt = $pstmt.") AND subject='$search_query'";
										break;
			}
					
			switch($sort){
				case "alphabetical":		$pstmt = $pstmt." ORDER BY title LIMIT 0,10";
											break;
				case "availability":		

											break;
			}

			$query = $this->db->query($pstmt);

			return $query->result();
		}

		public function search_by_page(){
			$search_query = $this->input->get('q');
			$filter = $this->input->get('f');
			$sort = $this->input->get('s');
			$format = $this->input->get('format');
			$count = count($format);
			$page_number = $this->input->get('page_number');

			$start = ($page_number - 1) * 10 ;
			$pstmt = "SELECT title,publisher,accession_number FROM material";
			$pstmt = $pstmt." WHERE (type='$format[0]'";

			for($i=1; $i < $count; $i++){
			  $pstmt = $pstmt."OR type='$format[$i]' ";			  
			}
					
			switch($filter){
				case "title":			if($size < 3)	$pstmt = $pstmt.") AND (title LIKE '% $search_query %' OR title LIKE '% $search_query' OR title LIKE '$search_query %' OR title='$search_query')";
										else 			$pstmt = $pstmt.") AND match(title) against ('+$string' in boolean mode) ";
										break;
				case "publisher":		if($size < 3)	$pstmt = $pstmt.") AND (publisher LIKE '% $search_query %' OR publisher LIKE '% $search_query' OR publisher LIKE '$search_query %' OR publisher='$search_query')";
										else 			$pstmt = $pstmt.") AND match(publisher) against ('$string' in boolean mode) ";
										break;
				case "author":			if($size < 3)	$pstmt = $pstmt.") AND (author LIKE '% $search_query %' OR author LIKE '% $search_query' OR author LIKE '$search_query %' OR author='$search_query')";
										else 			$pstmt = $pstmt.") AND match(author) against ('$string' in boolean mode) ";
										break;
				case "subject":			$pstmt = $pstmt.") AND subject='$search_query'";
										break;
			}
					
			switch($sort){
				case "alphabetical":		$pstmt = $pstmt." ORDER BY title LIMIT $start,10";
											break;
				case "availability":		

											break;
			}

			$query = $this->db->query($pstmt);

			return $query->result();
		}

		public function count_results(){
			if($this->input->post('search_query')){
				$search_query = $this->input->post('search_query');
				$filter = $this->input->post('filter');
				$sort = $this->input->post('sort');
				$format = $this->input->post('format');
			}
			else{
				$search_query = $this->input->get('q');
				$filter = $this->input->get('f');
				$sort = $this->input->get('s');
				$format = $this->input->get('format');
			}

			$pstmt = "SELECT COUNT(title) result_count FROM material";

			$pstmt = $pstmt." WHERE type='$format[0]'";
					
			switch($filter){
				case "title":			$pstmt = $pstmt." AND title LIKE '% $search_query %' OR title LIKE '% $search_query' OR title LIKE '$search_query %'";
										break;
				case "publisher":		$pstmt = $pstmt." AND publisher LIKE '% $search_query %' OR publisher LIKE '% $search_query' OR publisher LIKE '$search_query %'";
										break;
				case "author":			$pstmt = $pstmt." AND author LIKE '% $search_query %' OR author LIKE '% $search_query' OR author LIKE '$search_query %'";
										break;
				case "subject":			$pstmt = $pstmt." AND subject='$search_query'";
										break;
					
			}

			$query = $this->db->query($pstmt);

			return $query->result();
		}

		public function get_user_details($email){
			$data = current($this->db->get_where('user',Array('email'=>$email))->result_array());
			
			return $data;
		}

		public function get_book_details($accession_number){
			$statement = "SELECT accession_number, publisher, type, title, copyright_year FROM material where accession_number=\"$accession_number\" ";
			$query = $this->db->query($statement);

			return $query->result();
		}

		public function get_book_author($accession_number){
			$statement = "SELECT * FROM material_author where accession_number=\"$accession_number\"";
			$query = $this->db->query($statement);

			return $query->result();
		}

		public function update_book_model($accession_number,$data){  
            $this->db->where('accession_number', $accession_number);
            $this->db->update('material',$data);
	    }

	    public function update_book_author($accession_number,$data2){  
            $this->db->where('accession_number', $accession_number);
            $this->db->delete('material_author');
            foreach ($data2 as $temp) {
                $statement =" INSERT into material_author values (\"$accession_number\", \"$temp\") ";
                $this->db->query($statement);
            }
	    }

	    public function update_user_details($email,$data){
			$this->db->where('email',$email);
			if(!$this->db->update('user',$data)){
				return -1;
			}else{
				return 1;
			}
		}

	}
?>