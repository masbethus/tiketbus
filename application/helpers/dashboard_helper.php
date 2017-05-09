<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function hitung_transaksi(){
    $ci = get_instance();
    $hariiini = date("Y-m-d");
    return $ci->db->get_where('transaksi', array('status'=>'AKTIF', 'tgl_transaksi'=>$hariiini))->num_rows();
}
function hitung_batal(){
    $ci = get_instance();
    return $ci->db->get_where('transaksi', array('status'=>'BATAL'))->num_rows();
}
function hitung_agen(){
    $ci = get_instance();
    return $ci->db->get('agen')->num_rows();
}
function transaksi_total(){
    $ci = get_instance();
    return $ci->db->get_where('transaksi', array('status'=>'AKTIF'))->num_rows();
}