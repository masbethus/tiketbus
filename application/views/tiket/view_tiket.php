<div class="row">
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('tiket');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
    <li class="active">Tiket</li>
</ol>
</div><!--/.row-->

<div class="row">
<div class="col-lg-11">
    <div class="panel-body">
        <h1 class="page-header">Data Tiket</h1>
        <?php echo anchor('tiket/post', 'Tambah Tiket', array('class'=>'btn btn-primary btn-sm'))?>
        <hr>
        <table style="width:100%" class="table table-hover" data-toggle="table">
            <thead>
            <tr>
                <th style="text-align: center;">
                    <div class="th-inner ">NO</div>
                    <div class="fht-cell"></div></th>
                <th style="">
                    <div class="th-inner ">Kode Kelas</div>
                    <div class="fht-cell"></div>
                    </th>
                    <th style="">
                    <div class="th-inner ">Kelas</div>
                    <div class="fht-cell"></div>
                    </th>
                    <th style="">
                    <div class="th-inner ">Tujuan</div>
                    <div class="fht-cell"></div>
                    </th>
                    <th style="">
                    <div class="th-inner ">Harga</div>
                    <div class="fht-cell"></div>
                    </th>
                    <th style="">
                    <div class="th-inner ">Jenis Bus</div>
                    <div class="fht-cell"></div>
                    </th>
                    <th style="text-align: center;" colspan="2">
                    <div class="th-inner ">Action</div>
                    <div class="fht-cell"></div>
                    </th>
            </tr>
            </thead>
           <?php
                $no=1 + $this->uri->segment(3);
                foreach ($record as $r){
                    $harga = format_rupiah($r->harga);
                    $jtiket = ($r->jenis_tiket==1)?"Toilet" : "Non Toilet";
                    echo "<tr>
                                <td style='text-align:center;'>$no</td>
                                <td>$r->kode_tiket</td>
                                <td>$r->nama_kelas</td>
                                <td>$r->jurusan</td>
                                <td>$harga</td>
                                <td>$jtiket</td>
                     <td width='12'>".anchor('tiket/edit/'.$r->id_tiket,'Edit', array('class'=>'btn btn-info'))."</td>
                    <td width='12'>".anchor('tiket/hapus/'.$r->id_tiket,'Hapus', array('class'=>'btn btn-danger'))."</td>
              </tr>";
        $no++;
                }
           ?>
        </table>
<?php
echo $halaman;
?>
    </div>
</div>
</div><!--/.row-->