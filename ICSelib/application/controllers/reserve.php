<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reserve extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('get_database');
        $this->load->model('delete_model');
        $this->load->model('reserve_model');

        $this->load->helper('file');
        $newdata = array(
            'email' => $this->session->userdata('email')
        );

        $this->session->set_userdata($newdata);
        $this->load->helper('file');
    }

    public function index(){
        $this->home();
    }

    public function home(){
        $this->load->view('default_view');
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
        if (isset($_GET['id'])){					    // get this
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

    public function load_book(){
        if(!$this->input->post('viewbook')){
            $this->load->view('default_view');
        }

        else{
            $newdata = array(
                'email' => $this->session->userdata('email')
            );

            $accession_number = $this->input->post('viewbook');

            $books_reserved = $this->reserve_model->select("SELECT count(*) as number FROM reserves WHERE email=\"".$this->session->userdata('email')."\"");
            foreach ($books_reserved as $row) {
                $books_reserved = $row->number;
            }

            $newdata = array(
                'accession_number' => $accession_number,
                'books_reserved' => $books_reserved
            );
            $this->session->set_userdata($newdata);
            $this->reservation();
        }
        $date = date('Y-m-d');
    }

    public function reservation(){
        $date_reserved = date('Y-m-d H:i:s');
        $email = $this->session->userdata('email');
        $accession_number = $this->session->userdata('accession_number');
        $data = array(
            'email' => $email,
            'accession_number' => $accession_number,
            'date_reserved' => $date_reserved
        );
        $table = 'reserves';
        $this->reserve_model->insert($data,$table);

        $data = array(
            'status' => 'reserved'
        );
        $key = 'accession_number';
        $table = 'material';
        $this->reserve_model->update($data,$accession_number,$key,$table);  //(data,value,key,table)

        $date = date('Y-m-d H:i:s');
        $log_array = array(
            'date_time' => $date,
            'action' => 'reserved',
            'book' => $accession_number,
            'actor' => $this->session->userdata('email')
        );
        $this->reserve_logger($log_array);

        $this->load->view('confirm_view');
    }

    public function reserve_logger($array){
        $date = date('Y-m-d');
        $string = read_file("./application/logs/log-{$date}.txt");
        if($string==false){
            $data = $array['date_time']." ".$array['actor']." ".$array['action']." ".$array['book'];
        }
        else{
            $new_data = $array['date_time']." ".$array['actor']." ".$array['action']." ".$array['book'];
            $data = $string."\r\n".$new_data;
        }
        write_file("./application/logs/log-{$date}.txt", $data);
    }
}