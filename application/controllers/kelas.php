<?php
class Kelas extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('model_kelas');
        check_session();
    }
    
    function index($id=NULL){
        $jml = $this->db->get('kelas');

       //pengaturan pagination
        $config['base_url'] = base_url().'kelas/index';
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
        $data['record'] = $this->model_kelas->tampil_paging($config['per_page'], $id);

       //$this->load->view('kelas/view_kelas', $data);
       $this->template->load('template', 'kelas/view_kelas', $data);
 }
    function post(){
        if(isset($_POST['submit'])){
            //proses kategori
            $nama_kls   = $this->input->post('nama_kelas');
            $jml_kursi  = $this->input->post('jml_kursi');
            $data = array(
                          'nama_kelas'  => $nama_kls,
                          'jumlah_kursi'=> $jml_kursi
            );
            $this->model_kelas->post($data);
            redirect('kelas');
        }  else {
            $this->template->load('template','kelas/form_input');
        }
    }
    function edit($id){
        if(isset($_POST['submit'])){
            //proses kategori
            $id         = $this->input->post('id');
            $nama_kls   = $this->input->post('nama_kelas');
            $jml_kursi  = $this->input->post('jml_kursi');
            $data = array(
                          'nama_kelas'  => $nama_kls,
                          'jumlah_kursi'=> $jml_kursi
            );
            $this->model_kelas->edit($data,$id);
            redirect('kelas');
        }  else {
            $data['record']     = $this->model_kelas->get_one($id)->row_array();
            $this->template->load('template','kelas/form_edit', $data);
        }
    }
    function hapus(){
        $id = $this->uri->segment(3);
        $this->model_kelas->hapus($id);
        redirect('kelas');
    }
}
