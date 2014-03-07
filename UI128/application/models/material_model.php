<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Material_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

    public function add_reading_materials($data){
        $query = $this->db->insert("material", $data);
        return $query;
    }

    public function add_author($data2){
        $query = $this->db->insert("material_author", $data2);
        return $query;
    }

    public function add_tags($tags){
        $query = $this->db->insert("topic", $tags);
        return $query;
    }

}
