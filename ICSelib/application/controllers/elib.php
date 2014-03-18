<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Elib extends CI_Controller {

    function Elib(){
        parent::__construct();
        $this->load->model('get_database');
        $this->load->model('statistics_model');
        $this->load->model('notification_model');
        $this->load->library('session');
        $this->load->model('log_in_model');
    }

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
    public function index(){
        $this->load->view('default_view');
    }

    public function load_home(){
        $this->load->library('session');
        if($this->session->userdata('type')=="admin"){
            $this->load->view('admin_default_view');       
        }
        else if($this->session->userdata('type')=="user"){
            $email= $this->session->userdata('email');
            $data['notification'] = $this->notification_model->get_notifications();
            $data['results']=$this->get_database->get_bookmarks($email);
            $data['results2']=$this->get_database->get_author_for_bookmarks($email);
            $data['bookmark_count'] = $this->get_database->get_count_bookmark($email);
            $this->load->view('user_default_view', $data);
        }
        else{
            $this->load->view('default_view');      
        }
    }

    public function load_about(){
        $this->load->library('session');
        $this->load->view('about_view');
    }

    public function login(){
        if(isset($_POST['AdminLogIn'])){
            $this->log_in_model->login_admin();
            $this->load->view('admin_default_view');
        }
        else{ 
            $this->log_in_model->login_user();
            if($this->session->userdata('email')) $this->load->view('user_default_view');
            else $this->load->view('default_view');
        }
    }

    //ADMIN PAGES//
    /*
    #1 Books
        -   This will be the controller for the books feature of the admin.
            The admin can add, delete, update, search, and approve request
            through this page.
        -   This is also the default page for the admin.
    */
    public function admin_default(){
        if($this->session->userdata('type')=="admin")
            $this->load->view('admin_default_view');
        else
            $this->load_home();
    } 

            //ADMIN-BOOKS SUBPAGES//
            public function admin_add_book(){
                if($this->session->userdata('type')=="admin")
                    $this->load->view('material_view');
                else
                    $this->load_home();
            }

            public function admin_update_book(){
                if($this->session->userdata('type')=="admin")
                    $this->load->view('admin_update_book_view');
                else
                    $this->load_home();
            }

            public function admin_delete_book(){
                if($this->session->userdata('type')=="admin")
                    $this->load->view('admin_delete_book_view');
                else
                    $this->load_home();
            }

            public function admin_approve(){
                if($this->session->userdata('type')=="admin")
                    $this->load->view('admin_approve_view');
                else
                    $this->load_home();
            } 

            public function admin_search_book(){
                if($this->session->userdata('type')=="admin"){
                    
                    $data['statistics'] = $this->statistics_model->get_statistics();
                    $data['search_details'] = $this->get_database->search_details($data['statistics']);
                    $this->load->view('admin_search_book_view',$data);

                }
                else
                    $this->load_home();
            }

            public function admin_advanced_search(){
                if($this->session->userdata('type')=="admin")
                    $this->load->view('admin_advanced_search_view');
                else
                    $this->load_home();
            }

            public function admin_manage(){
                if($this->session->userdata('type')=="admin")
                    $this->load->view('admin_manage_view');
                else
                    $this->load_home();
            }

    /*
    #2 Accounts
        -   This will be the controller for the accounts feature of the admin.
            The admin can add, deactivate, reactivate and message the user
            through this page.
    */
    public function admin_account(){
        $count = $this->db->query("SELECT count(email) pendingCount FROM user where status = \"Pending Approval\"");
        foreach($count->result() as $row){
            $data["pendingCount"] = $row->pendingCount;
        }
        if($this->session->userdata('type')=="admin")
            $this->load->view('admin_accounts_view', $data);
        else
                    $this->load_home();
    } 

            //ADMIN-ACCOUNTS SUBPAGES
            public function admin_reactivate(){
                if($this->session->userdata('type')=="admin")
                    $this->load->view('admin_reactivate_view');
                else
                    $this->load_home();
            }    

            public function admin_deactivate(){
                if($this->session->userdata('type')=="admin")
                    $this->load->view('admin_deactivate_view');
                else
                    $this->load_home();
            }  

            public function admin_add_account(){
                if($this->session->userdata('type')=="admin")
                    $this->load->view('admin_add_account_view');
                else
                    $this->load_home();
            }

            public function admin_message(){
                if($this->session->userdata('type')=="admin")
                    $this->load->view('admin_message_view');
                else
                    $this->load_home();
            }

            public function activity(){
                if($this->session->userdata('type')=="admin")
                    $this->load->view('activity_log');
                else
                    $this->load_home();
            }

    /*
    #3 Profile
        -   All users (admin or not) has a profile in which they
            can see their own informations.
        -   Users cannot see the profile of other users.
        -   This is where users can change their passwords.
    */
    public function admin_profile(){
        $email=$this->session->userdata('email');
        $this->db->where(array('email'=>$email));   //user must be in session, change email, get email of user in session
        $data['results'] = $this->db->get('admin')->result();
        if($this->session->userdata('type')=="admin")
            $this->load->view('admin_profile_view', $data);
        else
            $this->load_home();
    }

    public function update_account_admin(){
        $email=$this->input->post('email');
        $input = array(
             'employee_number' => $this->input->post('employee_number'),  
             'first_name' => $this->input->post('first_name'),        
             'middle_name' => $this->input->post('middle_name'),  
             'last_name' => $this->input->post('last_name'),
            );
        $update = $this->update_admin_details($email,$input);
        if($update == 1){
            $this->admin_profile();
        }else{
            $this->admin_profile();
        }
    }

    public function update_admin_details($email,$data){
        $this->db->where('email',$email);
        if(!$this->db->update('admin',$data)){
            return -1;
        }
        else{
            return 1;
        }

    }

    public function get_admin_password($email){
        $statement= "SELECT password, email from admin where email= \"$email\"";
        $query = $this->db->query($statement);

        return $query->result();
    }

    public function update_admin_password($email, $password){
        $statement= "UPDATE admin SET password=\"$password\" where email=\"$email\"";
        $query = $this->db->query($statement);
        return 1;
    }

    public function change_password_view_admin(){
        $email=$this->session->userdata('email');
        $data['results'] = $this->get_admin_password($email);   //user must be in session, change email, get email of user in session
        $this->load->view('admin_change_password_view', $data);
    }

    public function change_password_admin(){
        $email=$this->session->userdata('email');
        $password=$this->input->post('password');
        $update = $this->update_admin_password($email,$password);

        $this->admin_profile();   
    }

    //USER PAGES//
    /*
    #1 Search
    */
    public function user_search_book(){
        $data['notification'] = $this->notification_model->get_notifications();
        $data['statistics'] = $this->statistics_model->get_statistics();
        $data['search_details'] = $this->get_database->search_details($data['statistics']);
        $data['reserved'] = $this->get_database->get_reserve_search();
        $data['bookmarked'] = $this->get_database->get_bookmarked();
        $this->load->view('user_search_book_view',$data);
    }

    public function user_advanced_search(){
        $data['notification'] = $this->notification_model->get_notifications();
        $this->load->view('user_advance_search_view',$data);
    }
    /*
    #2 Profile
    */
    public function user_profile(){
        $data['notification'] = $this->notification_model->get_notifications();
        $this->load->view('user_profile_view',$data);
    }

    public function signup_view() {
        $this->load->view('signup_view');
    }

    public function forgot_password() {
        $this->load->view('forgot_password_view');
    }

    public function logout(){
        $this->session->sess_destroy();
        $this->load->view('default_view');
    }

    public function about_view() {
        $this->load->view('about_view');
    }

    public function contact_us_view() {
        $this->load->view('contact_us_view');   
    }

    public function rules_and_regulations_view() {
        $this->load->view('rules_and_regulations_view');   
    }

    public function submit_operation(){
        $operation = $_GET['operation'];
        $this->load->model('manage_account_model');
        $result = $this->manage_account_model->get_accounts($operation);
        $this->load->view('manage_account_view', array("result" => $result));
    }

}