<?php

	class Get_database extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function search_details($search){

			$array = array();
			$i = 0;

			foreach ($search as $row) {
				
				if($this->session->userdata('type')=="user"){

					$query = $this->db->query("SELECT material.accession_number,status,borrows.email bemail,reserves.email remail FROM material LEFT JOIN reserves ON material.accession_number=reserves.accession_number LEFT JOIN borrows ON material.accession_number=borrows.accession_number where title='$row->title'");
					$query = $query->result();
					for($j=0;$j<count($query);$j++){
						
						if($query[$j]->status=="available" && ($query[$j]->bemail==NULL || $query[$j]->remail==NULL)){	
							$array[$i] = $query[$j]->accession_number;
							break;
						}

						if($query[$j]->status!="available" && $j==count($query)-1 && ($query[$j]->bemail!=NULL || $query[$j]->remail!=NULL)){
							$array[$i] = $query[0]->accession_number;
							break;
						}
					
					}

				}

				else{

					$query = $this->db->query("SELECT accession_number from material where title='$row->title'");
					$query = $query->result();
					$array[$i] = $query[0]->accession_number;

				}

				$i++;

			}

			return $array;

		}

		public function search(){
			$search_query = $this->input->get('search_query');
			$filter = $this->input->get('filter');
			$sort = $this->input->get('sort');
			$format = $this->input->get('format');

			$count = count($format);

			if($this->input->get('page_number'))	$page_number = $this->input->get('page_number');
			else $page_number = 1;

			$start = ($page_number - 1) * 10 ;

			$search_query = mysql_real_escape_string ($search_query);

			$search_query = ucfirst($search_query);
			$size = strlen($search_query);

			if($size <= 3){

				

			}

			else if($filter=="title"||$filter=="publisher"||$filter=="author"){

				$search_query = str_replace("-"," ",$search_query);
				$search_query = str_replace("~"," ",$search_query);

			}


			$pstmt = "SELECT distinct title,publisher,copyright_year,type,subject,bookmark_count,borrow_count,abstract FROM material LEFT JOIN material_author ON material.accession_number=material_author.accession_number";

			$pstmt = $pstmt." WHERE (type='$format[0]'";

			for($i=1; $i < $count; $i++)
			{
			  $pstmt = $pstmt."OR type='$format[$i]' ";			  
			}
					
			switch($filter){
					
				case "topic":			if($size <= 3)	$pstmt = $pstmt.") AND material.accession_number IN (SELECT accession_number FROM topic WHERE tag LIKE '%{$search_query}%')";
											else 			$pstmt = $pstmt.") AND material.accession_number IN (SELECT accession_number FROM topic WHERE match(tag) against ('+$search_query' in boolean mode)) ";
											break;

					case "title":			if($size <= 3)	$pstmt = $pstmt.") AND (title LIKE '%{$search_query}%')";
											else 			$pstmt = $pstmt.") AND match(title) against ('+$search_query' in boolean mode) ";
											break;
					case "publisher":		if($size <= 3)	$pstmt = $pstmt.") AND (publisher LIKE '%{$search_query}%')";
											else 			$pstmt = $pstmt.") AND match(publisher) against ('+$search_query' in boolean mode) ";
											break;
					case "author":			if($size <= 3)	$pstmt = $pstmt.") AND (author LIKE '%{$search_query}%')";
											else 			$pstmt = $pstmt.") AND match(author) against ('+$search_query' in boolean mode) ";
											break;
					case "subject":			$pstmt = $pstmt.") AND subject='$search_query'";
											break;
					case "year":			$pstmt = $pstmt.") AND copyright_year='$search_query'";
											break;

					case "accession_number":$pstmt = $pstmt.") AND material.accession_number = '$search_query'";
											break;

					default:				return "error";
					
			}
					
			$pstmt = $pstmt . " LIMIT $start,10";

			$query = $this->db->query($pstmt);

			return $query->result();

		}

		public function advanced_search(){

			$search_query1 = $this->input->get('search_query1');
			$search_query2 = $this->input->get('search_query2');
			$search_query3 = $this->input->get('search_query3');

			$filter1 = $this->input->get('filter1');
			$filter2 = $this->input->get('filter2');
			$filter3 = $this->input->get('filter3');

			$boolean1 = $this->input->get('boolean1');
			$boolean2 = $this->input->get('boolean2');

			$format = $this->input->get('format');

			$count = count($format);

			if($this->input->get('page_number'))	$page_number = $this->input->get('page_number');
			else $page_number = 1;

			$start = ($page_number - 1) * 10 ;

			$search_query1 = mysql_real_escape_string ($search_query1);
			$search_query2 = mysql_real_escape_string ($search_query2);
			$search_query3 = mysql_real_escape_string ($search_query3);

			$size1 = strlen($search_query1);
			$size2 = strlen($search_query2);
			$size3 = strlen($search_query3);

			if($size1 <= 3){
				
			}

			else if($filter1=="title"||$filter1=="publisher"||$filter1=="author"){

				$search_query1 = str_replace("-"," ",$search_query1);
				$search_query1 = str_replace("~"," ",$search_query1);
				
				$search_query1 = "\"" . $search_query1 . "\"";
				$search_query1 = str_replace(" ","\" \"",$search_query1);

			}

			if($size2 <= 3){

			}

			else if($filter2=="title"||$filter2=="publisher"||$filter2=="author"){

				$search_query2 = str_replace("-"," ",$search_query2);
				$search_query2 = str_replace("~"," ",$search_query2);
				
				$search_query2 = "\"" . $search_query2 . "\"";
				$search_query2 = str_replace(" ","\" \"",$search_query2);

			}

			if($size3 <= 3){

			}

			else if($filter3=="title"||$filter3=="publisher"||$filter3=="author"){

				$search_query3 = str_replace("-"," ",$search_query3);
				$search_query3 = str_replace("~"," ",$search_query3);
				
				$search_query3 = "\"" . $search_query3 . "\"";
				$search_query3 = str_replace(" ","\" \"",$search_query3);

			}

            $pstmt = "SELECT distinct title,publisher,copyright_year,type,subject,bookmark_count,borrow_count,abstract FROM material LEFT JOIN material_author ON material.accession_number=material_author.accession_number";

			$pstmt = $pstmt." WHERE (type='$format[0]'";

			for($i=1; $i < $count; $i++)
			{
			  $pstmt = $pstmt."OR type='$format[$i]' ";			  
			}

			$pstmt = $pstmt . ")";

			if($search_query1!=""){
					
				switch($filter1){
						
					case "topic":			if($size1 <= 3)	$pstmt = $pstmt." AND material.accession_number IN (SELECT accession_number FROM topic WHERE tag LIKE '%{$search_query1}%')";
											else 			$pstmt = $pstmt." AND material.accession_number IN (SELECT accession_number FROM topic WHERE match(tag) against ('+$search_query1' in boolean mode)) ";
											break;

					case "title":			if($size1 <= 3)	$pstmt = $pstmt." AND (title LIKE '%{$search_query1}%')";
											else 			$pstmt = $pstmt." AND match(title) against ('+$search_query1' in boolean mode) ";
											break;
					case "publisher":		if($size1 <= 3)	$pstmt = $pstmt." AND (publisher LIKE '%{$search_query1}%')";
											else 			$pstmt = $pstmt." AND match(publisher) against ('+$search_query1' in boolean mode) ";
											break;
					case "author":			if($size1 <= 3)	$pstmt = $pstmt." AND (author LIKE '%{$search_query1}%')";
											else 			$pstmt = $pstmt." AND match(author) against ('+$search_query1' in boolean mode) ";
											break;
					case "subject":			$pstmt = $pstmt." AND subject='$search_query1'";
											break;
					case "year":			$pstmt = $pstmt." AND copyright_year='$search_query1'";
											break;

					case "accession_number":$pstmt = $pstmt." AND material.accession_number = '$search_query1'";
											break;

					default:				return "error";
						
				}

			}

			if($search_query2!=""){

				if($boolean1=="and" || $search_query1=="")	$pstmt = $pstmt." AND ";	
				else					$pstmt = $pstmt." OR ";

				switch($filter2){

					case "topic":			if($size2 <= 3)	$pstmt = $pstmt." material.accession_number IN (SELECT accession_number FROM topic WHERE tag LIKE '%{$search_query2}%')";
											else 			$pstmt = $pstmt." material.accession_number IN (SELECT accession_number FROM topic WHERE match(tag) against ('+$search_query2' in boolean mode)) ";
											break;

					case "title":			if($size2 <= 3)	$pstmt = $pstmt." (title LIKE '%{$search_query2}%')";
											else 			$pstmt = $pstmt." match(title) against ('+$search_query2' in boolean mode) ";
											break;
					case "publisher":		if($size2 <= 3)	$pstmt = $pstmt." (publisher LIKE '%{$search_query2}%')";
											else 			$pstmt = $pstmt." match(publisher) against ('+$search_query2' in boolean mode) ";
											break;
					case "author":			if($size2 <= 3)	$pstmt = $pstmt." (author LIKE '%{$search_query2}%')";
											else 			$pstmt = $pstmt." match(author) against ('+$search_query2' in boolean mode) ";
											break;
					case "subject":			$pstmt = $pstmt." subject='$search_query2'";
											break;
					case "year":			$pstmt = $pstmt." copyright_year='$search_query2'";
											break;

					case "accession_number":$pstmt = $pstmt." material.accession_number = '$search_query2'";
											break;

					default:				return "error";
						
				}

			}

			if($search_query3!=""){

				if($boolean2=="and" || ($search_query1=="" && $search_query2==""))	$pstmt = $pstmt." AND ";	
				else					$pstmt = $pstmt." OR ";

				switch($filter3){
						
					case "topic":			if($size3 <= 3)	$pstmt = $pstmt." material.accession_number IN (SELECT accession_number FROM topic WHERE tag LIKE '%{$search_query3}%')";
											else 			$pstmt = $pstmt." material.accession_number IN (SELECT accession_number FROM topic WHERE match(tag) against ('+$search_query3' in boolean mode)) ";
											break;

					case "title":			if($size3 <= 3)	$pstmt = $pstmt." (title LIKE '%{$search_query3}%')";
											else 			$pstmt = $pstmt." match(title) against ('+$search_query3' in boolean mode) ";
											break;
					case "publisher":		if($size3 <= 3)	$pstmt = $pstmt." (publisher LIKE '%{$search_query3}%')";
											else 			$pstmt = $pstmt." match(publisher) against ('+$search_query3' in boolean mode) ";
											break;
					case "author":			if($size3 <= 3)	$pstmt = $pstmt." (author LIKE '%{$search_query3}%')";
											else 			$pstmt = $pstmt." match(author) against ('+$search_query3' in boolean mode) ";
											break;
					case "subject":			$pstmt = $pstmt." subject='$search_query3'";
											break;
					case "year":			$pstmt = $pstmt." copyright_year='$search_query3'";
											break;

					case "accession_number":$pstmt = $pstmt." material.accession_number = '$search_query3'";
											break;

					default:				return "error";
						
				}

			}

			$pstmt = $pstmt." LIMIT $start,10";

			$query = $this->db->query($pstmt);

			return $query->result();

		}
	

		public function count_results(){

			$search_query = $this->input->get('search_query');
			$filter = $this->input->get('filter');
			$sort = $this->input->get('sort');
			$format = $this->input->get('format');

			$count = count($format);

			$search_query = mysql_real_escape_string ($search_query);

			$search_query = ucfirst($search_query);
			$size = strlen($search_query);

			if($size <= 3){

			}

			else if($filter=="title"||$filter=="publisher"||$filter=="author"){

				$search_query = str_replace("-"," ",$search_query);
				$search_query = str_replace("~"," ",$search_query);
				
				$search_query = "\"" . $search_query . "\"";
				$search_query = str_replace(" ","\" \"",$search_query);

			}

			$pstmt = "SELECT distinct COUNT(distinct title,publisher,copyright_year,type,subject,bookmark_count,borrow_count) result_count FROM material LEFT JOIN material_author ON material.accession_number = material_author.accession_number";

			$pstmt = $pstmt." WHERE (type='$format[0]'";

			for($i=1; $i < $count; $i++)
			{
			  $pstmt = $pstmt."OR type='$format[$i]'";			  
			}
					
			switch($filter){

				case "topic":			if($size <= 3)	$pstmt = $pstmt.") AND material.accession_number IN (SELECT accession_number FROM topic WHERE tag LIKE '%{$search_query}%')";
											else 			$pstmt = $pstmt.") AND material.accession_number IN (SELECT accession_number FROM topic WHERE match(tag) against ('+$search_query' in boolean mode)) ";
											break;

					case "title":			if($size <= 3)	$pstmt = $pstmt.") AND (title LIKE '%{$search_query}%')";
											else 			$pstmt = $pstmt.") AND match(title) against ('+$search_query' in boolean mode) ";
											break;
					case "publisher":		if($size <= 3)	$pstmt = $pstmt.") AND (publisher LIKE '%{$search_query}%')";
											else 			$pstmt = $pstmt.") AND match(publisher) against ('+$search_query' in boolean mode) ";
											break;
					case "author":			if($size <= 3)	$pstmt = $pstmt.") AND (author LIKE '%{$search_query}%')";
											else 			$pstmt = $pstmt.") AND match(author) against ('+$search_query' in boolean mode) ";
											break;
					case "subject":			$pstmt = $pstmt.") AND subject='$search_query'";
											break;
					case "year":			$pstmt = $pstmt.") AND copyright_year='$search_query'";
											break;

					case "accession_number":$pstmt = $pstmt.") AND material.accession_number = '$search_query'";
											break;

					default:				return "error";
					
			}

			$query = $this->db->query($pstmt);

			return $query->result();

		}

		public function advanced_count_results(){

			$search_query1 = $this->input->get('search_query1');
			$search_query2 = $this->input->get('search_query2');
			$search_query3 = $this->input->get('search_query3');

			$filter1 = $this->input->get('filter1');
			$filter2 = $this->input->get('filter2');
			$filter3 = $this->input->get('filter3');

			$boolean1 = $this->input->get('boolean1');
			$boolean2 = $this->input->get('boolean2');

			$format = $this->input->get('format');

			$count = count($format);

			$search_query1 = mysql_real_escape_string ($search_query1);
			$search_query2 = mysql_real_escape_string ($search_query2);
			$search_query3 = mysql_real_escape_string ($search_query3);

			$size1 = strlen($search_query1);
			$size2 = strlen($search_query2);
			$size3 = strlen($search_query3);

			if($size1 <= 3){

			}

			else if($filter1=="title"||$filter1=="publisher"||$filter1=="author"){

				$search_query1 = str_replace("-"," ",$search_query1);
				$search_query1 = str_replace("~"," ",$search_query1);
				
				$search_query1 = "\"" . $search_query1 . "\"";
				$search_query1 = str_replace(" ","\" \"",$search_query1);

			}

			if($size2 <= 3){

			}

			else if($filter2=="title"||$filter2=="publisher"||$filter2=="author"){

				$search_query2 = str_replace("-"," ",$search_query2);
				$search_query2 = str_replace("~"," ",$search_query2);
				
				$search_query2 = "\"" . $search_query2 . "\"";
				$search_query2 = str_replace(" ","\" \"",$search_query2);

			}

			if($size3 <= 3){

			}

			else if($filter3=="title"||$filter3=="publisher"||$filter3=="author"){

				$search_query3 = str_replace("-"," ",$search_query3);
				$search_query3 = str_replace("~"," ",$search_query3);
				
				$search_query3 = "\"" . $search_query3 . "\"";
				$search_query3 = str_replace(" ","\" \"",$search_query3);

			}

			$pstmt = "SELECT distinct count(distinct title,publisher,copyright_year,type,subject,bookmark_count,borrow_count) result_count FROM material LEFT JOIN material_author ON material.accession_number = material_author.accession_number";

			$pstmt = $pstmt." WHERE (type='$format[0]'";

			for($i=1; $i < $count; $i++)
			{
			  $pstmt = $pstmt."OR type='$format[$i]' ";			  
			}

			$pstmt = $pstmt . ")";

			if($search_query1!=""){
					
				switch($filter1){
						
					case "topic":			if($size1 <= 3)	$pstmt = $pstmt." AND material.accession_number IN (SELECT accession_number FROM topic WHERE tag LIKE '%{$search_query1}%')";
											else 			$pstmt = $pstmt." AND material.accession_number IN (SELECT accession_number FROM topic WHERE match(tag) against ('+$search_query1' in boolean mode)) ";
											break;

					case "title":			if($size1 <= 3)	$pstmt = $pstmt." AND (title LIKE '%{$search_query1}%')";
											else 			$pstmt = $pstmt." AND match(title) against ('+$search_query1' in boolean mode) ";
											break;
					case "publisher":		if($size1 <= 3)	$pstmt = $pstmt." AND (publisher LIKE '%{$search_query1}%')";
											else 			$pstmt = $pstmt." AND match(publisher) against ('+$search_query1' in boolean mode) ";
											break;
					case "author":			if($size1 <= 3)	$pstmt = $pstmt." AND (author LIKE '%{$search_query1}%')";
											else 			$pstmt = $pstmt." AND match(author) against ('+$search_query1' in boolean mode) ";
											break;
					case "subject":			$pstmt = $pstmt." AND subject='$search_query1'";
											break;
					case "year":			$pstmt = $pstmt." AND copyright_year='$search_query1'";
											break;

					case "accession_number":$pstmt = $pstmt." AND material.accession_number = '$search_query1'";
											break;

					default:				return "error";
						
				}

			}

			if($search_query2!=""){

				if($boolean1=="and" || $search_query1=="")	$pstmt = $pstmt." AND ";	
				else					$pstmt = $pstmt." OR ";

				switch($filter2){
						
					case "topic":			if($size2 <= 3)	$pstmt = $pstmt." material.accession_number IN (SELECT accession_number FROM topic WHERE tag LIKE '%{$search_query2}%')";
											else 			$pstmt = $pstmt." material.accession_number IN (SELECT accession_number FROM topic WHERE match(tag) against ('+$search_query2' in boolean mode)) ";
											break;

					case "title":			if($size2 <= 3)	$pstmt = $pstmt." (title LIKE '%{$search_query2}%')";
											else 			$pstmt = $pstmt." match(title) against ('+$search_query2' in boolean mode) ";
											break;
					case "publisher":		if($size2 <= 3)	$pstmt = $pstmt." (publisher LIKE '%{$search_query2}%')";
											else 			$pstmt = $pstmt." match(publisher) against ('+$search_query2' in boolean mode) ";
											break;
					case "author":			if($size2 <= 3)	$pstmt = $pstmt." (author LIKE '%{$search_query2}%')";
											else 			$pstmt = $pstmt." match(author) against ('+$search_query2' in boolean mode) ";
											break;
					case "subject":			$pstmt = $pstmt." subject='$search_query2'";
											break;
					case "year":			$pstmt = $pstmt." copyright_year='$search_query2'";
											break;

					case "accession_number":$pstmt = $pstmt." material.accession_number = '$search_query2'";
											break;

					default:				return "error";
						
				}

			}

			if($search_query3!=""){

				if($boolean2=="and" || ($search_query1=="" && $search_query2==""))	$pstmt = $pstmt." AND ";	
				else					$pstmt = $pstmt." OR ";

				switch($filter3){
						
					case "topic":			if($size3 <= 3)	$pstmt = $pstmt." material.accession_number IN (SELECT accession_number FROM topic WHERE tag LIKE '%{$search_query3}%')";
											else 			$pstmt = $pstmt." material.accession_number IN (SELECT accession_number FROM topic WHERE match(tag) against ('+$search_query3' in boolean mode)) ";
											break;

					case "title":			if($size3 <= 3)	$pstmt = $pstmt." (title LIKE '%{$search_query3}%')";
											else 			$pstmt = $pstmt." match(title) against ('+$search_query3' in boolean mode) ";
											break;
					case "publisher":		if($size3 <= 3)	$pstmt = $pstmt." (publisher LIKE '%{$search_query3}%')";
											else 			$pstmt = $pstmt." match(publisher) against ('+$search_query3' in boolean mode) ";
											break;
					case "author":			if($size3 <= 3)	$pstmt = $pstmt." (author LIKE '%{$search_query3}%')";
											else 			$pstmt = $pstmt." match(author) against ('+$search_query3' in boolean mode) ";
											break;
					case "subject":			$pstmt = $pstmt." subject='$search_query3'";
											break;
					case "year":			$pstmt = $pstmt." copyright_year='$search_query3'";
											break;

					case "accession_number":$pstmt = $pstmt." material.accession_number = '$search_query3'";
											break;

					default:				return "error";
						
				}

			}

			$query = $this->db->query($pstmt);

			return $query->result();

		}
