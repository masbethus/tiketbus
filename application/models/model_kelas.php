<?php
class Model_kelas extends CI_Model{
    function tampilkan_data(){
        return $this->db->get('kelas');
    }
    function post($data){
        return $this->db->insert('kelas', $data);
    }
     function get_one($id){
        $param = array('id_kelas'=>$id);
        return $this->db->get_where('kelas',$param);
    }
    function edit($data,$id){
        $this->db->where('id_kelas',$id);
        $this->db->update('kelas',$data);
    }
    function hapus($id){
        $this->db->where('id_kelas',$id);
        $this->db->delete('kelas');
    }
    function tampil_paging($num, $offset){
        $this->db->order_by('id_kelas', 'ASC');
        $data = $this->db->get('kelas', $num, $offset);
        return $data->result();
    }
}
