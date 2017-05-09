<table border="1">
    <tr>
        <th colspan="5">LAPORAN TRANSAKSI TIKET AGEN</th>
    </tr>
    <tr>
        <th>No</th><th>Kode Tiket</th><th>Nomor Tiket</th><th>Nama Pelanggan</th><th>Nomor hp Pelanggan</th><th>Nama Agen</th><th>Tujuan</th><th>Tanggal Transaksi</th><th>Harga</th>
    </tr>
    <?php
        if(empty($record)){
                echo "<tr><td colspan=\"5\">Data tidak tersedia</td></tr>";
            }else{
                    $no=1;
                    $total=0;
                    foreach ($record as $r){
                        $uang = format_rupiah($r->harga);
                        $tanggal = tgl_indo($r->tgl_transaksi);
                        echo "<tr><td>$no</td>
                              <td>$r->kode_tiket</td>
                              <td>$r->no_tiket</td>
                              <td>$r->nama_pelanggan</td>
                              <td>$r->nohp_pelanggan</td>
                              <td>$r->nama</td>
                              <td>$r->jurusan</td>
                              <td>$tanggal</td>
                              <td>$uang</td></tr>";
                        $no++;
                        $total = $total + $r->harga;
                    }
            }
            ?>
     <tr><td colspan="8"><b>Total</b></td><td><?php if(empty($total))
                echo $total ='0';
            else {
                
            }echo format_rupiah($total);?></td></tr>
</table>