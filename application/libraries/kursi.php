<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class kursi{
    function autoNumber($tabel, $kolom, $idkelas){
        $ci=& get_instance();
        $hariini = date("Y-m-d");
        $query= "SELECT
                detail_kursi.no_kursi,
                detail_kursi.id_kelas,
                transaksi.tgl_transaksi,
                kelas.jumlah_kursi
                FROM
                detail_kursi ,
                transaksi ,
                kelas
                WHERE
                transaksi.tgl_transaksi = DATE('$hariini') AND
                detail_kursi.id_kelas = '$idkelas' AND
                transaksi.id_kelas = kelas.id_kelas
                order by detail_kursi.no_kursi DESC
                limit 1";
        
//        $kelas = mysql_query("SELECT COUNT(detail_kursi.id_kelas) AS jumlah_kelas FROM
//                detail_kursi WHERE detail_kursi.id_kelas='$idkelas'");
//        $jumlah_kelas = mysql_fetch_array($kelas);
        $kelas = "SELECT COUNT(detail_kursi.id_kelas) AS jumlah_kelas FROM
                    detail_kursi WHERE detail_kursi.id_kelas='$idkelas'";
        $jumlah_kelas = $ci->db->query($kelas)->result();
        
        $hasil=  $ci->db->query($query);
        $jumlahrecord = $hasil->num_rows();
        $row=$hasil->result();
        if($jumlahrecord == 0){
            $nomor=1;
        }elseif($jumlah_kelas >= 1){
            $nokursi = $row[0]->no_kursi;
            $nomor=$nokursi+1;
        }
        else
        {
            $nomor=1;
        }
        return $nomor;
        }
}