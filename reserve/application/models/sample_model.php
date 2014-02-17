<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sample_model extends CI_Model {

    function __construct(){
        parent::__construct();
        //constructor code
    }

    function select($sql){
        $data=array();
        $q = $this->db->query($sql);
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[] = $row;
            }
        }
        else{
            //catch the event in which nothing is returned.
        }
        return $data;
    }

    function insert($data,$table){     //(data, table)
        $this->db->insert($table, $data); 
        return;
    }

    function update($data,$value,$key,$table){   //(data,value,key,table)
        $this->db->where($key,$value);
        $this->db->update($table,$data);
        return;
    }


    // 5 ways to get data.... select, active record, get....etc
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */