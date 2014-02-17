<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sample extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->load->view('default_view');
    }




    public function load_db(){
        $this->load->model('sample_model');
        $data['result'] = $this->sample_model->select("select * from material");
        $data['result2'] = $this->sample_model->select("select * from material_author");
        $this->load->view('search_view', $data);
    }

    public function load_book(){
        $this->load->model('sample_model');
        $this->load->view('book_view');
    }

    public function reservation(){
    //    $data['result'] = $this->sample_model->select("INSERT INTO  `elib_db`.`reserves` (`email` ,`accession_number` ,`date_reserved`) VALUES('frbechave@gmail.com',  'uplb-0000000010,  date("Y-m-d")");
    //    $this->load->model('sample_model', $data);
    }
}