<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller Reserve
 * @version 1.5
 * @author GAGNO, Gabriel John P.
 * @author AMONCIO, Nazi M.
 * @author MALLARI, Jeob Ervin F.
 * @date 2/28/2014
 *
 * @description Controller handling all client-side operations related to reserving materials.
 *
 * @section NOTE TO MAINTENANCE
 * Increment version number, Add name to author's list, change date to current date,
 * and put the changes done in the CHANGE LOG section below. follow format. Indicate
 * the line number(s) that was/were changed.
 *
 * @section CHANGE LOG
 * version 1.0 | GJPGagno, NMAmoncio, JEFMallari | 2/28/2014
 * - Line 1: created the file
 * version 1.5 | GJPGagno | 3/11/2014
 * - (removed) Lines 36-88: removed unnecessary functions
 */
class Reserve extends CI_Controller{
    /**
     * Constructor of the controller, loads all needed models, helpers, and libraries
     * not loaded in the autoload.php file
     *
     * @access public
     *
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('get_database');
        $this->load->model('delete_model');
        $this->load->model('reserve_model');

        $this->load->helper('file');
        $newdata = array(
            'email' => $this->session->userdata('email')
        );

        $this->session->set_userdata($newdata);
        $this->load->helper('file');
    }

    /**
     * Index (default) method of the controller. Calls a method that redirects to the view 'default_view'.
     * @access public
     */
    public function index(){
        $this->home();
    }

    /**
     * Loads the view 'default_view'
     * @access public
     */
    public function home(){
        $this->load->view('default_view');
    }


    /**
     * Loads the book selected by the user and prepares it for reservation.
     * Once the needed data are prepared, this method will then call another
     * method which is now responsible for requesting the reservation.
     *
     * @access public
     */
    public function load_book(){
        if(!$this->input->post('viewbook')){
            $this->load->view('default_view');
        }

        else{
            $newdata = array(
                'email' => $this->session->userdata('email')
            );

            $accession_number = $this->input->post('viewbook');

            $books_reserved = $this->reserve_model->select("SELECT count(*) as number FROM reserves WHERE email=\"".$this->session->userdata('email')."\"");
            foreach ($books_reserved as $row) {
                $books_reserved = $row->number;
            }

            $newdata = array(
                'accession_number' => $accession_number,
                'books_reserved' => $books_reserved
            );
            $this->session->set_userdata($newdata);
            $this->reservation();
            redirect(base_url().'index.php/elib/user_search_book');
        }
    }

    /**
     * Updates the database table 'reserves' and puts a reservation request.
     * A successful operation will also call a logger method to write the activity
     * into a text file.
     *
     * @access public
     */
    public function reservation(){
        $date_reserved = date('Y-m-d H:i:s');
        $email = $this->session->userdata('email');
        $accession_number = $this->session->userdata('accession_number');
        $data = array(
            'email' => $email,
            'accession_number' => $accession_number,
            'date_reserved' => $date_reserved
        );
        $table = 'reserves';
        $this->reserve_model->insert($data,$table);

        $data = array(
            'status' => 'reserved'
        );
        $key = 'accession_number';
        $table = 'material';
        $this->reserve_model->update($data,$accession_number,$key,$table);  //(data,value,key,table)

        $date = date('Y-m-d H:i:s');
        $log_array = array(
            'date_time' => $date,
            'action' => 'reserved',
            'book' => $accession_number,
            'actor' => $this->session->userdata('email')
        );
        $this->reserve_logger($log_array);
    }

    /**
     * Logs the reserve operation
     * @access public
     * @param $array array()
     */
    public function reserve_logger($array){
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
}