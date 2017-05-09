<?php
class Auth extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('model_operator');
    }

    function login(){
        if(isset($_POST['submit'])){
            
            //proses login
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $hasil = $this->model_operator->login($username,$password);
            //echo $hasil;
            if($hasil==1){
                
                //update last login
                $this->db->where('username',$username);
                $this->db->update('operator', array('last_login'=>date('Y-m-d')));
                
                $this->session->set_userdata(array('status_login'=>'oke',
                                                   'username'=>$username));
                redirect('dashboard');
            }else{
                $this->template->load('template_login','form_login');
            }
        }  else {
            check_session_login();
            $this->template->load('template_login','form_login');   
        }
    }
    function logout(){
        
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}