<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
function check_session(){
    $CI = & get_instance();
    $session = $CI->session->userdata('status_login');
    if($session != 'oke'){
        redirect('auth/login');
    }
}

function check_session_login(){
    $CI = & get_instance();
    $session = $CI->session->userdata('status_login');
    if($session == 'oke'){
        redirect('dashboard');
    }
}
?>
