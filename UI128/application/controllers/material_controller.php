<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Material_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('material_model');
		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
	}

	public function index(){
		$this->load->view('material_view');
	}

	public function add(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
		$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');

		    $this->form_validation->set_rules('inputAuthor[]', 'Author', 'trim|required|xss_clean');
		$this->form_validation->set_rules('copyright_year', 'Copyright Year', 'trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('publisher', 'Publisher', 'trim|required|xss_clean');
		$this->form_validation->set_rules('type', 'Type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tags', 'Topics', 'trim|required|xss_clean');

		if($this->form_validation->run() == FALSE){
			redirect(base_url());
		}
		else{
			$quantity = $this->input->post('quantity');
			while($quantity > 0){
				$temp = $this->db->query("SELECT max(id) as id FROM material");
				$result = $temp->result();
				$current_id = $result[0]->id;			
				$next_id = $current_id+1;
				$subject = $this->input->post('subject');
				$accession_number = $subject."-".sprintf("%05d", $next_id);
				$data = array(
				    	'accession_number'=>$accession_number,
				    	'id'=>$next_id,
				    	'subject'=>$this->input->post('subject'),
				    	'title'=>$this->input->post('title'),
				    	'copyright_year'=>$this->input->post('copyright_year'),
				    	'publisher'=>$this->input->post('publisher'),
				    	'type'=>$this->input->post('type'),
				    	'status'=>"available"

				    );

			    $this->material_model->add_reading_materials($data);

                foreach($this->input->post('inputAuthor') as $temp){
                    $data2['author'] = $temp;
                    $data2['accession_number'] = $accession_number;
                    $this->material_model->add_author($data2);
                }

			    $str = explode(",", $this->input->post('tags'));
			    $array_len = count($str);
			    for($i = 0; $i < $array_len; $i++){
			    	$tags['tag'] = $str[$i];
			    	$tags['accession_number'] = $accession_number;
			    	$this->material_model->add_tags($tags);
			    }
			    $quantity--;
			}						

			$this->load->view('admin_add_book_view');
		}
	}
}