<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Forgot_password_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
	
	    public function fetch_data(){
        $result = $this->db->query("select * from user")->result();

        return $result;
    }
	
	function update_data() {
		$md5_hash = md5(rand(0,999)); 
		$_SESSION['new_password'] = substr($md5_hash, 15, 5);
	   echo sha1($_SESSION['new_password']);
		$this->load->database();
		$this->db->query("UPDATE user SET password='" . sha1($_SESSION['new_password']) . "' where email='" . $this->input->post('email') . "'");
	}

	function checkEmailExist() {
		$email = $this->input->get('email');
        $query = "SELECT * FROM user WHERE email='$email'";
        $result = $this->db->query($query);

        $count = 0;
        foreach($result->result() as $i){
            $count++;
        }
        if($count < 1)
            echo 'Email does not exist.';
        else if($count >= 0)
            echo 'Valid email.';
    }
	
	
}

?>