<div class="row">
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('operator');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Operator</li>
</ol>
</div><!--/.row-->

<div class="row">
<div class="col-lg-10">
        <h1 class="page-header">Operator</h1>
        <?php echo anchor('operator/post','Tambah Data', array('class'=>'btn btn-primary'));?>
<hr>
<table class="table tableborder">
    <tr>
        <th width="10">No</th><th>Nama Lengkap</th><th>User Name</th><th>Last Login</th><th colspan="2">Operasi</th>
    </tr>
    <?php
    $no=1;
    foreach ($record as $r){
        echo "  <tr>
                    <td>$no</td>
                    <td>$r->nama_lengkap</td>
                    <td>$r->username</td>
                    <td>$r->last_login</td>
                    <td width='10'>".anchor('operator/edit/'.$r->operator_id,'Edit', array('class'=>'btn btn-info'))."</td>
                    <td width='10'>".anchor('operator/hapus/'.$r->operator_id,'Hapus', array('class'=>'btn btn-danger'))."</td>
                </tr>";
        $no++;
    }
     ?>
</table>
</div>
</div><!--/.row-->