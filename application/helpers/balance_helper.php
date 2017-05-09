<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
function sisa_tiket($agen){
    $CI = & get_instance();
    $used_tiket = $CI->db->get_where('transaksi', array('id_agen'=>$agen))->num_rows();
    $balance = $CI->db->get_where('balance', array('agen_id'=>$agen))->result();
    $tiket = range($balance[0]->kode_awal, $balance[0]->kode_akhir);
    $saldo_awal = count($tiket);
    $sisa = $saldo_awal - $used_tiket;
    return $sisa;
}
function format_rupiah($angka){
    $rupiah=number_format($angka,0,',','.');
    return $rupiah;
}