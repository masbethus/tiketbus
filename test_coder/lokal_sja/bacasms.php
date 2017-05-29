<?php
// koneksi ke mysql di server localhost
mysql_connect('localhost', 'root', '');
// nama database Gammu yang ada di localhost
mysql_select_db('tiket');

// baca data XML dari server hosting yang digenerate oleh data.php
$dataxml = simplexml_load_file('http://rosaliaindah.cf/grabing/outbox');
foreach($dataxml->data as $data){
    // baca field ID
    $id = $data->ID;
    // baca nomor tujuan
    $destination = $data->DestionationNumber;
    // baca isi sms
    $sms = $data->TextDecoded;
    //baca waktu kirim
    $time = $data->SendingDateTime;

    // mengirim SMS via Gammu dengan insert data ke tabel outbox Gammu
    $query = "INSERT INTO outbox (DestinationNumber, TextDecoded, InsertIntoDB) VALUES ('$destination', '$sms', '$time')";
    mysql_query($query);

    // hapus data SMS di server hosting yang sudah terbaca berdasarkan ID
    $curlHandle = curl_init();
    curl_setopt($curlHandle, CURLOPT_URL, 'http://rosaliaindah.cf/grabing/hapus');
    curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'id='.$id);
    curl_setopt($curlHandle, CURLOPT_HEADER, 0);
    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
    curl_setopt($curlHandle, CURLOPT_POST, 1);
    curl_exec($curlHandle);
    curl_close($curlHandle);
}
?>