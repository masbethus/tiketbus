<?php
class Inbox extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('model_inbox');
        check_session();
    }
    
    function index($id=NULL){
        $jml = $this->db->get('inbox');

       //pengaturan pagination
        $config['base_url'] = base_url().'inbox/index';
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
        $data['record'] = $this->model_inbox->tampil_paging($config['per_page'], $id);

       //$this->load->view('grabing/view_inbox', $data);
       $this->template->load('template', 'inbox/view_inbox', $data);
 }

    function hapus(){
        $id = $this->uri->segment(3);
        $this->model_inbox->hapus($id);
        redirect('inbox');
    }
}
