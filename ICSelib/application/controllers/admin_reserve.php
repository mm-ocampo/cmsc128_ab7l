<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Controller Admin_reserve
 * @version 1.0
 * @author GAGNO, Gabriel John P.
 * @author AMONCIO, Nazi M.
 * @date 2/28/2014
 *
 * @description Controller handling the approval of reservation, pickup, and return of books
 * in the system. Also checks for overdue status as well as handling email for reservation.
 *
 * @section NOTE TO MAINTENANCE
 * Increment version number, Add name to author's list, change date to current date,
 * and put the changes done in the CHANGE LOG section below. follow format. Indicate
 * the line number(s) that was/were changed.
 *
 * @section CHANGE LOG
 * version 1.0 | GJPGagno, NMAmoncio | 2/28/2014
 * - Line 1: created the file
 */
class Admin_reserve extends CI_Controller{
    /**
     * Constructor of the controller. loads the needed helpers and models.
     * @access public
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('file');
    }

    /**
     * Index (default) method of the controller. loads the view 'default_view'.
     * @access public
     */
    public function index(){
        $this->load->view('default_view');
    }

    /**
     * Loads the view 'admin_approve_view' which contains the list of current list of reserve requests, pickup lists,
     * and overdue books.
     *
     * @access public
     */
    public function indexes(){
        $data['result']  = $this->admin_model->select("select u.first_name, u.middle_name, u.last_name, u.student_number, u.employee_number, u.is_student, m.title, m.accession_number from user u, material m, reserves r where u.email=r.email and m.accession_number=r.accession_number");
        $data['result2'] = $this->admin_model->select("select u.first_name, u.middle_name, u.last_name, u.student_number, u.employee_number, u.is_student, m.title, m.accession_number from user u, material m, borrows r where u.email=r.email and m.accession_number=r.accession_number and m.status='ready'");
        $data['result3'] = $this->admin_model->select("select u.email, r.date_borrowed, u.first_name, u.middle_name, u.last_name, u.student_number, u.employee_number, u.is_student, m.title, m.accession_number from user u, material m, borrows r where u.email=r.email and m.accession_number=r.accession_number and m.status='borrowed'");

        if($this->session->userdata('type')=="admin")
            $this->load->view('admin_approve_view', $data);
        else
            $this->load->view('default_view');
    }

    /**
     * updates the 'borrows' table with the provided book and deletes that book from
     * the 'reserves' table, signifying that the book has been reserved and is ready
     * for pickup.
     *
     * @access public
     */
    public function add_readyforpickup(){
        $email = $this->admin_model->select("SELECT email FROM reserves WHERE accession_number=\"".$this->input->post('request')."\"");

        foreach ($email as $row){
            $email = $row->email;
        }

        $data = array(
            'email' => $email,
            'accession_number' => $this->input->post('request'),
            'date_borrowed' => date("0000-00-00 00:00:00"),
            'date_approved' => date('Y-m-d H:i:s')
        );

        $table = "borrows";
        $this->admin_model->insert($data,$table);

        $table = "reserves";
        $key   = "accession_number";
        $value = $this->input->post('request');
        $this->db->delete($table, array($key => $value));

        $data = array(
            'status' => 'ready'
        );
        $value = $this->input->post('request');
        $this->db->where($key, $value);
        $this->db->update('material', $data);

        $message = "Hello!\r\nYour request for the book ".$this->input->post('request')." has been approved.\r\nYou may now claim it at the ICS Library, C-124, F.O. Santos Hall (Physical Sciences Bldg).
        \r\n\r\nYours truly,\r\nLibrary Administrator\r\nInstitute of Computer Science\r\nUniversity of the Philippines Los Baños\r\nF.O. Santos Hall, UPLB, College, Laguna 4031";
        $subject = "ICS Library Book Reservation";
        $receiver = $email;

        $this->do_send_email($message,$subject,$receiver);

        $log_array = array(
            'date_time' => date('Y-m-d H:i:s'),
            'action' => 'approve_request',
            'book' => $this->input->post('request'),
            'actor_user' => $email,
            'actor_admin' => $this->session->userdata('email')
        );
        $this->admin_reserve_logger($log_array);

        $this->indexes();
    }

