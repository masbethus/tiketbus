<div class="row">
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('outbox');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
    <li class="active">Outbox</li>
</ol>
</div><!--/.row-->

<div class="row">
<div class="col-lg-11">
    <div class="panel-body">
        <h1 class="page-header">Data Outbox</h1>        
        <table style="width:100%" class="table table-hover" data-toggle="table">
            <thead>
            <tr>
                <th style="text-align: center;">
                    <div class="th-inner ">NO</div>
                    <div class="fht-cell"></div></th>
                <th style="">
                    <div class="th-inner ">Nomor Penerima</div>
                    <div class="fht-cell"></div>
                    </th>
                <th style="">
                    <div class="th-inner ">Pesan</div>
                    <div class="fht-cell"></div>
                    </th>
                <th style="">
                    <div class="th-inner ">Waktu Terkirim</div>
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
                                <td>$r->DestinationNumber</td>
                                <td>$r->TextDecoded</td>
                                <td>$r->SendingDateTime</td>
                    <td width='12'>".anchor('outbox/hapus/'.$r->ID,'Hapus', array('class'=>'btn btn-danger'))."</td>
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