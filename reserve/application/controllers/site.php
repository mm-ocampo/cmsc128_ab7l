<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	function Site(){
		parent::__construct();

		$this->load->model('get_database');
		$this->load->model('delete_model');
		$this->load->helper('url');
		$this->load->helper('form');

	}

	public function index(){
		$this->home();
	}

	public function home(){
		$this->load->view('home_view');
	}

	public function search(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('format', 'Format', 'required');
		$this->form_validation->set_rules('search_query', 'Search_query', 'required');

		if ($this->form_validation->run() === FALSE){
			$this->load->view('home_view');
		}
		else{
			$data['search'] = $this->get_database->search();
			$data['result_count'] = $this->get_database->count_results();
			$this->load->view('search_view',$data);
		}
	}

	public function delete(){
		if (isset($_GET['id'])){						// get this
            $id = $_GET['id'];						    // get this
            $this->delete_model->delete_material($id);	// get this
            $this->load->view('home_view');
        }
	}

	public function search_page(){
		$data['search'] = $this->get_database->search_by_page();
		$data['result_count'] = $this->get_database->count_results();
		$this->load->view('search_view',$data);
	}

	public function update(){
		$accession_number= $this->input->post('accession_number');
		$data['results'] = $this->get_database->get_book_details($accession_number);
		$data['results2'] = $this->get_database->get_book_author($accession_number);

		$this->load->view('edit_book_details', $data);
	}

	public function update_book_database(){
        $data2= $this->input->post('inputAuthor');
        echo $data2[1];
        $accession_number = $this->input->post('accession_number');

        $data = array(
            'accession_number' => $this->input->post('accession_number'),
            'publisher' => $this->input->post('inputPublisher'),
            'copyright_year' => $this->input->post('inputYear'),
            'title' => $this->input->post('inputTitle'),
            'type' => $this->input->post('inputType')
        );

        $this->get_database->update_book_model($accession_number,$data);
        $this->get_database->update_book_author($accession_number,$data2);
        echo "Update Succesful :)";
        $this->load->view('home_view');
	}

	public function delete_author(){
        $accession_number = $this->input->post('accession_number');
        $author = $this->input->post('author');

        $this->get_database->update_book_author($accession_number,$author);
	}

    public function reservation(){
        $this->load->model('sample_model');

        $date_reserved = date("Y-m-d");
        $email = $this->session->userdata('email');
        $accession_number = $this->session->userdata('accession_number');
        $data = array(
            'email' => $email,
            'accession_number' => $accession_number,
            'date_reserved' => $date_reserved
        );
        $table = 'reserves';
        $this->sample_model->insert($data,$table);

        $data = array(
            'status' => 'reserved'
        );
        $key = 'accession_number';
        $table = 'material';
        $this->sample_model->update($data,$accession_number,$key,$table);  //(data,value,key,table)

        $this->load->view('confirm_view');
    }

    public function load_book(){
        $newdata = array(
            'email' => 'reginald@gmail.com'
        );
        $this->load->model('sample_model');
        $accession_number = $this->input->post('viewbook');

        $books_reserved = $this->sample_model->select("SELECT count(*) as number FROM reserves WHERE email=\"".$this->session->userdata('email')."\"");

        foreach ($books_reserved as $row) {
            $books_reserved = $row->number;
        }

        $newdata = array(
                   'accession_number' => $accession_number,
                   'books_reserved' => $books_reserved 
        );

        $this->session->set_userdata($newdata);
        $data['result'] = $this->sample_model->select("select * from material_view where accession_number=\"$accession_number\"");
        $this->load->view('book_view', $data);
    }
}
