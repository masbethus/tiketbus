<?php
class Agen extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('model_agen');
        check_session();
    }
    function index($id=NULL){
        $jml = $this->model_agen->tampilkan_data();

       //pengaturan pagination
        $config['base_url'] = base_url().'agen/index';
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '5';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['next_page'] = '&laquo;';
        $config['prev_page'] = '&raquo;';

       //inisialisasi config
        $this->pagination->initialize($config);

       //buat pagination
        $data['halaman'] = $this->pagination->create_links();

       //tamplikan data
        $data['record'] = $this->model_agen->tampil_paging($config['per_page'], $id);

       //$this->load->view('agen/view_agen', $data);
       $this->template->load('template', 'agen/view_agen', $data);
 }
    function post(){
        if(isset($_POST['submit'])){
            //proses kategori
            $nama_agen  = $this->input->post('nama_agen');
            $kota       = $this->input->post('kota');
            $hp         = $this->input->post('hp');
            $pin        = $this->input->post('pin');
            
            $re = '/^(08|[\d])/';
            $subst = '+628';
            $nohp = preg_replace($re, $subst, $hp, 1);
            
            $data = array(
                          'nama'    => $nama_agen,
                          'kota'    => $kota,
                          'no_hp'   => $nohp,
                          'PIN'     => $pin
            );
            $this->model_agen->post($data);
            redirect('agen');
        }  else {
            $this->template->load('template','agen/form_input');
        }
    }
    function edit($id){
        if(isset($_POST['submit'])){
            //proses kategori
            $id         = $this->input->post('id');
            $nama_agen  = $this->input->post('nama_agen');
            $kota       = $this->input->post('kota');
            $hp         = $this->input->post('hp');
            $pin        = $this->input->post('pin');
            
            $re = '/^(08|[\d])/';
            $subst = '+628';
            $nohp = preg_replace($re, $subst, $hp, 1);
            
            $data = array(
                          'nama'    => $nama_agen,
                          'kota'    => $kota,
                          'no_hp'   => $nohp,
                          'PIN'     => $pin
            );
            $this->model_agen->edit($data,$id);
            redirect('agen');
        }  else {
            $data['record']     = $this->model_agen->get_one($id)->row_array();
            $this->template->load('template','agen/form_edit', $data);
        }
    }
    function hapus(){
        $id = $this->uri->segment(3);
        $this->model_agen->hapus($id);
        redirect('agen');
    }
}