<?php
 foreach ($record->result() as $p){
     echo $p->nama_pelanggan;
     echo $p->nama;
     echo $p->tgl_transaksi."<br>";
 }
?>