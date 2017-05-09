<div class="row">
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('kelas');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
    <li class="active">Kelas</li>
</ol>
</div><!--/.row-->

<div class="row">
<div class="col-lg-6">
        <h1 class="page-header">Input Kelas</h1>
        <?php echo form_open('kelas/post', array('role'=>'form'));?>
    <table style="width:100%" class="table">
        <tr><td>Nama Kelas</td>
        <td><input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas" required=""></td>
    </tr>
    <tr><td>Jumlah Kursi</td>
        <td><input type="number" name="jml_kursi" class="form-control" placeholder="Jumlah Kursi" required=""></td>
    </tr>
    <tr>
        <th colspan="2"><button class="btn btn-primary" type="submit" name="submit">Submit</button>
        <button class="btn btn-default" type="reset" name="reset">Reset</button></th>
    </tr>
</table>
    <?php echo form_close();?>
</div>
</div><!--/.row-->