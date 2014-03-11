<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Material_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('material_model');
		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
        $this->load->helper('file');
	}

	public function index(){
		$this->load->view('material_view');
	}

	public function add(){
		/* sanitize input from material_view */
		$this->load->library('form_validation');

		$this->form_validation->set_rules('subject', 'Subject', 'trim|xss_clean');
		$this->form_validation->set_rules('thesissp_subject', 'Subject', 'trim|xss_clean');
		$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('inputAuthor[]', 'Author', 'trim|required|xss_clean');
		$this->form_validation->set_rules('copyright_year', 'Copyright Year', 'trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('publisher', 'Publisher', 'trim|required|xss_clean');
		$this->form_validation->set_rules('type', 'Type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tags', 'Topics', 'trim|xss_clean');
		$this->form_validation->set_rules('abstract', 'Abstract', 'trim|xss_clean');

		if($this->form_validation->run() == FALSE){
			redirect(base_url());
		}
		else{
			$quantity = $this->input->post('quantity');
			/* loop in adding books */
			while($quantity > 0){
				/* check in the database is already populated */
				$counter = $this->db->query("SELECT * FROM material");
				/* if the database has no data, start the id with 1 */
				if($counter->num_rows() == 0){
					$next_id = 1;
				}
				/* else generate next id */
				else{
					/* get the maximum id in the material table */
					$temp = $this->db->query("SELECT max(id) as id FROM material");
					$result = $temp->result();
					$current_id = $result[0]->id;
					/* get next id by adding one in the max id from the database*/			
					$next_id = $current_id+1;
				}
				/* fetch data from the view */
				/* check the type of the materialto be inserted in the collection */
				/* if the type is sp or thesis, fetch the abstract */
				/* generate accesion number by concatinating subject and id */
				if($this->input->post('type') == "book"){

					$subject = $this->input->post('subject');
					$abstract = "";
					$accession_number = strtoupper($subject)."-".sprintf("%05d", $next_id);
				}				
				else if($this->input->post('type') == "sp"){
					$subject = $this->input->post('thesissp_subject');
					$abstract = $this->input->post('abstract');
					$accession_number = "SP-".sprintf("%05d", $next_id);
				}
				else if($this->input->post('type') == "thesis"){
					$subject = $this->input->post('thesissp_subject');
					$abstract = $this->input->post('abstract');
					$accession_number = "THESIS-".sprintf("%05d", $next_id);
				}
				else if($this->input->post('type') == "journal"){
					$subject = "";
					$abstract = "";
					$accession_number = "ICSLIB-".sprintf("%05d", $next_id);
				}				
				
				/* prepare the data to be inserted in the tables */
				$data = array(
				    	'accession_number'=>$accession_number,
				    	'id'=> $next_id,
				    	'subject'=>$subject,
				    	'title'=>$this->input->post('title'),
				    	'copyright_year'=>$this->input->post('copyright_year'),
				    	'publisher'=>$this->input->post('publisher'),
				    	'type'=>$this->input->post('type'),
				    	'status'=>"available",

				    	'abstract' => $abstract
				    );

			    /* insert into tables the value given by the user */
			    $this->material_model->add_reading_materials($data);

			    foreach($this->input->post('inputAuthor') as $temp){
                    $data2['author'] = $temp;
                    $data2['accession_number'] = $accession_number;
                    $this->material_model->add_author($data2);
                }

			    /* parse the string acquired from the textarea of the abstract */
			    $str = explode(",", $this->input->post('tags'));
			    $array_len = count($str);

			    /* insert every tag in the topic table */
			    if($str[0] != ""){
			    	for($i = 0; $i < $array_len; $i++){
				    	$tags['tag'] = $str[$i];
				    	$tags['accession_number'] = $accession_number;
				    	if($this->material_model->check_tag($tags))
				    		$this->material_model->add_tags($tags);
				    }
			    }
			    $quantity--;
			}
			
			$log_array = array(
                'date_time' => date('Y-m-d H:i:s'),
                'action' => 'added',
                'book' => $this->input->post('title'),
                'actor' => $this->session->userdata('email')
            );
            $this->add_book_logger($log_array);						

			$this->load->view('material_view');
		}
	}

	public function add_book_logger($array){
        $string = read_file('./application/logs/log.txt');
        if($string==false){
            $data = $array['date_time']." ".$array['actor']." ".$array['action']." ".$array['book'];
        }
        else{
            $new_data = $array['date_time']." ".$array['actor']." ".$array['action']." ".$array['book'];
            $data = $string."\r\n".$new_data;
        }
        write_file('./application/logs/log.txt', $data);
    }
}