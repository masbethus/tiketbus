<?php
class Operator extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('model_operator');
        check_session();
    }


    function index(){
        
        
        $data['record'] = $this->model_operator->tampilkan_data()->result();
        //$this->load->view('operator/lihat_data',$data);
        $this->template->load('template','operator/view_operator',$data);
    }
    function post(){
        if(isset($_POST['submit'])){
                $nama       = $this->input->post('nama',TRUE);
                $username   = $this->input->post('username',TRUE);
                $passwd     = $this->input->post('password',TRUE);

                $data = array('nama_lengkap'=>$nama,
                              'username'=>$username,
                              'password'=>  md5($passwd));
                $this->model_operator->post($data);
                redirect('operator');
        }  else {
                $this->load->model('model_operator');
                //$this->load->view('operator/form_input');
                $this->template->load('template','operator/form_input');
        }
    }
    function edit(){
     if(isset($_POST['submit'])){
                $id         = $this->input->post('id',TRUE);
                $nama       = $this->input->post('nama',TRUE);
                $username   = $this->input->post('username',TRUE);
                $passwd     = $this->input->post('password',TRUE);

                if(empty($passwd)){
                    $data = array('nama_lengkap'=>$nama,
                                  'username'    =>$username,
                                  'password'    => md5($passwd));
                }  else {
                    $data = array('nama_lengkap'=>$nama,
                                  'username'    =>$username,
                                  'password'    => md5($passwd));
                }
            $query = $this->model_operator->edit($data,$id);
            
            redirect('operator');
     } else {
            $id = $this->uri->segment(3);
            $this->load->model('model_operator');
            $data['record']     = $this->model_operator->get_one($id)->row_array();
            //$this->load->view('operator/form_edit',$data);
            $this->template->load('template','operator/form_edit',$data);
        }
    }
    function hapus($id){
        //$id = $this->uri->segment(3);
        $this->db->where('operator_id',$id);
        $this->db->delete('operator');
        redirect('operator');
    }
}