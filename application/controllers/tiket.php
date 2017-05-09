<?php
class Tiket extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('model_tiket');
        $this->load->helper('balance');
        check_session();
    }
    function index($id=NULL){   
        $jml = $this->model_tiket->get_tiket();

       //pengaturan pagination
        $config['base_url'] = base_url().'tiket/index';
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
        $data['record'] = $this->model_tiket->tampil_paging($config['per_page'], $id);

       //$this->load->view('kelas/view_kelas', $data);
       $this->template->load('template', 'tiket/view_tiket', $data);
    }
    function post(){
        if(isset($_POST['submit'])){
            $kdtiket     = $this->input->post('kd_tiket');
            $idkelas     = $this->input->post('id_kelas');
            $jurusan     = $this->input->post('jurusan');
            $harga       = $this->input->post('harga');
            $jenis_tiket = $this->input->post('jenis_tiket');
            $data =   array('kode_tiket' =>  strtoupper($kdtiket),
                            'id_kelas'   =>$idkelas,
                            'id_jadwal'    =>$jurusan,
                            'harga'      =>$harga,
                            'jenis_tiket'=>$jenis_tiket);
            $this->model_tiket->post($data);
            redirect('tiket');
        }  else {
            $this->load->model(array('model_kelas','model_jadwal'));
            $data['kelas']      = $this->model_kelas->tampilkan_data()->result();
            $data['jurusan']    = $this->model_jadwal->tampilkan_data()->result();
            $this->template->load('template','tiket/form_input', $data);
            
        }
    }
    function edit(){
     if(isset($_POST['submit'])){
            $id          = $this->input->post('id');
            $kdtiket     = $this->input->post('kd_tiket');
            $idkelas     = $this->input->post('id_kelas');
            $jurusan     = $this->input->post('jurusan');
            $harga       = $this->input->post('harga');
            $jenis_tiket = $this->input->post('jenis_tiket');
            $data =   array('kode_tiket' =>$kdtiket,
                            'id_kelas'   =>$idkelas,
                            'id_jadwal'    =>$jurusan,
                            'harga'      =>$harga,
                            'jenis_tiket'=>$jenis_tiket);
                      
            $this->model_tiket->edit($data,$id);
            
            redirect('tiket');
     } else {
            $id = $this->uri->segment(3);
            $this->load->model(array('model_kelas','model_jadwal'));
            $data['kelas']      = $this->model_kelas->tampilkan_data()->result();
            $data['jurusan']    = $this->model_jadwal->tampilkan_data()->result();
            $data['record']     = $this->model_tiket->get_one($id)->row_array();
            $this->template->load('template','tiket/form_edit', $data);
        }
    }
    function hapus(){
        $id = $this->uri->segment(3);
        $this->model_tiket->hapus($id);
        redirect('tiket');
    }
}