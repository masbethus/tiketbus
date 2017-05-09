<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
function notiket_tiket($agenId){
        $ci=& get_instance();
        //saldo
        $kode = $ci->db->query("SELECT
                        balance.kode_awal,
                        balance.kode_akhir
                        FROM
                        balance
                        WHERE
                        balance.agen_id = '$agenId'")->result();
        $kd_awal = $kode[0]->kode_awal;
        $kd_akhir = $kode[0]->kode_akhir;
        $query= "SELECT
                transaksi.no_tiket,
                transaksi.id_agen
                FROM
                transaksi
                WHERE
                transaksi.id_agen = '$agenId'
                ORDER BY transaksi_id DESC
                limit 1";
        
        
        $jumlah = "SELECT COUNT(transaksi_id) AS jumlah_transaksi FROM
                    transaksi WHERE id_agen='$agenId'";
        $jumlah_transaksi = $ci->db->query($jumlah)->result();
        $hasil=  $ci->db->query($query);
        $jumlahrecord = $hasil->num_rows();
        $row=$hasil->result();
        
        if($jumlahrecord == 0){
            $nomor=$kd_awal;
        }elseif($jumlah_transaksi >= 1 && $row[0]->no_tiket <= $kd_akhir){
            $notiket = $row[0]->no_tiket;
            $nomor=$notiket+1;
            $nomor=  sprintf('%03d',$nomor);
        }else{
            $nomor='penuh';
            exit();
        }
        return $nomor;
}