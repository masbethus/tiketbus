<div class="row">
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('agen');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
    <li class="active">Agen</li>
</ol>
</div><!--/.row-->

<div class="row">
<div class="col-lg-6">
        <h1 class="page-header">Input Agen</h1>
        <?php echo form_open('agen/post', array('role'=>'form'));?>
    <table style="width:100%" class="table">
        <tr><th>Nama Agen</th>
        <td><input type="text" name="nama_agen" class="form-control" placeholder="Nama Agen" required=""></td>
    </tr>
    <tr><th>Kota</th>
        <td><input type="text" name="kota" class="form-control" placeholder="Kota" required=""></td>
    </tr>
    <tr><th>Nomor Handphone</th>
        <td><input type="text" name="hp" class="form-control" placeholder="Telp" required=""></td>
    </tr>
    <tr><th>PIN</th>
        <td><input type="text" name="pin" class="form-control" placeholder="PIN" required=""></td>
    </tr>
    <tr>
        <th colspan="2"><button class="btn btn-primary" type="submit" name="submit">Submit</button>
        <button class="btn btn-default" type="reset" name="reset">Reset</button></th>
    </tr>
</table>
    <?php echo form_close();?>
</div>
</div><!--/.row-->