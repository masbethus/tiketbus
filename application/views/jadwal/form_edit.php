<div class="row">
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('jadwal');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
    <li class="active">Jadwal</li>
</ol>
</div><!--/.row-->

<div class="row">
<div class="col-lg-4">
        <h1 class="page-header">Edit Jadwal</h1>
        <?php echo form_open('jadwal/edit', array('role'=>'form'));?>
        <input type="hidden" name="id" value="<?php echo $record['id_jadwal'];?>">
    <table style="width:100%" class="table">
        <tr><td>Jam Berangkat</td>
        <td><input type="text" name="jam_berangkat" value="<?php echo $record['jam_berangkat'];?>" class="form-control" placeholder="00:00"></td>
    </tr>
    <tr><td>Jurusan</td>
        <td><input type="text" name="jurusan" value="<?php echo $record['jurusan'];?>" class="form-control" placeholder="Jurusan"></td>
    </tr>
    <tr>
        <th colspan="2"><button class="btn btn-primary" type="submit" name="submit">Submit</button>
        <button class="btn btn-default" type="reset" name="reset">Reset</button></th>
    </tr>
</table>
    <?php echo form_close();?>
</div>
</div><!--/.row-->