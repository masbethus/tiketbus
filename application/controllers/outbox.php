<?php
class Outbox extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('model_outbox');
        check_session();
    }
    
    function index($id=NULL){
        $jml = $this->db->get('outbox');

       //pengaturan pagination
        $config['base_url'] = base_url().'outbox/index';
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '15';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['next_page'] = '&laquo;';
        $config['prev_page'] = '&raquo;';

       //inisialisasi config
        $this->pagination->initialize($config);

       //buat pagination
        $data['halaman'] = $this->pagination->create_links();

       //tamplikan data
        $data['record'] = $this->model_outbox->tampil_paging($config['per_page'], $id);

       //$this->load->view('grabing/view_outbox', $data);
       $this->template->load('template', 'outbox/view_outbox', $data);
 }

    function hapus(){
        $id = $this->uri->segment(3);
        $this->model_outbox->hapus($id);
        redirect('outbox');
    }
}
