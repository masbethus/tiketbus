<?php
class Model_jadwal extends CI_Model{
    function tampilkan_data(){
        return $this->db->get('jadwal');
    }
    function post($data){
        return $this->db->insert('jadwal', $data);
    }
     function get_one($id){
        $param = array('id_jadwal'=>$id);
        return $this->db->get_where('jadwal',$param);
    }
    function edit($data,$id){
        $this->db->where('id_jadwal',$id);
        $this->db->update('jadwal',$data);
    }
    function hapus($id){
        $this->db->where('id_jadwal',$id);
        $this->db->delete('jadwal');
    }
    function tampil_paging($num, $offset){
        $this->db->select(array("`id_jadwal`,DATE_FORMAT(`jam_berangkat`, '%H:%i') AS waktu, jurusan"));
        $this->db->order_by('id_jadwal', 'ASC');
        $data = $this->db->get('jadwal', $num, $offset);
        return $data->result();
    }
}
