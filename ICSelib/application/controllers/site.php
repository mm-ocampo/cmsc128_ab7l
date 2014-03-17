<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

    function Site(){
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('get_database');
        $this->load->model('delete_model');
        $this->load->library('session');
        $this->load->model('log_in_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('file');
    }

    public function index(){

        $this->load->view('default_view');

    }

    public function login(){
        if(isset($_POST['AdminLogIn'])){
            $this->log_in_model->login_admin();
            if($this->session->userdata('email')){
                $this->load->view('admin_default_view');
            }
            else $this->load->view('default_view');
        }
        else{ 
            $this->log_in_model->login_user();
            if($this->session->userdata('email')){
                $email = $this->session->userdata('email');
                $data['results']=$this->get_database->get_bookmarks($email);
                $data['results2']=$this->get_database->get_author_for_bookmarks($email);
                $data['bookmark_count'] = $this->get_database->get_count_bookmark($email);
                $data['reserved_materials'] = $this->get_database->get_reserve($email);
                $data['book_titles'] = $this->get_database->get_title($email);

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
        else if (!$this->input->get('search_query') || !$this->input->get('format')){
            $this->load->view('default_view');
        }
        else{
            $data['search'] = $this->get_database->search();
            $data['result_count'] = $this->get_database->count_results();

            if(($data['search'] == "error" || $data['result_count'] == "error") && $this->session->userdata('type')=="user")        
                $this->load->view('user_search_book_view');

            else if(($data['search'] == "error" || $data['result_count'] == "error") && $this->session->userdata('type')=="admin")       
                $this->load->view('admin_search_book_view');

            
            else if($this->session->userdata('type')=="admin")
                $this->load->view('admin_search_results_view',$data);

            else if($this->session->userdata('type')=="user"){
                $data['reserved'] = $this->get_database->get_reserve_search();
                $data['bookmarked'] = $this->get_database->get_bookmarked();
                $this->load->view('user_search_book_view',$data);
            }
            else{
                $this->load->view('guest_search_results',$data);
            }
        }
    }

    public function advanced_search(){
        if (!$this->input->get('filter1') || !$this->input->get('filter2') || !$this->input->get('filter3') || !$this->input->get('boolean1') || !$this->input->get('boolean2') || !$this->input->get('format') && $this->session->userdata('type') == 'user'){
            $this->load->view('user_search_book_view');
        }
        else if (!$this->input->get('filter1') || !$this->input->get('filter2') || !$this->input->get('filter3') || !$this->input->get('boolean1') || !$this->input->get('boolean2') || !$this->input->get('format') && $this->session->userdata('type') == 'admin'){
            $this->load->view('admin_search_book_view');
        }
        else{
            $data['search'] = $this->get_database->advanced_search();
            $data['result_count'] = $this->get_database->advanced_count_results();

            if($data['search'] == "error" || $data['result_count'] == "error")      
                $this->load->view('user_search_book_view');
            else if($this->session->userdata('type')=="user"){
                $data['reserved'] = $this->get_database->get_reserve_search();
                $data['bookmarked'] = $this->get_database->get_bookmarked();
                $this->load->view('user_advanced_results_view',$data);
            }
            else if($this->session->userdata('type')=="admin")
                $this->load->view('admin_advanced_results_view',$data);

        }

    }

    public function suggest(){
        $this->get_database->suggest();
    }


    public function delete(){
        if (isset($_GET['id']) && $_GET['confirm'] == 'true'){
            $id = $_GET['id'];
            $this->delete_model->delete_material($id);
        }
        $this->load->view('admin_search_book_view');
    }

    public function update_material(){
        $accession_number= $this->input->post('accession_number');
        $data['results'] = $this->get_database->get_book_details($accession_number);
        $data['results2'] = $this->get_database->get_book_author($accession_number);
        $this->load->view('edit_book_details_view', $data);
    }

    public function update_material_details(){
        $data2= $this->input->post('inputAuthor');
        $array = array();
        $i = 0;

        foreach($this->input->post('inputAuthor') as $temp){
            if($temp != ""){
                $array[$i] = $temp;
                $i++;
            }
        }

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
        $this->get_database->update_book_author($accession_number,$array);
        $this->load->view('admin_search_book_view');
    }

    public function delete_author(){
        $accession_number = $this->input->post('accession_number');
        $author = $this->input->post('author');

        $this->get_database->update_book_author($accession_number,$author);
    }

    public function get_my_library_data(){
        $email= $this->session->userdata('email');
        $data['results']=$this->get_database->get_bookmarks($email);
        $data['results2']=$this->get_database->get_author_for_bookmarks($email);
        $data['bookmark_count'] = $this->get_database->get_count_bookmark($email);
        $data['reserved_materials'] = $this->get_database->get_reserve($email);
        $data['book_titles'] = $this->get_database->get_title($email);
        $this->load->view('user_default_view', $data);
    }

    public function bookmark(){
        $accession_number= $this->input->post('accession_number');
        $email= $this->input->post('email');
        $this->get_database->add_bookmark($accession_number,$email);
        
        $email= $this->session->userdata('email');
        $data['results']=$this->get_database->get_bookmarks($email);
        $data['results2']=$this->get_database->get_author_for_bookmarks($email);
        $data['bookmark_count'] = $this->get_database->get_count_bookmark($email);

        $log_array = array(
            'date_time' => date('Y-m-d H:i:s'),
            'action' => 'canceled reservation',
            'book' => $accession_number,
            'actor' => $this->session->userdata('email')
        );
        $this->bookmark_logger($log_array);

        $this->load->view('user_default_view', $data);

    }

    public function remove_reserve(){
        $accession_number = $this->input->post('reserved_book');
        //remove from borrows table;
        $key = 'accession_number';
        $value = $accession_number;
        $this->admin_model->delete($value, $key, 'borrows');
        //update material to available
        $this->admin_model->update(array('status'=>'available'),$value,$key,'material');

        $log_array = array(
            'date_time' => date('Y-m-d H:i:s'),
            'action' => 'canceled reservation',
            'book' => $accession_number,
            'actor' => $this->session->userdata('email')
        );
        $this->bookmark_reserve_logger($log_array);

        $this->login();
    }

    public function remove_bookmark(){
        $accession_number= $this->input->post('accession_number');
        $email= $this->input->post('email');
        $this->get_database->delete_bookmark($accession_number,$email);
        echo "Book removed from My Library.";

        $email= $this->session->userdata('email');
        $data['bookmark_count'] = $this->get_database->get_count_bookmark($email);
        $data['results']=$this->get_database->get_bookmarks($email);
        $data['results2']=$this->get_database->get_author_for_bookmarks($email);

        $log_array = array(
            'date_time' => date('Y-m-d H:i:s'),
            'action' => 'canceled bookmark',
            'book' => $accession_number,
            'actor' => $this->session->userdata('email')
        );
        $this->cancel_bookmark_reserve_logger($log_array);

        $this->load->view('user_default_view', $data);
    }

    public function user_update_view(){
        $email=$this->session->userdata('email');
        $data['results'] = $this->get_database->get_user_details($email);
        $this->load->view('user_profile_view', $data);

    }

    public function update_account(){
        $input = $this->input->post();
        $update = $this->get_database->update_user_details($input['email'],$input);
        if($update == 1){
            echo 'update successful!';
            $this->load->view('home_view');

        }else{
            echo 'error occured';
            $this->load->view('home_view');
        }

        $log_array = array(
            'date_time' => date('Y-m-d H:i:s'),
            'action' => 'updated account details',
            'actor' => $this->session->userdata('email')
        );
        $this->cancel_bookmark_reserve_logger($log_array);
    }

//end of user update functions

//start of logger functions

    public function bookmark_logger($array){
        $date = date('Y-m-d');
        $string = read_file("./application/logs/log-{$date}.txt");
        if($string==false){
            $data = $array['date_time']." ".$array['actor']." ".$array['action']." ".$array['book'];
        }
        else{
            $new_data = $array['date_time']." ".$array['actor']." ".$array['action']." ".$array['book'];
            $data = $string."\r\n".$new_data;
        }
        write_file("./application/logs/log-{$date}.txt", $data);
    }

    public function cancel_bookmark_reserve_logger($array){
        $date = date('Y-m-d');
        $string = read_file("./application/logs/log-{$date}.txt");
        if($string==false){
            $data = $array['date_time']." ".$array['actor']." of ".$array['action']." ".$array['book'];
        }
        else{
            $new_data = $array['date_time']." ".$array['actor']." of ".$array['action']." ".$array['book'];
            $data = $string."\r\n".$new_data;
        }
        write_file("./application/logs/log-{$date}.txt", $data);
    }

    public function update_user_logger($array){
        $date = date('Y-m-d');
        $string = read_file("./application/logs/log-{$date}.txt");
        if($string==false){
            $data = $array['date_time']." ".$array['actor'].$array['action'];
        }
        else{
            $new_data = $array['date_time']." ".$array['actor'].$array['action'];
            $data = $string."\r\n".$new_data;
        }
        write_file("./application/logs/log-{$date}.txt", $data);
    }

    public function update_book_logger($array){
        $date = date('Y-m-d');
        $string = read_file("./application/logs/log-{$date}.txt");
        if($string==false){
            $data = $array['date_time']." ".$array['actor'].$array['action'];
        }
        else{
            $new_data = $array['date_time']." ".$array['actor'].$array['action'];
            $data = $string."\r\n".$new_data;
        }
        write_file("./application/logs/log-{$date}.txt", $data);
    }
}
