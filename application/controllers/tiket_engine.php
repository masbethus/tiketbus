<?php
class Tiket_engine extends CI_Controller{
    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('m_engine');
        $this->load->library(array('kirimsms','kursi'));
        $this->load->helper(array('notiket','nohp'));
    }
    
    function sms(){
        $hariini = date("Y-m-d");
        $sms = $this->m_engine->select_sms()->result();
        foreach ($sms as $x){
            $agenId = $x->agen_id;
            $nohp   = $x->SenderNumber;
            $sms    = strtoupper($x->TextDecoded);
            $smsID  = $x->ID;
            $namaAgen = $x->nama;
            $nomorAgen = $x->no_hp;
            $split  = explode("#", $sms);
            
            
             //membaca keyword perintah
            $commad = $split[0];        
                //daftar tiket
                $this->load->model('model_tiket');
                $tiket = $this->model_tiket->get_tiket()->result();
                foreach ($tiket as $t){
                    $id_tiket   = $t->id_tiket;
                    $kdtiket    = $t->kode_tiket;
                    $idkelas    = $t->id_kelas;
                    $idjadwal   = $t->id_jadwal;
                    $jurusan    = $t->jurusan;
                    $harga      = $t->harga;
                   
                //JIka keywordnya sesuai kode tiket
                if($commad == $kdtiket){

                    //Jika perintahnya ada tiga
                    if(count($split) == 3){
                        
                        //baca id group
                        $nama = $split[1];
                        //masukan data ke orders
                        $now = time();
                        $notiket = notiket_tiket($agenId);
                        $nomorhp = $split[2];
                    
                        $data = array(
                                'kode_tiket'    => $kdtiket,
                                'id_kelas'      => $idkelas,
                                'no_tiket'      => $notiket,
                                'nama_pelanggan'=> $nama,
                                'nohp_pelanggan'=> nohp_parser($nomorhp),
                                'id_jadwal'     => $idjadwal,
                                'id_agen'       => $agenId,
                                'tgl_transaksi' => date("Y/m/d"),
                                'jam_transaksi' => unix_to_human($now, TRUE),
                                'status'        => 'aktif',
                                'harga'         => $harga
                                );
                                $this->m_engine->insert_transaksi($data,'transaksi');
                    
                    $kelas = $this->m_engine->select_kelas($idkelas, $kdtiket)->result();
                    foreach ($kelas as $kl){
                        $trx_id     = $kl->transaksi_id;
                        $nama_kelas = $kl->nama_kelas;
                        $jml_kursi  = $kl->jumlah_kursi;
                        
                        $data = array(
                                'id_kelas'      => $idkelas,
                                'transaksi_id'  => $trx_id,
                                'kode_tiket'    => $kdtiket,
                            //***** Daftar Kursi otomatis
                                'no_kursi'      => $this->kursi->autoNumber('detail_kursi','no_kursi', $idkelas)
                        );
                        $this->m_engine->insert_kursi($data, 'detail_kursi');
                    }
                                //pesan balasan jika sukses
                                $reply = "Pemesanan Tiket, Nomor: ".$notiket.", atas nama ".$nama.",  dengan Jurusan ".$jurusan." Berhasil";
                                $this->kirimsms->sendsms($nohp, $reply, '');
                        //baca sms
                        ;
                        nohp_parser($nomorhp);
                        //pesan balasan jika sukses
                        $reply = "Terima Kasih ".$nama.", Nomor Tiket Anda:[$notiket], Agen keberangkatan:". $namaAgen.", Jurusan ".$jurusan.", untuk info pemesanan hubungi: ".$nomorAgen;
                        $this->kirimsms->sendsms($nomorhp, $reply, '');
                        }
                    
                       // pesan balasan jika jml parameter tidak 3
                       else {
                          $reply = "Maaf Format Pemesanan Salah"; 
                       }

                    } else if ($commad == "BATAL"){
                        //jika keywordnya unreg
                         if(count($split) == 2){
                             //jika parameternya 2
                             //baca nomor tiketnya
                             $notiket = $split[1];
                             //ubah status 'AKTIF menjadi 'BATAL'
                            $data = array('status'=>'BATAL');
                            $this->m_engine->batal($notiket, $data);

                             // konfirmasi unreg
                             $reply = "Proses Pembatalan Tiket No: [$notiket], sukses";
                             
                         }  
                         else {
                             $reply="Maaf format Pembatalan SALAH";
                         }
                         // kirim balasan
                        //sendsms($noHP, $reply, '');
                         $this->kirimsms->sendsms($nohp, $reply, '');
                }
                 $this->m_engine->procesed($smsID);
                    
            }
        }
    }
}