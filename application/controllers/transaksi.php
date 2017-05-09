<?php
class Transaksi extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model(array('model_kelas', 'model_agen', 'model_transaksi'));
        $this->load->helper(array('balance','tanggal'));
        check_session();
    }
    function index($id=NULL){
        $jml = $this->db->get('transaksi');

       //pengaturan pagination
        $config['base_url'] = base_url().'transaksi/index';
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '20';
        $config['first_page'] = 'Awal';
        $config['last_page'] = 'Akhir';
        $config['next_page'] = '&laquo;';
        $config['prev_page'] = '&raquo;';

       //inisialisasi config
        $this->pagination->initialize($config);

       //buat pagination
        $data['halaman'] = $this->pagination->create_links();

       //tamplikan data
        $data['record'] = $this->model_transaksi->tampil_paging($config['per_page'], $id);

       //$this->load->view('grabing/view_transaksi', $data);
       $this->template->load('template', 'transaksi/view_transaksi', $data);
 }
    function hapus(){
        $id = $this->uri->segment(3);
        $this->model_transaksi->hapus($id);
        redirect('transaksi');
    }
    function edit($id){
        if(isset($_POST['submit'])){
            //proses kategori
            $id     = $this->input->post('id');
            $status = $this->input->post('status');
            
            $data = array(
                          'status'    => $status,
            );
            $this->model_transaksi->edit($data,$id);
            redirect('transaksi');
        }  else {
            $data['record']     = $this->model_transaksi->get_one($id)->row_array();
            $this->template->load('template','transaksi/ubah_status', $data);
        }
    }
    function cari(){
        $pencari = $this->input->post('dicari');
        $data['record'] = $this->model_transaksi->cari_data($pencari);
        if($data['record']==null) {
          print 'maaf data yang anda cari tidak ada atau keywordnya salah';
          print br(2);
          print anchor('search','kembali');
          $this->template->load('template','transaksi/cari', $data);
        } else {
             $this->template->load('template','transaksi/cari',$data);
        }
    }

}