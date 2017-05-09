<div class="row">
<ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Icons</li>
</ol>
</div><!--/.row-->

<div class="row">
<div class="col-lg-6">
        <h1 class="page-header">Laporan Transaksi</h1>
    <table style="width: 100%" class="table table-bordered">
    <?php echo form_open('laporan/agen');?>
    <tr>
        <td>
            <div class="col-sm-6">
                <input type="text" name="nilai1" class="tanggal form-control" placeholder="Tanggal Mulai" required="">
            </div>
            <div class="col-sm-6">
                <input type="text" name="nilai2" class="tanggal form-control" placeholder="Tanggal Akhir" required="">
            </div>
        </td>
    </tr>
    <tr><td><button class="btn btn-primary btn-sm" type="submit" name="submit">Proses</button></td></tr>
    <?php echo form_close();?>
    </table>
        <hr>
</div>
</div><!--/.row-->
<div class="row">
<div class="col-lg-12">
    <p>
    <?php echo anchor('laporan/laporan_excel', 'Export Excel', array('class'=>'btn btn-primary btn-sm'))?>
    <?php echo anchor('laporan/pdf', 'Export PDF', array('class'=>'btn btn-danger btn-sm'))?>
    </p>
    <div class="panel panel-body">
            <table style="width: 100%" class="table table-bordered">
            <thead>
            <tr>
                <th style="text-align: center;" colspan="5">LAPORAN TRANSAKSI TIKET AGEN</th>
            </tr>
            <tr>
                <th style="text-align: center;">
                    <div class="th-inner ">NO</div>
                    <div class="fht-cell"></div>
                    </th>
                <th style="text-align: center;">
                    <div class="th-inner ">Kode Tiket</div>
                    <div class="fht-cell"></div>
                    </th>
                <th style="text-align: center;">
                    <div class="th-inner ">Nomor Tiket</div>
                    <div class="fht-cell"></div>
                    </th>
                <th style="text-align: center;">
                    <div class="th-inner ">Nama Agen</div>
                    <div class="fht-cell"></div>
                    </th>
                <th style="text-align: center;">
                    <div class="th-inner ">Tujuan</div>
                    <div class="fht-cell"></div>
                    </th>
                <th style="text-align: center;">
                    <div class="th-inner ">Tanggal Transaksi</div>
                    <div class="fht-cell"></div>
                    </th>
                <th style="text-align: center;">
                    <div class="th-inner ">Harga</div>
                    <div class="fht-cell"></div>
                    </th>
            </tr>
            </thead>
            <?php
            if(empty($record)){
                echo "<tr><td colspan=\"6\">Data tidak tersedia</td></tr>";
            }else{
                    $no=1;
                    $total='';
                    foreach ($record as $r){
                        $uang = format_rupiah($r->harga);
                        $tanggal = tgl_indo($r->tgl_transaksi);
                        echo "<tr><td>$no</td>
                              <td>$r->kode_tiket</td>
                              <td>$r->no_tiket</td>
                              <td>$r->nama</td>
                              <td>$r->jurusan</td>
                              <td>$tanggal</td>
                              <td>$uang</td></tr>";
                        $no++;
                        $total = $total + $r->harga;
                    }
            }
            ?>
            <tr><td colspan="5"><b>Total</b></td><td><?php if(empty($total))
                echo $total ='0';
            else {
                
            }echo format_rupiah($total);?></td></tr>
            <tr>&nbsp;</tr>
            <tr>
                <th style="text-align: center;" colspan="5">LAPORAN TIKET BATAL</th>
            </tr>
            <tr>
                <th style="text-align: center;">
                    <div class="th-inner ">NO</div>
                    <div class="fht-cell"></div>
                    </th>
                <th style="text-align: center;">
                    <div class="th-inner ">Kode Tiket</div>
                    <div class="fht-cell"></div>
                    </th>
                <th style="text-align: center;">
                    <div class="th-inner ">Nomor Tiket</div>
                    <div class="fht-cell"></div>
                    </th>
                <th style="text-align: center;">
                    <div class="th-inner ">Nama Agen</div>
                    <div class="fht-cell"></div>
                    </th>
                <th style="text-align: center;">
                    <div class="th-inner ">Tujuan</div>
                    <div class="fht-cell"></div>
                    </th>
                <th style="text-align: center;">
                    <div class="th-inner ">Tanggal Transaksi</div>
                    <div class="fht-cell"></div>
                    </th>
                <th style="text-align: center;">
                    <div class="th-inner ">Harga</div>
                    <div class="fht-cell"></div>
                    </th>
            </tr>
            <?php
            if(empty($batal)){
                echo "<tr><td colspan=\"6\">Data tidak tersedia</td></tr>";
            }else{
                    $no=1;
                    $total='';
                    foreach ($batal as $b){
                        $uang = format_rupiah($b->harga);
                        $tanggal = tgl_indo($b->tgl_transaksi);
                        echo "<tr><td>$no</td>
                              <td>$b->kode_tiket</td>
                              <td>$b->no_tiket</td>
                              <td>$b->nama</td>
                              <td>$b->jurusan</td>
                              <td>$tanggal</td>
                              <td>$uang</td></tr>";
                        $no++;
                        $totalb = $totalb + $b->harga;
                    }
            }
            ?>
            <tr><td colspan="5"><b>Total</b></td><td><?php if(empty($totalb))
                echo $totalb ='0';
            else {
                
            }echo format_rupiah($totalb);?></td></tr>
        </table>
</div>
</div>
</div><!--./row-->