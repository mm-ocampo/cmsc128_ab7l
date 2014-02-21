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
		$this->form_validation->set_rules('accession_number', 'Accession Number', 'trim|required|xss_clean');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
		$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('author', 'Author', 'trim|required|xss_clean');
		$this->form_validation->set_rules('copyright_year', 'Copyright Year', 'trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('publisher', 'Publisher', 'trim|required|xss_clean');
		$this->form_validation->set_rules('type', 'Type', 'trim|required|xss_clean');

		if($this->form_validation->run() == FALSE){
			redirect(base_url());
		}
		else{
			$data = array(
			    	'accession_number'=>$this->input->post('accession_number'),
			    	'subject'=>$this->input->post('subject'),
			    	'title'=>$this->input->post('title'),
			    	'copyright_year'=>$this->input->post('copyright_year'),
			    	'publisher'=>$this->input->post('publisher'),
			    	'type'=>$this->input->post('type'),
			    	'status'=>"available"
			    );
		    $data2 = array(
		    		'accession_number'=>$this->input->post('accession_number'),
		    		'author'=>$this->input->post('author')
		    	);
			$result['res'] = $this->material_model->add_reading_materials($data, $data2);
			redirect(base_url());
		}
	}
}