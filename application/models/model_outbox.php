<?php
class Model_outbox extends CI_Controller{
    function tampilkan_data(){
        $data = $this->db->get('outbox');
        return $data->result();
    }
    function hapus($id){
        $this->db->where('ID',$id);
        $this->db->delete('outbox');
    }
    function tampil_paging($num, $offset){
        $this->db->order_by('ID', 'ASC');
        $data = $this->db->get('outbox',$num, $offset);
        return $data->result();
    }
    function insert_outbox($data){
        $this->db->insert('outbox',$data);
    }
}