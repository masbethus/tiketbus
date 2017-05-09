<?php
class Jadwal extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('model_jadwal');
        check_session();
    }
    
    function index($id=NULL){
        $jml = $this->db->get('jadwal');

       //pengaturan pagination
        $config['base_url'] = base_url().'jadwal/index';
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
        $data['record'] = $this->model_jadwal->tampil_paging($config['per_page'], $id);

       //$this->load->view('jadwal/view_jadwal', $data);
       $this->template->load('template', 'jadwal/view_jadwal', $data);
 }
    function post(){
        if(isset($_POST['submit'])){
            //proses jadwal
            $jam        = $this->input->post('jam_berangkat');
            $jurusan    = $this->input->post('jurusan');
            $data = array(
                          'jam_berangkat'  => strtoupper($jam),
                          'jurusan'=> $jurusan
            );
            $this->model_jadwal->post($data);
            redirect('jadwal');
        }  else {
            $this->template->load('template','jadwal/form_input');
        }
    }
    function edit($id){
        if(isset($_POST['submit'])){
            //proses kategori
            $id         = $this->input->post('id');
            $jam        = $this->input->post('jam_berangkat');
            $jurusan    = $this->input->post('jurusan');
            $data = array(
                          'jam_berangkat'  => strtoupper($jam),
                          'jurusan'=> $jurusan
            );
            $this->model_jadwal->edit($data,$id);
            redirect('jadwal');
        }  else {
            $data['record']     = $this->model_jadwal->get_one($id)->row_array();
            $this->template->load('template','jadwal/form_edit', $data);
        }
    }
    function hapus(){
        $id = $this->uri->segment(3);
        $this->model_jadwal->hapus($id);
        redirect('jadwal');
    }
}