//Start of update book details
//Thea's code starts here
		public function get_book_details($accession_number){

			$statement = "SELECT accession_number, publisher, type, title, subject, copyright_year FROM material where accession_number=\"$accession_number\" ";
			$query = $this->db->query($statement);

			return $query->result();
		}

		public function get_book_author($accession_number){

			$statement = "SELECT * FROM material_author where accession_number=\"$accession_number\"";
			$query = $this->db->query($statement);

			return $query->result();
		}

		public function update_book_model($accession,$data){  
	      $title;
		  $query = $this->db->query("SELECT title FROM material WHERE accession_number='$accession'");
		  foreach($query->result() as $row){
				$title = $row->title;
		  }
		  
		  $query = $this->db->query("SELECT accession_number FROM material WHERE title='$title'");
	      foreach($query->result() as $row){
		  
			$accession_number = $row->accession_number;
			$this->db->where('accession_number', $accession_number);
	      $this->db->update('material',$data);
		  
		  }
	    }

	    public function update_book_author($accession,$data2){  
	     	$title;
				$query = $this->db->query("SELECT title FROM material WHERE accession_number='$accession'");
		  foreach($query->result() as $row){
				$title = $row->title;
		  }

			$query = $this->db->query("SELECT accession_number FROM material WHERE title='$title'");
				  foreach($query->result() as $row){
				  
					$accession_number = $row->accession_number;
					$this->db->where('accession_number', $accession_number);
			  $this->db->delete('material_author');
			  
			  foreach ($data2 as $temp) {
	      	$statement =" INSERT into material_author values (\"$accession_number\", \"$temp\") ";
	      	$this->db->query($statement);
	      }
				  
		  }
	    }

	    public function delete_book_tags($accession_number){
	    	$this->db->where('accession_number', $accession_number);
	    	$this->db->delete('topic');
	    }

	    public function delete_bookmark($accession_number, $email){
	    	$statement ="DELETE FROM bookmark WHERE  email = \"$email\" and accession_number= \"$accession_number\" ";
	    	$this->db->query($statement);
	    }

	    public function get_bookmarks($email){

	    	if($this->input->get('page_number'))	$page_number = $this->input->get('page_number');
	    	else 									$page_number = 1;

	    	$start = ($page_number - 1) * 5 ;

	    	$statement ="SELECT material.accession_number,publisher, title,reserves.email remail,borrows.email bemail from material LEFT JOIN reserves ON material.accession_number = reserves.accession_number LEFT JOIN borrows ON material.accession_number = borrows.accession_number where material.accession_number in (SELECT accession_number FROM bookmark where email=\"$email\") LIMIT $start,5";
	    	$query = $this->db->query($statement);

	    	return $query->result();
	    }
	    public function get_author_for_bookmarks($email){
	    	$statement ="SELECT * from material_author where accession_number in (SELECT accession_number from bookmark where email=\"$email\")";
	    	$query = $this->db->query($statement);

	    	return $query->result();
	    }

	    public function get_count_bookmark($email,$page_number = 1){

	    	$statement ="SELECT count(accession_number) bookmark_count from material where accession_number in (SELECT accession_number FROM bookmark where email=\"$email\")";
	    	$query = $this->db->query($statement);

	    	return $query->result();

	    }

	    public function add_bookmark($accession_number, $email){
			$this->db->select('accession_number');		//selects accession number
			$this->db->where(array('accession_number'=>$accession_number));		//checks if accession_number is equal to inputted accession_number
			$query = $this->db->get('bookmark');	//get values from bookmark
   			if($query->num_rows>0){			//gets the number of accession_number equal to the input in which num_rows>1 determines duplicate
   				echo 'Cannot be added! Book already exists.';	//notifies if there is duplicate
   			}
   			else{
				$statement ="INSERT into bookmark values (\"$email\", \"$accession_number\") ";		//if no duplicate, insert into database
   				$this->db->query($statement);
   				echo 'Book Added!';
   			}
	    }
