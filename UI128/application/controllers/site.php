<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

    function Site(){

        parent::__construct();

        $this->load->model('get_database');
        $this->load->model('delete_model');
        $this->load->library('session');
        $this->load->model('log_in_model');
        $this->load->helper('url');
        $this->load->helper('form');

    }

    public function index(){

        $this->home();

    }

    public function home(){

        $this->load->view('default_view');

    }

    public function login(){
        if(isset($_POST['AdminLogIn'])){
            $this->log_in_model->login_admin();
            $this->load->view('admin_default_view');
        }
        else{ 
            $this->log_in_model->login_user();
            if($this->session->userdata('email')){
                $email = $this->session->userdata('email');
                $data['results']=$this->get_database->get_bookmarks($email);
                $data['results2']=$this->get_database->get_author_for_bookmarks($email);
                $data['bookmark_count'] = $this->get_database->get_count_bookmark($email);
                $this->load->view('user_default_view',$data);
            }
            else $this->load->view('default_view');
        } 
            
    }

    public function callResults(){
        $this->load->view('admin_search_results_view');
    }


    public function search(){

        if (!$this->input->get('search_query') || !$this->input->get('format') && $this->session->userdata('type')=='user'){
            $this->load->view('user_search_book_view');
        }
        else if (!$this->input->get('search_query') || !$this->input->get('format') && $this->session->userdata('type')=='admin'){
            $this->load->view('admin_search_book_view');
        }

        else{
            $data['search'] = $this->get_database->search();
            $data['result_count'] = $this->get_database->count_results();

            if($data['search'] == "error" || $data['result_count'] == "error")		
                $this->load->view('user_search_book_view');
            else if($this->session->userdata('type')=="user"){

                $data['reserved'] = $this->get_database->get_reserve();
                $data['bookmarked'] = $this->get_database->get_bookmarked();
                $this->load->view('user_search_results_view',$data);

            }
            else if($this->session->userdata('type')=="admin")
                $this->load->view('admin_search_results_view',$data);
        }

    }

    public function suggest(){

        $this->get_database->suggest();

    }


    public function delete(){

        if (isset($_GET['id']))						// get this
        {											// get this
            $id = $_GET['id'];						// get this
            $this->delete_model->delete_material($id);	// get this
            $this->load->view('user_search_book_view');
        }


    }

//Thea's code starts here
    public function update_material(){
        $accession_number= $this->input->post('accession_number');
        $data['results'] = $this->get_database->get_book_details($accession_number);
        $data['results2'] = $this->get_database->get_book_author($accession_number);
        $this->load->view('edit_book_details_view', $data);
    }

    public function update_material_details(){
            $data2= $this->input->post('inputAuthor');
            $accession_number = $this->input->post('accession_number');
            $data = array(
             'accession_number' => $this->input->post('accession_number'),        
             'publisher' => $this->input->post('inputPublisher'),  
             'copyright_year' => $this->input->post('inputYear'),
             'title' => $this->input->post('inputTitle'),
             'subject' => $this->input->post('inputSubject'),
             'type' => $this->input->post('type')
            );
            $this->get_database->update_book_model($accession_number,$data);
            $this->get_database->update_book_author($accession_number,$data2);
            echo "Update Succesful :)";
            $this->load->view('home_view');
    }

    public function delete_author(){
            $accession_number = $this->input->post('accession_number');
            $author = $this->input->post('author');

            $this->get_database->update_book_author($accession_number,$author);
    }
//Thea's codes ends here

//Start of my library functions

//Thea's code as of 2/9/14
    public function get_my_library_data(){
        $email= $this->session->userdata('email');//$this->session->userdata('email');
        $data['results']=$this->get_database->get_bookmarks($email);
        $data['results2']=$this->get_database->get_author_for_bookmarks($email);
        $data['bookmark_count'] = $this->get_database->get_count_bookmark($email);
        $this->load->view('user_default_view', $data);
    }

    public function bookmark(){
        $accession_number= $this->input->post('accession_number');
        $email= $this->input->post('email');
        $this->get_database->add_bookmark($accession_number,$email);
        
        $email= $this->session->userdata('email');//$this->session->userdata('email');
        $data['results']=$this->get_database->get_bookmarks($email);
        $data['results2']=$this->get_database->get_author_for_bookmarks($email);
        $data['bookmark_count'] = $this->get_database->get_count_bookmark($email);
        $this->load->view('user_default_view', $data);

    }
//End of Thea's code as of 2/9/14

//Ara's codes as of 2/11/14 
    public function remove_bookmark(){
        $accession_number= $this->input->post('accession_number');
        $email= $this->input->post('email');
        $this->get_database->delete_bookmark($accession_number,$email);
        echo "Book removed from My Library.";

        $email= $this->session->userdata('email');//$this->session->userdata('email');
        $data['results']=$this->get_database->get_bookmarks($email);
        $data['results2']=$this->get_database->get_author_for_bookmarks($email);
        $this->load->view('user_default_view', $data);
    }
//end of my library functions

//Start of user_update functions
    public function user_update_view(){
        $email=$this->session->userdata('email');//$this->session->userdata('email');
        $data['results'] = $this->get_database->get_user_details($email);   //user must be in session, change email, get email of user in session
        $this->load->view('user_profile_view', $data);

    }

    public function update_account(){
        $input = $this->input->post();
        //print_r($input); die();
        $update = $this->get_database->update_user_details($input['email'],$input);
        if($update == 1){
            echo 'update successful!';
            $this->load->view('home_view');

        }else{
            echo 'error occured';
            $this->load->view('home_view');
        }
    }
//end of user update functions

}
