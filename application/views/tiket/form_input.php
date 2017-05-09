<div class="row">
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('tiket');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
    <li class="active">Tiket</li>
</ol>
</div><!--/.row-->

<div class="row">
<div class="col-lg-7">
        <h1 class="page-header">Input Tiket</h1>
        <?php echo form_open('tiket/post', array('role'=>'form'));?>
    <table style="width:100%" class="table">
        <tr><td>Kode Tiket</td>
        <td><input type="text" name="kd_tiket" class="form-control" placeholder="Kode Tiket" required=""></td>
    </tr>
    <tr><td>Kelas</td>
        <td><select name="id_kelas" class="form-control">
                <?php
                    foreach ($kelas as $k){
                        echo "<option class='form-control' value='$k->id_kelas'>$k->nama_kelas</option>";
                    }
                ?>
            </select></td>
    </tr>
    <tr><td>Jurusan</td>
        <td><select class="form-control" name="jurusan">
                <?php
                    foreach ($jurusan as $j){
                        echo "<option class='form-control' value='$j->id_jadwal'>$j->jurusan</option>";
                    }
                ?></select></td>
    </tr>
    <tr><td>Harga</td>
        <td><input type="text" name="harga" class="form-control" placeholder="Harga"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' required=""></td>
    </tr>
    <tr><td>Jenis Bus</td>
        <td>
        <div class="radio">
        <label>
            <input name="jenis_tiket" id="jenis_tiket" value="1" checked="" type="radio">Toilet
        </label>
        </div>
        <div class="radio">
        <label>
            <input name="jenis_tiket" id="jenis_tiket" value="0" checked="" type="radio">Non Toilet
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