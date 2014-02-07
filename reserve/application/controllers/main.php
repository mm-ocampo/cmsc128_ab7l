<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index(){
    	$newdata = array(
                   'email' => 'reginald@gmail.com'
        );

        $this->session->set_userdata($newdata);

        $this->load->model('sample_model');
        $data['result'] = $this->sample_model->select("select * from material");
        $data['result2'] = $this->sample_model->select("select * from material_author");
        $this->load->view('search_view', $data);

    }

    public function __construct(){
        parent::__construct();
        //constructor code
    }

    public function load_db(){
        $this->load->model('sample_model');
        $data['result'] = $this->sample_model->select("select * from material");
        $data['result2'] = $this->sample_model->select("select * from material_author");
        $this->load->view('search_view', $data);
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
}