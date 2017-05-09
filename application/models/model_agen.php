<?php
class Model_agen extends CI_Model{
    function tampilkan_data(){
        return $this->db->get('agen');
    }
    function post($data){
        return $this->db->insert('agen', $data);
    }
     function get_one($id){
        $param = array('agen_id'=>$id);
        return $this->db->get_where('agen',$param);
    }
    function edit($data,$id){
        $this->db->where('agen_id',$id);
        $this->db->update('agen',$data);
    }
    function hapus($id){
        $this->db->where('agen_id',$id);
        $this->db->delete('agen');
    }
    function tampil_paging($num, $offset){
        $this->db->order_by('agen_id', 'ASC');
        $data = $this->db->get('agen', $num, $offset);
        return $data->result();
    }
}