    /**
     * Method that, when called, approves the reservation request
     *
     * @access public
     */
    public function do_approve(){
        $key = "accession_number";
        $data = array(
            'status' => 'borrowed'
        );
        $value = $this->input->post('reserve');
        $this->db->where($key, $value);
        $this->db->update('material', $data);

        $email = $this->admin_model->select("SELECT email FROM borrows WHERE accession_number=\"".$this->input->post('reserve')."\"");

        foreach ($email as $row){
            $email = $row->email;
        }

        $books_borrowed = $this->admin_model->select("SELECT count(*) as number FROM borrows WHERE date_borrowed!=\"0000-00-00\" and email=\"".$email."\"");
        foreach ($books_borrowed as $row) {
            $books_borrowed = $row->number;
        }

        $data = array(
            'books_borrowed' => $books_borrowed + 1
        );

        $value = $this->input->post('reserve');
        $this->db->where('email', $email);
        $this->db->update('user', $data);

        $borrow_count = $this->admin_model->select("SELECT borrow_count FROM material WHERE title LIKE (SELECT title FROM material WHERE accession_number LIKE  \"$value\") LIMIT 0 , 1");
        $title = $this->admin_model->select("SELECT title FROM material WHERE accession_number LIKE  \"$value\"");
        foreach($borrow_count as $row){
            $borrow_count = $row->borrow_count;
        }
        foreach($title as $row){
            $title = $row->title;
        }
        $value = $this->input->post('reserve');
        $this->db->where('email', $email);
        $this->db->update('user', $data);
        $data = array(
            'borrow_count' => $borrow_count + 1
        );
        $this->db->where('title', $title);
        $this->db->update('material', $data);

        $data = array(
            'date_borrowed' => date('Y-m-d H:i:s')
        );
        $value = $this->input->post('reserve');
        $this->db->where($key, $value);
        $this->db->update('borrows', $data);

        $log_array = array(
            'date_time' => date('Y-m-d H:i:s'),
            'action' => 'approve_borrow',
            'book' => $this->input->post('reserve'),
            'actor_user' => $email,
            'actor_admin' => $this->session->userdata('email')
        );
        $this->admin_reserve_logger($log_array);

        $this->indexes();
    }

    /**
     * Method that, when called, sets the material status to 'available'.
     * @access public
     */
    public function do_return(){
        $key = "accession_number";
        $data = array(
            'status' => 'available'
        );
        $value = $this->input->post('borrowed');
        $this->db->where($key, $value);
        $this->db->update('material', $data);

        $email = $this->admin_model->select("SELECT email FROM borrows WHERE accession_number=\"".$this->input->post('borrowed')."\"");

        foreach ($email as $row) {
            $email = $row->email;
        }

        $books_borrowed = $this->admin_model->select("SELECT count(*) as number FROM borrows WHERE date_borrowed!=\"0000-00-00\" and email=\"".$email."\"");
        foreach ($books_borrowed as $row) {
            $books_borrowed = $row->number;
        }
        $data = array(
            'books_borrowed' => $books_borrowed - 1
        );
        $value = $this->input->post('borrowed');
        $this->db->where('email', $email);
        $this->db->update('user', $data);

        $table = "borrows";
        $key = "accession_number";
        $value = $this->input->post('borrowed');
        $this->db->delete($table, array($key => $value));

        $log_array = array(
            'date_time' => date('Y-m-d H:i:s'),
            'action' => 'approve_return',
            'book' => $this->input->post('borrowed'),
            'actor_user' => $email,
            'actor_admin' => $this->session->userdata('email')
        );
        $this->admin_reserve_logger($log_array);

        $this->indexes();
    }

    public function admin_approve(){
        if($this->session->userdata('type')=="admin")
            $this->load->view('admin_approve_view');
        else
            $this->load->view('default_view');
    } 

    public function do_send_email($message,$subject,$receiver){
        $config = Array(
            'protocol' => 'smtp',                               //used this instead of sendmail.. bullshit yon
            'smtp_host' => 'ssl://smtp.googlemail.com',         //gmail ang gamit
            'smtp_port' => 465,                                 //port for gmail
            'smtp_user' => 'ics.elib.admistrator@gmail.com',    //username mo sa gmail
            'smtp_pass' => 'icselibadmin'                       //password mo sa gmail

        );
        $this->load->library('email', $config);                 //load email together dun sa config
        
        $this->email->set_newline("\r\n");
        $this->email->from($config['smtp_user'],'ICS e-lib Admistrator');
        $this->email->to($receiver);
        $this->email->subject($subject);
        $this->email->message($message);

        //check if email send is successful. if not, then display some catchment error.
        return $this->email->send();
    }

    public function admin_reserve_logger($array){
        $date = date('Y-m-d');
        $string = read_file("./application/logs/log-{$date}.txt");
        if($string==false){
            $data = $array['date_time']." ".$array['actor_admin']." ".$this->admin_reserve_logger_sorter($array['action'])." ".$array['actor_user']." for ".$array['book'];
        }
        else{
            $new_data = $array['date_time']." ".$array['actor_admin']." ".$this->admin_reserve_logger_sorter($array['action'])." ".$array['actor_user']." for ".$array['book'];
            $data = $string."\r\n".$new_data;
        }
        write_file("./application/logs/log-{$date}.txt", $data);
    }

    public function admin_reserve_logger_sorter($action){
        //three actions: approve_request, approve_borrow, approve_return
        switch($action){
            case 'approve_request':
                $data = 'has approved the reservation request of';
                break;
            case 'approve_borrow':
                $data = 'has approved the borrow request of';
                break;
            case 'approve_return':
                $data = 'has approved the return request of';
                break;
        }
        return $data;
    }
}
