<div class="row">
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('tiket');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
    <li class="active">Tiket</li>
</ol>
</div><!--/.row-->

<div class="row">
<div class="col-lg-12">
        <h1 class="page-header">Edit Tiket</h1>
        <?php echo form_open('tiket/edit', array('role'=>'form'));?>
        <input type="hidden" name="id" value="<?php echo $record['id_tiket'];?>">
    <table style="width:60%" class="table">
        <tr><td>Kode Tiket</td>
        <td><input type="text" name="kd_tiket" value="<?php echo $record['kode_tiket'];?>" class="form-control" placeholder="Kode Tiket"></td>
    </tr>
    <tr><td>Kelas</td>
        <td><select name="id_kelas" class="form-control">
                <?php
                    foreach ($kelas as $k){
                        echo "<option class='form-control' value='$k->id_kelas'";
                        echo $record['id_kelas']==$k->id_kelas?'selected':'';
                        echo ">$k->nama_kelas</option>";
                    }
                ?>
            </select></td>
    </tr>
    <tr><td>Jurusan</td>
        <td><select class="form-control" name="jurusan">
                <?php
                    foreach ($jurusan as $j){
                        echo "<option class='form-control' value='$j->id_jadwal'";
                        echo $record['id_jadwal']==$j->id_jadwal?'selected':'';
                        echo ">$j->jurusan</option>";
                    }
                ?></select></td>
    </tr>
    <tr><td>Harga</td>
        <td><input type="text" name="harga" value="<?php echo $record['harga'];?>" class="form-control" placeholder="Harga"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'></td>
    </tr>
    <tr><td>Jenis Bus</td>
        <td>
        <div class="radio">
        <label>
            <input type="radio" name="jenis_tiket" id="jenis_tiket0" value="0" <?php echo ($record['jenis_tiket']==0)?"checked":""; ?>>Non Toilet
        </label>
        </div>
        <div class="radio">
        <label>
            <input type="radio" name="jenis_tiket" id="jenis_tiket1" value="1" <?php echo ($record['jenis_tiket']==1)?"checked":""; ?>>Toilet
        </label>
        </div>
        </td>
    </tr>
    <tr>
        <th colspan="2"><button class="btn btn-primary" type="submit" name="submit">Submit</button>
        <button class="btn btn-default" type="reset" name="reset">Reset</button></th>
    </tr>
</table>
    <?php echo form_close();?>
</div>
</div><!--/.row-->