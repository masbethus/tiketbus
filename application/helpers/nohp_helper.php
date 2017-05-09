<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
function nohp_parser($nomorhp){
    $ci=& get_instance();
    $re = '/^(08|[\d])/';
    $subst = '+628';
    $nohp = preg_replace($re, $subst, $nomorhp, 1);
    return $nohp;
}