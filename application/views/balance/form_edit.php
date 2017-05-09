<div class="row">
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('balance');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
    <li class="active">Balance</li>
</ol>
</div><!--/.row-->

<div class="row">
<div class="col-lg-6">
        <h1 class="page-header">Input Ticket Balance</h1>
        <?php echo form_open('balance/post', array('role'=>'form'));?>
        <input type="hidden" name="id" value="<?php echo $record['id_stock'];?>">
    <table style="width:100%" class="table">
        <tr><td>Agen</td>
        <td><select class="form-control" name="id_agen">
                <?php
                    foreach ($agen as $a){
                        echo "<option class='form-control' value='$a->agen_id'";
                        echo $record['agen_id']==$a->agen_id?'selected':'';
                        echo ">$a->nama</option>";
                    }
                ?></select></td>
    </tr>
    <tr><td>Kode Awal</td>
        <td><input type="text" name="kode_awal" value="<?php echo $record['kode_awal'];?>" class="form-control" placeholder="Jumlah Kursi"></td>
    </tr>
    <tr><td>Kode Akhir</td>
        <td><input type="text" name="kode_akhir" value="<?php echo $record['kode_akhir'];?>" class="form-control" placeholder="Jumlah Kursi"></td>
    </tr>
    <tr>
        <th colspan="2"><button class="btn btn-primary" type="submit" name="submit">Submit</button>
        <button class="btn btn-default" type="reset" name="reset">Reset</button></th>
    </tr>
</table>
    <?php echo form_close();?>
</div>
</div><!--/.row-->