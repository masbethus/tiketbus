<div class="row">
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('kelas');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
    <li class="active">Kelas</li>
</ol>
</div><!--/.row-->

<div class="row">
<div class="col-lg-4">
        <h1 class="page-header">Edit Kelas</h1>
        <?php echo form_open('kelas/edit', array('role'=>'form'));?>
        <input type="hidden" name="id" value="<?php echo $record['id_kelas'];?>">
    <table style="width:100%" class="table">
        <tr><td>Nama Kelas</td>
        <td><input type="text" name="nama_kelas" value="<?php echo $record['nama_kelas'];?>" class="form-control" placeholder="Nama Kelas"></td>
    </tr>
    <tr><td>Jumlah Kursi</td>
        <td><input type="number" name="jml_kursi" value="<?php echo $record['jumlah_kursi'];?>" class="form-control" placeholder="Jumlah Kursi"></td>
    </tr>
    <tr>
        <th colspan="2"><button class="btn btn-primary" type="submit" name="submit">Submit</button>
        <button class="btn btn-default" type="reset" name="reset">Reset</button></th>
    </tr>
</table>
    <?php echo form_close();?>
</div>
</div><!--/.row-->