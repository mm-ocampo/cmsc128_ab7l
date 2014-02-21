<?php

	class Get_database extends CI_Model{

		public function __construct(){

			$this->load->database();

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

			$pstmt = "SELECT title,publisher,accession_number FROM material";

			$pstmt = $pstmt." WHERE (type='$format[0]'";

			for($i=1; $i < $count; $i++)
			{
			  $pstmt = $pstmt."OR type='$format[$i]' ";			  
			}
					
			switch($filter){
					
				case "title":			$pstmt = $pstmt.") AND (title REGEXP '.*[[:punct:]|[:space:]]{$search_query}[[:punct:]|[:space:]].*' OR title REGEXP '.*[[:punct:]|[:space:]]{$search_query}' OR title REGEXP '{$search_query}[[:punct:]|[:space:]].*' OR title='$search_query')";
										
										break;
				case "publisher":		$pstmt = $pstmt.") AND (publisher REGEXP '.*[[:punct:]|[:space:]]{$search_query}[[:punct:]|[:space:]].*' OR publisher REGEXP '.*[[:punct:]|[:space:]]{$search_query}' OR publisher REGEXP '{$search_query}[[:punct:]|[:space:]].*' OR publisher='$search_query')";
										
										break;
				case "author":			$pstmt = $pstmt.") AND (author REGEXP '.*[[:punct:]|[:space:]]{$search_query}[[:punct:]|[:space:]].*' OR author REGEXP '.*[[:punct:]|[:space:]]{$search_query}' OR author REGEXP '{$search_query}[[:punct:]|[:space:]].*' OR author='$search_query')";
										
										break;
				case "subject":			$pstmt = $pstmt.") AND subject='$search_query'";
										break;
				case "accession_number":$pstmt = $pstmt.") AND material.accession_number = '$search_query'";
										break;

				default:				return "error";
					
			}
					
			switch($sort){
					
				case "alphabetical":		$pstmt = $pstmt." ORDER BY title, accession_number LIMIT $start,10";
											break;
				case "newest":				$pstmt = $pstmt." ORDER BY copyright_year DESC LIMIT $start,10";
											break;

				default:					return "error";
					
			}

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

			$pstmt = "SELECT COUNT(title) result_count FROM material ";

			$pstmt = $pstmt." WHERE (type='$format[0]'";

			for($i=1; $i < $count; $i++)
			{
			  $pstmt = $pstmt."OR type='$format[$i]' ";			  
			}
					
			switch($filter){
					
				case "title":			$pstmt = $pstmt.") AND (title REGEXP '.*[[:punct:]|[:space:]]{$search_query}[[:punct:]|[:space:]].*' OR title REGEXP '.*[[:punct:]|[:space:]]$search_query' OR title REGEXP '{$search_query}[[:punct:]|[:space:]].*' OR title='$search_query')";
										
										break;
				case "publisher":		$pstmt = $pstmt.") AND (publisher REGEXP '.*[[:punct:]|[:space:]]{$search_query}[[:punct:]|[:space:]].*' OR publisher REGEXP '.*[[:punct:]|[:space:]]$search_query' OR publisher REGEXP '{$search_query}[[:punct:]|[:space:]].*' OR publisher='$search_query')";
										
										break;
				case "author":			$pstmt = $pstmt.") AND (author REGEXP '.*[[:punct:]|[:space:]]{$search_query}[[:punct:]|[:space:]].*' OR author REGEXP '.*[[:punct:]|[:space:]]$search_query' OR author REGEXP '{$search_query}[[:punct:]|[:space:]].*' OR author='$search_query')";
										
										break;
				case "subject":			$pstmt = $pstmt.") AND subject='$search_query'";
										break;
				case "accession_number":$pstmt = $pstmt.") AND accession_number = '$search_query'";
										break;

				default:				return "error";
					
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
//Thea's code ends here
//end of Update book details functions


//Start of My library functions
//Ara's codes as of 2/11/14
	    public function delete_bookmark($accession_number, $email){
	    	$statement ="DELETE FROM bookmark WHERE  email = \"$email\" and accession_number= \"$accession_number\" ";
	    	$this->db->query($statement);
	    }
//Thea's codes as of 2/9/14; edited by Tim
	    public function get_bookmarks($email){

	    	if($this->input->get('page_number'))	$page_number = $this->input->get('page_number');
	    	else 									$page_number = 1;

	    	$start = ($page_number - 1) * 5 ;

	    	$statement ="SELECT material.accession_number,publisher, title,reserves.email from material LEFT JOIN reserves ON material.accession_number = reserves.accession_number where material.accession_number in (SELECT accession_number FROM bookmark where email=\"$email\") LIMIT $start,5";
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
					
			switch($filter){
					
				case "title":			$pstmt = "SELECT distinct title FROM material WHERE title LIKE '%$search_query%' LIMIT 5";
										$query = $this->db->query($pstmt);
					
										echo "<ul>";
										foreach ($query->result() as $row):
											$q = str_replace(' ','+',$row->title);
								        	echo "<a href='" . base_url() . "index.php/site/search?page_number=1&search_query={$q}&filter={$filter}&sort={$sort}{$format_link}'><li>$row->title</li></a>";
								        endforeach;
								        echo "</ul>";

										break;
				case "publisher":		$pstmt = "SELECT distinct publisher FROM material WHERE publisher LIKE '%$search_query%' LIMIT 5";
										$query = $this->db->query($pstmt);
										
										echo "<ul>";
										foreach ($query->result() as $row):
											$q = str_replace(' ','+',$row->publisher);
								        	echo "<a href='" . base_url() . "index.php/site/search?page_number=1&search_query={$q}&filter={$filter}&sort={$sort}{$format_link}'><li>$row->publisher</li></a>";
								        endforeach;
								        echo "</ul>";
										
										break;
				case "author":			$pstmt = "SELECT distinct author FROM material_author WHERE author LIKE '%$search_query%' LIMIT 5";
										$query = $this->db->query($pstmt);

										echo "<ul>";
										foreach ($query->result() as $row):
											$q = str_replace(' ','+',$row->author);
								        	echo "<a href='" . base_url() . "index.php/site/search?page_number=1&search_query={$q}&filter={$filter}&sort={$sort}{$format_link}'><li>$row->author</li></a>";
								        endforeach;
								        echo "</ul>";
										
										break;
				case "accession_number":$pstmt = "SELECT distinct accession_number FROM material WHERE accession_number LIKE '%$search_query%' LIMIT 5";
										$query = $this->db->query($pstmt);

										echo "<ul>";
										foreach ($query->result() as $row):
											$q = str_replace(' ','+',$row->accession_number);
								        	echo "<a href='" . base_url() . "index.php/site/search?page_number=1&search_query={$q}&filter={$filter}&sort={$sort}{$format_link}'><li>$row->accession_number</li></a>";
								        endforeach;
								        echo "</ul>";

										break;

				default:				return "error";
					
			}

		}

		public function get_reserve(){

			$search_query = $this->input->get('search_query');
			$filter = $this->input->get('filter');
			$sort = $this->input->get('sort');
			$format = $this->input->get('format');

			$count = count($format);

			$search_query = mysql_real_escape_string ($search_query);

			$search_query = ucfirst($search_query);

			$pstmt = "SELECT reserves.email, material.accession_number FROM material LEFT JOIN reserves ON material.accession_number = reserves.accession_number";

			$pstmt = $pstmt." WHERE (type='$format[0]'";

			for($i=1; $i < $count; $i++)
			{
			  $pstmt = $pstmt."OR type='$format[$i]' ";			  
			}
					
			switch($filter){
					
				case "title":			$pstmt = $pstmt.") AND (title REGEXP '.*[[:punct:]|[:space:]]{$search_query}[[:punct:]|[:space:]].*' OR title REGEXP '.*[[:punct:]|[:space:]]{$search_query}' OR title REGEXP '{$search_query}[[:punct:]|[:space:]].*' OR title='$search_query')";
										
										break;
				case "publisher":		$pstmt = $pstmt.") AND (publisher REGEXP '.*[[:punct:]|[:space:]]{$search_query}[[:punct:]|[:space:]].*' OR publisher REGEXP '.*[[:punct:]|[:space:]]{$search_query}' OR publisher REGEXP '{$search_query}[[:punct:]|[:space:]].*' OR publisher='$search_query')";
										
										break;
				case "author":			$pstmt = $pstmt.") AND (author REGEXP '.*[[:punct:]|[:space:]]{$search_query}[[:punct:]|[:space:]].*' OR author REGEXP '.*[[:punct:]|[:space:]]{$search_query}' OR author REGEXP '{$search_query}[[:punct:]|[:space:]].*' OR author='$search_query')";
										
										break;
				case "subject":			$pstmt = $pstmt.") AND subject='$search_query'";
										break;
				case "accession_number":$pstmt = $pstmt.") AND material.accession_number = '$search_query'";
										break;

				default:				return "error";
					
			}
			$query = $this->db->query($pstmt);

			return $query->result();

		}

		public function get_bookmarked(){

			$search_query = $this->input->get('search_query');
			$filter = $this->input->get('filter');
			$sort = $this->input->get('sort');
			$format = $this->input->get('format');

			$count = count($format);

			$search_query = mysql_real_escape_string ($search_query);

			$search_query = ucfirst($search_query);

			$pstmt = "SELECT bookmark.email, bookmark.accession_number FROM material LEFT JOIN bookmark ON material.accession_number = bookmark.accession_number";

			$pstmt = $pstmt." WHERE (type='$format[0]'";

			for($i=1; $i < $count; $i++)
			{
			  $pstmt = $pstmt."OR type='$format[$i]' ";			  
			}
					
			switch($filter){
					
				case "title":			$pstmt = $pstmt.") AND (title REGEXP '.*[[:punct:]|[:space:]]{$search_query}[[:punct:]|[:space:]].*' OR title REGEXP '.*[[:punct:]|[:space:]]{$search_query}' OR title REGEXP '{$search_query}[[:punct:]|[:space:]].*' OR title='$search_query')";
										
										break;
				case "publisher":		$pstmt = $pstmt.") AND (publisher REGEXP '.*[[:punct:]|[:space:]]{$search_query}[[:punct:]|[:space:]].*' OR publisher REGEXP '.*[[:punct:]|[:space:]]{$search_query}' OR publisher REGEXP '{$search_query}[[:punct:]|[:space:]].*' OR publisher='$search_query')";
										
										break;
				case "author":			$pstmt = $pstmt.") AND (author REGEXP '.*[[:punct:]|[:space:]]{$search_query}[[:punct:]|[:space:]].*' OR author REGEXP '.*[[:punct:]|[:space:]]{$search_query}' OR author REGEXP '{$search_query}[[:punct:]|[:space:]].*' OR author='$search_query')";
										
										break;
				case "subject":			$pstmt = $pstmt.") AND subject='$search_query'";
										break;
				case "accession_number":$pstmt = $pstmt.") AND material.accession_number = '$search_query'";
										break;

				default:				return "error";
					
			}
			$query = $this->db->query($pstmt);

			return $query->result();

		}


	}
?>