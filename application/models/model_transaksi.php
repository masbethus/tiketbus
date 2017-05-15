<?php
class Model_transaksi extends CI_Controller{
    function tampilkan_data(){
        $this->db->join('kelas', 'kelas.id_kelas = transaksi.id_kelas');
        $this->db->join('agen', 'agen.agen_id = transaksi.id_agen');
        $data = $this->db->get('transaksi');
        return $data->result();
    }
    function hapus($id){
        $this->db->where('transaksi_id',$id);
        $this->db->delete('transaksi');
    }
    function get_one($id){
        $param = array('transaksi_id'=>$id);
        return $this->db->get_where('transaksi',$param);
    }
    function edit($data,$id){
        $this->db->where('transaksi_id',$id);
        $this->db->update('transaksi',$data);
    }
    function tampil_paging($num, $offset){
        $this->db->join('kelas', 'kelas.id_kelas = transaksi.id_kelas');
        $this->db->join('agen', 'agen.agen_id = transaksi.id_agen');
        $this->db->order_by('transaksi_id', 'ASC');
        $data = $this->db->get('transaksi',array('tgl_transaksi'=>'DATE(NOW())'),$num, $offset);
        return $data->result();
    }
    function insert_outbox($data){
        $this->db->insert('transaksi',$data);
    }
    function cari_data($pencari){
        $this->db->join('kelas', 'kelas.id_kelas = transaksi.id_kelas');
        $this->db->join('agen', 'agen.agen_id = transaksi.id_agen');
        $this->db->like('no_tiket',$pencari);
        $this->db->or_like('nama_pelanggan', $pencari);
        $this->db->or_like('nohp_pelanggan', $pencari);

        $query = $this->db->get('transaksi');
        return $query->result();
    }
    function tampil_laporan($nilai1, $nilai2){
        $query = "SELECT
                transaksi.kode_tiket,
                transaksi.no_tiket,
                transaksi.id_agen,
                transaksi.tgl_transaksi,
                transaksi.harga,
                agen.nama,
                jadwal.jurusan
                FROM
                transaksi ,
                agen ,
                jadwal
                WHERE transaksi.tgl_transaksi 
                BETWEEN DATE('$nilai1') AND DATE('$nilai2') AND transaksi.id_agen = agen.agen_id AND transaksi.id_jadwal = jadwal.id_jadwal";
        $data = $this->db->query($query);
        return $data->result();
    }
    function laporan_default(){
        $this->db->join('kelas', 'kelas.id_kelas = transaksi.id_kelas');
        $this->db->join('agen', 'agen.agen_id = transaksi.id_agen');
        $this->db->join('jadwal', 'jadwal.id_jadwal = transaksi.id_jadwal');
        $data = $this->db->get_where('transaksi', array('status'=>'AKTIF'));
        return $data->result();
    }
    function laporan_chart(){
        $this->db->select('nama');
        $this->db->select('COUNT(transaksi_id) AS jumlah_transaksi');
        $this->db->join('agen', 'agen.agen_id = transaksi.id_agen');
        $this->db->group_by('nama');
        $data = $this->db->get_where('transaksi', array('status'=>'AKTIF'));
        return $data->result();
    }
    function laporan_batal(){
        $this->db->join('kelas', 'kelas.id_kelas = transaksi.id_kelas');
        $this->db->join('agen', 'agen.agen_id = transaksi.id_agen');
        $data = $this->db->get_where('transaksi', array('status'=>'BATAL'));
        return $data->result();
    }
    function laporan($jurusan,$tanggal,$kelas){
        $query = "SELECT
                    transaksi.kode_tiket,
                    transaksi.no_tiket,
                    transaksi.nama_pelanggan,
                    transaksi.nohp_pelanggan,
                    transaksi.tgl_transaksi,
                    transaksi.`status`,
                    transaksi.harga,
                    agen.nama,
                    transaksi.id_jadwal,
                    transaksi.id_agen
                    FROM
                    transaksi ,
                    agen
                    WHERE
                    transaksi.id_kelas = $kelas AND
                    transaksi.id_agen = agen.agen_id AND
                    transaksi.id_jadwal = $jurusan AND
                    transaksi.tgl_transaksi = '$tanggal'";
        return $this->db->query($query);
    }
}