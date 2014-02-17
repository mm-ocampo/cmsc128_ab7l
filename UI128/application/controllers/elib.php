<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Elib extends CI_Controller {

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
    public function index()
    {
        $this->load->view('default_view');
    }

    public function load_home(){
        $this->load->view('default_view');
    }

    public function login(){
        if(isset($_POST['AdminLogIn']))
            $this->load->view('admin_default_view');
        else 
            $this->load->view('user_default_view');
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
        $this->load->view('admin_default_view');
    } 

            //ADMIN-BOOKS SUBPAGES//
            public function admin_add_book(){
                $this->load->view('admin_add_book_view');
            }

            public function admin_update_book(){
                $this->load->view('admin_update_book_view');
            }

            public function admin_delete_book(){
                $this->load->view('admin_delete_book_view');
            }

            public function admin_approve(){
                $this->load->view('admin_approve_view');
            } 

            public function admin_search_book(){
                $this->load->view('admin_search_book_view');
            } 

    /*
    #2 Accounts
        -   This will be the controller for the accounts feature of the admin.
            The admin can add, deactivate, reactivate and message the user
            through this page.
    */
    public function admin_account(){
        $this->load->view('admin_accounts_view');
    } 

            //ADMIN-ACCOUNTS SUBPAGES
            public function admin_reactivate(){
                $this->load->view('admin_reactivate_view');
            }    

            public function admin_deactivate(){
                $this->load->view('admin_deactivate_view');
            }  

            public function admin_add_account(){
                $this->load->view('admin_add_account_view');
            }

            public function admin_message(){
                $this->load->view('admin_message_view');
            }


    /*
    #3 Profile
        -   All users (admin or not) has a profile in which they
            can see their own informations.
        -   Users cannot see the profile of other users.
        -   This is where users can change their passwords.
    */
    public function admin_profile(){
        $this->load->view('admin_profile_view');
    }

    public function user_default(){
        $this->load->view('user_default_view');
    }




    //USER PAGES//
    /*
    #1 Search
    */
    public function user_search_book(){
            $this->load->view('user_search_book_view');
    }
    /*
    #2 Profile
    */
    public function user_profile(){
        $this->load->view('user_profile_view');
    }

    public function signup_view() {
        $this->load->view('signup_view');
    }

    public function logout(){
        $this->load->view('default_view');
    }

    public function about_view() {
        $this->load->view('about_view');
    }

    public function contact_us_view() {
        $this->load->view('contact_us_view');   
    }

}