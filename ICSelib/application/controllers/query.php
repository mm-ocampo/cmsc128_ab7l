<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Query extends CI_Controller {


    function __construct(){
        parent::__construct();
        $this->load->model('query_model');
    }

    function index(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('header', 'Header', 'trim|required|min_length[1]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('query_box', 'Message Query', 'trim|min_length[1]|max_length[500]|required|xss_clean');

        if ($this->form_validation->run() == FALSE){
            $this->load->view('contact_us_view');
        }
        else{
            $this->load->view('success_query_view');
        }

    }

    function load_view(){
        $this->load->view('contact_us_view');
    }

    function insertquery(){
        if($_GET['confirm'] == "true"){

            $temp = $this->db->query("SELECT max(id) as id FROM query");
            $result = $temp->result();
            $current_id = $result[0]->id;


            $this->query_model->insert($current_id + 1, $this->input->post('input_email'), $this->input->post('header'), $this->input->post('query_box'));
            $this->load->view('success_query_view');
        }
        else
            $this->load->view('contact_us_view');
    }

    function get_rows(){
        $data['result'] = $this->query_model->showAll();
        $this->load->view('admin_message_view',$data);
    }

    function deletemessage(){
        if(isset($_GET['id']) && $_GET['confirm'] == "true"){
            $this->query_model->delete($_GET['id']);
        }
        $this->get_rows();
    }
}