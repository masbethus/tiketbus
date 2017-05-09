<div class="row">
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('transaksi');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
    <li class="active">Transaksi</li>
</ol>
</div><!--/.row-->

<div class="row">
<div class="col-lg-12">
    <div class="panel-body">
        <h1 class="page-header">Data Transaksi</h1>        
        <table style="width:100%" class="table table-hover" data-toggle="table">
            <thead>
            <tr>
                <th style="text-align: center;">
                    <div class="th-inner ">NO</div>
                    <div class="fht-cell"></div></th>
                <th style="">
                    <div class="th-inner ">Kode Tiket</div>
                    <div class="fht-cell"></div>
                    </th>
                <th style="">
                    <div class="th-inner ">Nomor Tiket</div>
                    <div class="fht-cell"></div>
                    </th>
                <th style="">
                    <div class="th-inner ">Nama Pelanggan</div>
                    <div class="fht-cell"></div>
                    </th>
                <th style="">
                    <div class="th-inner ">Nomor Telp Pelanggan</div>
                    <div class="fht-cell"></div>
                    </th>
                <th style="">
                    <div class="th-inner ">Agen</div>
                    <div class="fht-cell"></div>
                    </th>
               <th style="">
                    <div class="th-inner ">Waktu Transaksi</div>
                    <div class="fht-cell"></div>
                    </th>
               <th style="">
                    <div class="th-inner ">Status</div>
                    <div class="fht-cell"></div>
                    </th>
                <th style="text-align: center;" colspan="2">
                    <div class="th-inner ">Action</div>
                    <div class="fht-cell"></div>
                    </th>
            </tr>
            </thead>
           <?php
            if(empty($record)){
                echo "<tr><td colspan=\"6\">Data tidak tersedia</td></tr>";
            }else{
                $no=1 + $this->uri->segment(3);
                foreach ($record as $r){
                    echo "<tr>
                                <td style='text-align:center;'>$no</td>
                                <td>$r->kode_tiket</td>
                                <td>$r->no_tiket</td>
                                <td>$r->nama_pelanggan</td>
                                <td>$r->nohp_pelanggan</td>
                                <td>$r->nama</td>
                                <td>$r->jam_transaksi</td>
                                <td>$r->status</td>
                    <td width='12'>".anchor('transaksi/edit/'.$r->transaksi_id,'Edit', array('class'=>'btn btn-warning'))."</td>
              </tr>";
        $no++;
                }
            }
           ?>
        </table>
<?php echo $halaman;?>
        </div>
</div>
</div><!--/.row-->