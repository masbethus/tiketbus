<div class="row">
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('balance');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
    <li class="active">Balance Ticket</li>
</ol>
</div><!--/.row-->

<div class="row">
<div class="col-lg-11">
    <div class="panel-body">
        <h1 class="page-header">Data Balance Ticket</h1>
        <?php echo anchor('balance/post', 'Tambah Jatah Ticket', array('class'=>'btn btn-primary btn-sm'))?>
        <hr>
        <table style="width:100%" class="table table-hover" data-toggle="table">
            <thead>
            <tr>
                <th style="text-align: center;">
                    <div class="th-inner ">NO</div>
                    <div class="fht-cell"></div></th>
                <th style="">
                    <div class="th-inner ">Nama Agen</div>
                    <div class="fht-cell"></div>
                    </th>
                    <th style="">
                    <div class="th-inner ">Kode Awal</div>
                    <div class="fht-cell"></div>
                    </th>
                    <th style="">
                    <div class="th-inner ">Kode Akhir</div>
                    <div class="fht-cell"></div>
                    </th>
                    <th style="">
                    <div class="th-inner ">Jumlah Tiket</div>
                    <div class="fht-cell"></div>
                    </th>
                    <th style="">
                    <div class="th-inner ">Sisa Tiket</div>
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
                    $tiket = range($r->kode_awal, $r->kode_akhir);
                    $saldo = count($tiket);
                    $sisa = sisa_tiket($r->agen_id);
                    echo "<tr>
                                <td style='text-align:center;'>$no</td>
                                <td>$r->nama</td>
                                <td>$r->kode_awal</td>
                                <td>$r->kode_akhir</td>
                                <td>$saldo</td>
                                <td>$sisa</td>
                     <td width='12'>".anchor('balance/edit/'.$r->id_stock,'Edit', array('class'=>'btn btn-info'))."</td>
                    <td width='12'>".anchor('balance/hapus/'.$r->id_stock,'Hapus', array('class'=>'btn btn-danger'))."</td>
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