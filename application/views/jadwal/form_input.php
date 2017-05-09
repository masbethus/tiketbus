<div class="row">
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('jadwal');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
    <li class="active">Jadwal</li>
</ol>
</div><!--/.row-->

<div class="row">
<div class="col-lg-6">
        <h1 class="page-header">Input Jadwal</h1>
        <?php echo form_open('jadwal/post', array('role'=>'form'));?>
    <table style="width:100%" class="table">
        <tr><td>Jam Keberangkatan</td>
            <td><input type="text" name="jam_berangkat" class="form-control" placeholder="05:00" value="00:00" required=""></td>
    </tr>
    <tr><td>Jurusan</td>
        <td><input type="text" name="jurusan" class="form-control" placeholder="Jurusan" required=""></td>
    </tr>
    <tr>
        <th colspan="2"><button class="btn btn-primary" type="submit" name="submit">Submit</button>
        <button class="btn btn-default" type="reset" name="reset">Reset</button></th>
    </tr>
</table>
    <?php echo form_close();?>
</div>
</div><!--/.row-->