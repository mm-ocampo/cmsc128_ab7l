<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Material_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function add_reading_materials($data, $data2){
		$query1 = $this->db->insert("material", $data);
		$query2 = $this->db->insert("material_author", $data2);
		return ($query1 && $query2);
	}

}
