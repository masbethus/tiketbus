<?php
class Grabing extends CI_Controller{
    function __construct() {
        parent::__construct();
    }
    function outbox(){
        $this->load->model('model_outbox');
        $data['record'] = $this->model_outbox->tampilkan_data();
        $this->load->view('grabing/view_outbox', $data);
    }
    function insert(){
        $this->load->model('model_inbox');
        // membaca ketiga data dari parameter CURL
        echo $sms       = $this->input->post('sms');
        echo $nohp      = '+'.$this->input->post('nohp');
        echo $time      = $this->input->post('post');
        echo $text      = $this->input->post('text');
        echo $recipen   = $this->input->post('recipen');
        echo $smsc      = '+'.$this->input->post('smsc');
        $data = array(
                      "SenderNumber" 		=> str_replace(' ', '', $nohp),
                      "Text"         		=> $text,
                      "TextDecoded"  		=> $sms,
                      "ReceivingDateTime"	=> $time,
                      "RecipientID"  		=> $recipen,
                      "SMSCNumber"   		=> str_replace(' ', '', $smsc)
                 );
         // query insert data ke mysql
        $this->model_inbox->insert_inbox($data);
    }
    function hapus(){
        $this->load->model('model_outbox');
        // baca ID data yang akan dihapus yang dikirim via CURL dari localhost
        $id = $_POST['id'];
        $this->model_outbox->hapus($id);
    }
}