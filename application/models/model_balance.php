<?php
class Model_balance extends CI_Model{
    function tamplikan_data(){
        return $this->db->query("SELECT balance.id_agen, balance.kode_awal, 
                                balance.kode_akhir, balance.id_stock
                                FROM
                                balance ,agen
                                WHERE
                                balance.id_agen = agen.id_agen
                                ORDER BY
                                balance.id_stock ASC");
    }
    function post($data){
        return $this->db->insert('balance', $data);
    }
     function get_one($id){
        $param = array('id_stock'=>$id);
        return $this->db->get_where('balance',$param);
    }
    function edit($data,$id){
        $this->db->where('id_stock',$id);
        $this->db->update('balance',$data);
    }
    function hapus($id){
        $this->db->where('id_stock',$id);
        $this->db->delete('balance');
    }
    function tampil_paging($num, $offset){
        $this->db->join('agen', 'agen.agen_id = balance.agen_id');
        $this->db->order_by('id_stock', 'ASC');
        $data = $this->db->get('balance', $num, $offset);
        return $data->result();
    }
}
