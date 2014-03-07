<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class query_model extends CI_Model {

	function __construct(){
        parent::__construct();
        //constructor code
        $this->load->database();
    }

    function insert(){
        $this->load->database();
        $this->db->query("INSERT INTO query(email,header,message) VALUES('".$this->input->post('input_email')."','".$this->input->post('header')."','".$this->input->post('query_box')."');"); 
    }

    function delete($id){
        $this->db->delete('query', array('header' => $id));
    }

    function showAll(){
    	$data = $this->db->query("SELECT * from query")->result();
    	return $data;
    }
}
