<div class="row">
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('kelas');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
    <li class="active">Kelas</li>
</ol>
</div><!--/.row-->

<div class="row">
<div class="col-lg-11">
    <div class="panel-body">
        <h1 class="page-header">Data Kelas</h1>
        <?php echo anchor('kelas/post', 'Tambah Kelas', array('class'=>'btn btn-primary btn-sm'))?>
        <hr>
        <table style="width:100%" class="table table-hover" data-toggle="table">
            <thead>
            <tr>
                <th style="text-align: center;">
                    <div class="th-inner ">NO</div>
                    <div class="fht-cell"></div></th>
                <th style="">
                    <div class="th-inner ">Nama Kelas</div>
                    <div class="fht-cell"></div>
                    </th>
                    <th style="">
                    <div class="th-inner ">Jumlah Kursi</div>
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
                                <td>$r->nama_kelas</td>
                                <td>$r->jumlah_kursi</td>
                     <td width='12'>".anchor('kelas/edit/'.$r->id_kelas,'Edit', array('class'=>'btn btn-info'))."</td>
                    <td width='12'>".anchor('kelas/hapus/'.$r->id_kelas,'Hapus', array('class'=>'btn btn-danger'))."</td>
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