    <?php
    //konfigurasi


    // koneksi ke mysql
    if(mysql_connect($dbhost,$dbuser,$dbpass)){
    mysql_select_db($dbname);
    }else{
    echo 'DB ne ra konek!!';
    }

    // membaca ketiga data dari parameter CURL

    echo $sms = $_POST['sms'];
    echo $time = $_POST['time'];
    echo $nohp = $_POST['nohp'];

    // query insert data ke mysql
    $query="INSERT INTO inbox (id,nohp,sms,time) VALUES ('$nohp','$sms','$time')";
    //$query = "INSERT INTO contoh (data1, data2, data3) VALUES ('$data1', '$data2', '$data3')";
    mysql_query($query);

    ?>