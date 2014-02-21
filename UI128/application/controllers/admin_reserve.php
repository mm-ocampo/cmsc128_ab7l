<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_reserve extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model');
    }

    public function index(){
        $this->load->view('default_view');
    }

    public function indexes(){
        $data['result'] = $this->admin_model->select("select u.first_name, u.middle_name, u.last_name, u.student_number, u.employee_number, u.is_student, m.title, m.accession_number from user u, material m, reserves r where u.email=r.email and m.accession_number=r.accession_number");
        $data['result2'] = $this->admin_model->select("select u.first_name, u.middle_name, u.last_name, u.student_number, u.employee_number, u.is_student, m.title, m.accession_number from user u, material m, borrows r where u.email=r.email and m.accession_number=r.accession_number and m.status='ready'");
        $data['result3'] = $this->admin_model->select("select u.email, r.date_borrowed, u.first_name, u.middle_name, u.last_name, u.student_number, u.employee_number, u.is_student, m.title, m.accession_number from user u, material m, borrows r where u.email=r.email and m.accession_number=r.accession_number and m.status='borrowed'");
        $this->load->view('admin_approve_view', $data);
    }

    public function reservations(){
        $this->load->model('admin_model');

        $data['results'] = $this->admin_model->select("select * from reserves");

        $this->load->view('admin_view',$data);
    }

    public function borrow_list(){
        $this->load->model('admin_model');

        $data['results'] = $this->admin_model->select("select * from borrows");

        $this->load->view('admin_view',$data);

    }

    public function add_readyforpickup(){
        $this->load->model('admin_model');

        $email = $this->admin_model->select("SELECT email FROM reserves WHERE accession_number=\"".$this->input->post('request')."\"");

        foreach ($email as $row) {
            $email = $row->email;
        }

        $data = array(
            'email' => $email,
            'accession_number' => $this->input->post('request'),
            'date_borrowed' => date("0000-00-00"),
            'date_approved' => date("Y-m-d")
        );
        $table = "borrows";
        $this->admin_model->insert($data,$table);

        $table = "reserves";
        $key = "accession_number";
        $value = $this->input->post('request');
        $this->db->delete($table, array($key => $value));

        $data = array(
            'status' => 'ready'
        );
        $value = $this->input->post('request');
        $this->db->where($key, $value);
        $this->db->update('material', $data);


        $this->indexes();
    }


    public function do_approve(){
        $key = "accession_number";
        $data = array(
            'status' => 'borrowed'
        );
        $value = $this->input->post('reserve');
        $this->db->where($key, $value);
        $this->db->update('material', $data);


        $email = $this->admin_model->select("SELECT email FROM borrows WHERE accession_number=\"".$this->input->post('reserve')."\"");

        foreach ($email as $row) {
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



        $data = array(
            'date_borrowed' => date("Y-m-d")
        );
        $value = $this->input->post('reserve');
        $this->db->where($key, $value);
        $this->db->update('borrows', $data);

        $message = "book with accession number ".$this->input->post('reserve')." has been approved";
        $subject = "reservation";
        $email = "gjpgagno@gmail.com";
        $receiver = $email;
        $this->do_send_email($message,$subject,$receiver);

        $this->indexes();

    }

    public function do_return(){
        $this->load->model('admin_model');
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

        $this->indexes();
    }

    public function admin_approve(){
                $this->load->view('admin_approve_view');
    } 

    public function do_send_email($message,$subject,$receiver){
        $config = Array(
            'protocol' => 'smtp',                               //used this instead of sendmail.. bullshit yon
            'smtp_host' => 'ssl://smtp.googlemail.com',         //gmail ang gamit
            'smtp_port' => 465,                                 //port for gmail
            'smtp_user' => 'uplbicslibrarysender@gmail.com',    //username mo sa gmail
            'smtp_pass' => 'pinakamalaki'                       //password mo sa gmail

        );
        $this->load->library('email', $config);                 //load email together dun sa config
        $this->email->set_newline("\r\n");

        $this->email->from($config['smtp_user'],'ICS Librarian');
        $this->email->to($receiver);
        $this->email->subject($subject);

        $this->email->message($message);


        if($this->email->send()) echo "Email Sent to ".$receiver." and was sent by ".$config['smtp_user'];
        else echo $this->email->print_debugger();   //if fail, prints the debugger
        //btw, in order na gumana to., you need to uncomment this shit
        //              extension=php_openssl.dll    ->   sa php.ini...
        //and select mo ang
        //              ssl_module                   ->   apache
        //after that, restart then voila,., fuck bitch success shit..
    }
}
