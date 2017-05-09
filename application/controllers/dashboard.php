<?php
class Dashboard extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('dashboard');
        check_session();
    }
    
    function index(){
        $data['user'] = $this->session->userdata('username');
        $this->template->load('template','view_dashboard',$data);
        //$this->load->view('view_dashboard', $data);
    }
}