<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdf extends CI_Controller {

    public function index(){
        $this->load->library('session');
        $this->load->model('pdf_model');
    }

    public function inventory(){
        $this->load->view('admin_inventory_view');
    }

    public function generate_pdf(){
        $this->load->model('pdf_model');
        $this->pdf_model->get_pdf();
    }

}