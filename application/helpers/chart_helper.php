<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
function chart($url){
    $url = $ths->uri->segment(2);
    if($url == 'chart'){
        $this->load->view('laporan/chart1');
    }
}
