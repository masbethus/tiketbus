<?php
class M_engine extends CI_Model{
    function balance(){
        
    }
    function select_sms(){
        return $this->db->query("SELECT inbox.SenderNumber, inbox.TextDecoded, inbox.ID, inbox.Processed, agen.agen_id, agen.no_hp, agen.nama
                                FROM inbox, agen WHERE inbox.SenderNumber = agen.no_hp AND inbox.Processed = 'false'");
    }
    function insert_transaksi($data,$table){
        $this->db->insert($table,$data);
    }
    function insert_orders($data, $table){
        $this->db->insert($table,$data);
    }
    function batal($no_tiket, $data){
        $this->db->where('no_tiket', $no_tiket);
        $this->db->update('transaksi', $data);
    }
    function procesed($smsID){
        $query = "UPDATE inbox SET Processed = 'true' WHERE ID = '$smsID'";
        $this->db->query($query);
    }
    function insert_outbox($nohp, $pesan, $modem){
        $query = "INSERT INTO outbox (DestinationNumber, TextDecoded, SenderID, CreatorID) 
                   VALUES ('$nohp', '$pesan', '$modem', 'Gammu')";
        $this->db->query($query);
    }
    function select_kelas($idkelas, $kdtiket){
        return $this->db->query("SELECT kelas.id_kelas, kelas.nama_kelas, kelas.jumlah_kursi, transaksi.transaksi_id, 
                                    tiket.id_kelas, transaksi.kode_tiket, tiket.kode_tiket, transaksi.tgl_transaksi
                                    FROM kelas, tiket, transaksi
                                    WHERE 
                                    kelas.id_kelas = $idkelas AND 
                                    tiket.kode_tiket = '$kdtiket' AND
                                    transaksi.tgl_transaksi = DATE(NOW()) 
                                    ORDER BY transaksi.transaksi_id DESC LIMIT 1");
    }
    function insert_kursi($data, $table){
        $this->db->insert($table, $data);
    }
    function get_jadwal($idjadwal){
        return $this->db->get_where('jadwal', array('id_jadwal'=>$idjadwal));
    }
}