<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kirimsms{    
function sendsms($nohp, $pesan, $modem){
$ci=& get_instance();
 
 $pesan = str_replace("'", "\'", $pesan);
 
 if (strlen($pesan)<=160){
  $query = "INSERT INTO outbox (DestinationNumber, TextDecoded, SenderID, CreatorID) 
            VALUES ('$nohp', '$pesan', '$modem', 'Gammu')";
$ci->db->query($query);
 
 } else {
  
  $jmlSMS = ceil(strlen($pesan)/153);
  $pecah  = str_split($pesan, 153);
   
  $query = "SHOW TABLE STATUS LIKE 'outbox'";
  //$hasil = $ci->db->query($query);
  $data = $ci->db->query($query)->result_array();
  //$data  = mysql_fetch_array($hasil);
  $newID = $data['Auto_increment'];
 
  $random = rand(1, 255);
  $headerUDH = sprintf("%02s", strtoupper(dechex($random)));
 
  for ($i=1; $i<=$jmlSMS; $i++){
  
   $udh = "050003".$headerUDH.sprintf("%02s", $jmlSMS).sprintf("%02s", $i);
   $msg = $pecah[$i-1];
   
   if ($i == 1){ 
    $query = "INSERT INTO outbox (DestinationNumber, UDH, TextDecoded, ID, MultiPart, SenderID, CreatorID)
        VALUES ('$nohp', '$udh', '$msg', '$newID', 'true', '$modem', 'Gammu')";      
   }       
   else
   $query = "INSERT INTO outbox_multipart(UDH, TextDecoded, ID, SequencePosition)
         VALUES ('$udh', '$msg', '$newID', '$i')";          
     $ci->db->query($query); 
  }
 }
   
   return 'SMS sedang dikirim...';
    }

}