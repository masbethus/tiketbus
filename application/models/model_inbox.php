<?php
class Model_inbox extends CI_Controller{
    function tampilkan_data(){
        $query = "SELECT inbox.ReceivingDateTime, inbox.SenderNumber, inbox.ID,
                    inbox.Processed, inbox.TextDecoded, agen.no_hp
                    FROM inbox ,agen
                    WHERE
                    inbox.SenderNumber = agen.no_hp";
        return $this->db->query($query);
    }
    function hapus($id){
        $this->db->where('ID',$id);
        $this->db->delete('inbox');
    }
    function tampil_paging($num, $offset){
        $this->db->join('agen', 'agen.no_hp = inbox.SenderNumber');
        $this->db->order_by('ID', 'DESC');
        $data = $this->db->get('inbox',$num, $offset);
        return $data->result();
    }
    function insert_inbox($data){
        $this->db->insert('inbox',$data);
    }
}