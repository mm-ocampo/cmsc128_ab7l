<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller {

    function Notification(){
        parent::__construct();
        $this->load->model('notification_model');
        $this->load->library('session');
    }

    public function get_notification(){
        $this->notification_model->get_notifications();
    }

    public function get_notification_ajax(){
        $this->notification_model->get_notifications_ajax();
    }

    public function print_notification(){
        $this->notification_model->print_notifications();
    }
}