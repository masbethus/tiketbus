<?php
class Balance extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('model_balance');
        $this->load->helper('balance');
        check_session();
    }
    function index($id=NULL){   
        $jml = $this->db->get('balance');

       //pengaturan pagination
        $config['base_url'] = base_url().'balance/index';
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '10';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['next_page'] = '&laquo;';
        $config['prev_page'] = '&raquo;';

       //inisialisasi config
        $this->pagination->initialize($config);

       //buat pagination
        $data['halaman'] = $this->pagination->create_links();

       //tamplikan data
        $data['record'] = $this->model_balance->tampil_paging($config['per_page'], $id);

       //$this->load->view('kelas/view_kelas', $data);
       $this->template->load('template', 'balance/view_balance', $data);
    }
    function post(){
        if(isset($_POST['submit'])){
            $idagen     = $this->input->post('id_agen');
            $kdawal     = $this->input->post('kode_awal');
            $kdakhir    = $this->input->post('kode_akhir');
            $data =   array('agen_id'   =>$idagen,
                            'kode_awal' =>$kdawal,
                            'kode_akhir'=>$kdakhir);
            $this->model_balance->post($data);
            redirect('balance');
        }  else {
            $this->load->model('model_agen');
            $data['agen']    = $this->model_agen->tampilkan_data()->result();
            $this->template->load('template','balance/form_input', $data);
            
        }
    }
    function edit(){
     if(isset($_POST['submit'])){
            $id          = $this->input->post('id');
            $idagen     = $this->input->post('id_agen');
            $kdawal     = $this->input->post('kode_awal');
            $kdakhir    = $this->input->post('kode_akhir');
            $data =   array('agen_id'   =>$idagen,
                            'kode_awal' =>$kdawal,
                            'kode_akhir'=>$kdakhir);
            $this->model_balance->post($data);                      
            $this->model_balance->edit($data,$id);
            redirect('balance');
     } else {
            $id = $this->uri->segment(3);
            $this->load->model('model_agen');
            $data['agen']    = $this->model_agen->tampilkan_data()->result();
            $data['record']     = $this->model_balance->get_one($id)->row_array();
            $this->template->load('template','balance/form_edit', $data);
        }
    }
    function hapus(){
        $id = $this->uri->segment(3);
        $this->model_balance->hapus($id);
        redirect('balance');
    }
}