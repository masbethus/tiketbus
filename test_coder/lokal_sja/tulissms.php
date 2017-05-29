<?php

//skrip untuk menghubungkan SMS Gateway lokal dengan hosting.. skrip ini dipasang untuk berhadapan dengan gammu.. Penggunaannya adalah:
//1. harus ada koneksi internet,
//2. database gammu

$url    =    "http://rosaliaindah.cf/grabing/insert";
$dbname =    'tiket';
$dbuser =    'root';
$dbpass =    '';
$dbhost =    'localhost';

if(mysql_connect($dbhost,$dbuser,$dbpass)){
    mysql_select_db($dbname);
}else{
    echo 'DB ne ra konek!!';
}

//bukak sms satu persatu

$q        = "SELECT `SenderNumber`,`Text`,`RecipientID`,`SMSCNumber`,`TextDecoded`,`UpdatedInDB`,`ID` FROM `inbox` WHERE `Processed`='false'";
$mq       = mysql_query($q);
$n        = mysql_query($q);

while($r=mysql_fetch_array($mq)){
    echo $text          = $r['Text'];
    echo $sms           = $r['TextDecoded'];
    echo $nohp          = $r['SenderNumber'];
    echo $time          = $r['UpdatedInDB'];
    echo $recipen       = $r['RecipientID'];
    echo $smsc          = $r['SMSCNumber'];
    echo $id            = $r['ID'];

    $curlHandle = curl_init();
    curl_setopt($curlHandle, CURLOPT_URL, $url);
    curl_setopt($curlHandle, CURLOPT_POSTFIELDS, "sms=".$sms."&nohp=".$nohp."&time=".$time."&text=".$text."&recipen=".$recipen."&smsc=".$smsc);
    curl_setopt($curlHandle, CURLOPT_HEADER, 0);
    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
    curl_setopt($curlHandle, CURLOPT_POST, 1);
    curl_exec($curlHandle);
    curl_close($curlHandle);

    $q2="UPDATE `inbox` SET `Processed`='true' WHERE `ID`='$id'";
    mysql_query($q2);

}

?>