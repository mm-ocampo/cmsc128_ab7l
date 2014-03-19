<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class query_model extends CI_Model {

	function __construct(){
        parent::__construct();
        //constructor code
        $this->load->database();
    }

    function insert($id, $email, $header, $message){
        $this->load->database();
        $this->db->query("INSERT INTO query VALUES('{$id}','{$email}','{$header}','{$message}');"); 
    }

    function delete($id){
        $this->db->delete('query', array('id' => $id));
    }

    function showAll(){
    	$data = $this->db->query("SELECT * from query")->result();
    	return $data;
    }
}