//End of my library functions	    
//Start of user update account functions	    
	    public function get_user_details($email){

		$data = current($this->db->get_where('user',Array('email'=>$email))->result_array());
		return $data;
	    }

	    public function update_user_details($email,$data){
		$this->db->where('email',$email);
		if(!$this->db->update('user',$data)){
			return -1;
		}
		else{
			return 1;
		}

	    }
//End of user update account

		public function suggest(){

		
			$search_query = $this->input->get('search_query');
	    	$filter = $this->input->get('filter');
	    	$sort = $this->input->get('sort');
	    	$format = $this->input->get('format');

	    	$count = count($format);

	    	$search_query = mysql_real_escape_string ($search_query);

			$search_query = ucfirst($search_query);

			$format_link = "&format[]=".$format[0];

			for($i=1; $i < $count; $i++){

				$format_link = $format_link."&format[]=".$format[$i];	

			}

			$formatquery = " (type='$format[0]'";

			for($i=1; $i < $count; $i++)
			{
			  $formatquery = $formatquery."OR type='$format[$i]' ";			  
			}

			$formatquery = $formatquery.")";	
					
			switch($filter){
					
				case "title":			$pstmt = "SELECT distinct title FROM material WHERE title LIKE '%$search_query%' AND $formatquery LIMIT 5";
										$query = $this->db->query($pstmt);
					
										echo "<p>";
										foreach ($query->result() as $row):
											$q = str_replace(' ','+',$row->title);
								        	echo "<a href='" . base_url() . "index.php/site/search?page_number=1&search_query={$q}&filter={$filter}&sort={$sort}{$format_link}'></br>$row->title</a><br>";
								        endforeach;
								        echo "</p>";

										break;
				case "publisher":		$pstmt = "SELECT distinct publisher FROM material WHERE publisher LIKE '%$search_query%' AND $formatquery LIMIT 5";
										$query = $this->db->query($pstmt);
										
										echo "<p>";
										foreach ($query->result() as $row):
											$q = str_replace(' ','+',$row->publisher);
								        	echo "<a href='" . base_url() . "index.php/site/search?page_number=1&search_query={$q}&filter={$filter}&sort={$sort}{$format_link}'></br>$row->publisher</a><br>";
								        endforeach;
								        echo "</p>";
										
										break;
				case "author":			$pstmt = "SELECT distinct author FROM material_author WHERE author LIKE '%$search_query%' AND $formatquery LIMIT 5";
										$query = $this->db->query($pstmt);

										echo "<p>";
										foreach ($query->result() as $row):
											$q = str_replace(' ','+',$row->author);
								        	echo "<a href='" . base_url() . "index.php/site/search?page_number=1&search_query={$q}&filter={$filter}&sort={$sort}{$format_link}'></br>$row->author</a><br>";
								        endforeach;
								        echo "</p>";
										
										break;
				case "accession_number":$pstmt = "SELECT distinct accession_number FROM material WHERE accession_number LIKE '%$search_query%' AND $formatquery LIMIT 5";
										$query = $this->db->query($pstmt);

										echo "<p>";
										foreach ($query->result() as $row):
											$q = str_replace(' ','+',$row->accession_number);
								        	echo "<a href='" . base_url() . "index.php/site/search?page_number=1&search_query={$q}&filter={$filter}&sort={$sort}{$format_link}'></br>$row->accession_number</a><br>";
								        endforeach;
								        echo "</p>";

										break;
					
			}

		}

		public function get_reserve($email){
            $email = $this->session->userdata('email');
            $this->db->where(array('email'=>$email, 'date_borrowed'=>'0000-00-00'));
            $this->db->select('accession_number');
            $query = $this->db->get('borrows');
            return $query->result();
		}

        public function get_reserve_search(){
            $email = $this->session->userdata('email');

            $pstmt = "SELECT title,reserves.accession_number,email FROM reserves LEFT JOIN material ON material.accession_number=reserves.accession_number UNION SELECT title,borrows.accession_number,email FROM borrows LEFT JOIN material ON material.accession_number=borrows.accession_number";

            $query = $this->db->query($pstmt);

            return $query->result();

        }

        public function get_title($email){
            $query = "SELECT accession_number FROM borrows WHERE email='$email'";   //possibly returns an array if not one
            $accession_number = $this->db->query($query);
            if($accession_number->num_rows()>0){
                foreach($accession_number->result() as $row){
                    $this->db->where(array('accession_number'=>$row->accession_number));
                    $this->db->select('title');
                    $data[] = $this->db->get('material')->result();
                }
                return $data;
            }
            else return;
        }

		public function get_bookmarked(){

			$email = $this->session->userdata('email');

			$pstmt = "SELECT title,bookmark.accession_number,email FROM bookmark LEFT JOIN material ON bookmark.accession_number=material.accession_number where email='$email'";

			$query = $this->db->query($pstmt);

			return $query->result();

		}


	}
?>