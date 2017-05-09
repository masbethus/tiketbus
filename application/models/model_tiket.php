<?php
class Model_tiket extends CI_Model{
    function get_tiket(){
        return $this->db->query("SELECT tiket.id_tiket, tiket.kode_tiket, tiket.id_kelas, tiket.id_jadwal, tiket.harga,
                                tiket.jenis_tiket, kelas.nama_kelas, jadwal.jurusan
                                FROM tiket ,kelas ,jadwal
                                WHERE
                                kelas.id_kelas = tiket.id_kelas AND
                                jadwal.id_jadwal = tiket.id_jadwal ORDER BY tiket.id_tiket ASC");
    }
    function post($data){
        return $this->db->insert('tiket', $data);
    }
     function get_one($id){
        $param = array('id_tiket'=>$id);
        return $this->db->get_where('tiket',$param);
    }
    function edit($data,$id){
        $this->db->where('id_tiket',$id);
        $this->db->update('tiket',$data);
    }
    function hapus($id){
        $this->db->where('id_tiket',$id);
        $this->db->delete('tiket');
    }
    function tampil_paging($num, $offset){
        $this->db->join('kelas', 'kelas.id_kelas = tiket.id_kelas');
        $this->db->join('jadwal', 'jadwal.id_jadwal = tiket.id_jadwal');
        $this->db->order_by('id_tiket', 'ASC');
        $data = $this->db->get('tiket', $num, $offset);
        return $data->result();
    }
}
