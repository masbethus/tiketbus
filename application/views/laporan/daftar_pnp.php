<div class="row">
<ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Icons</li>
</ol>
</div><!--/.row-->

<div class="row">
<div class="col-lg-6">
        <h1 class="page-header">Laporan Transaksi</h1>
<?php echo form_open('laporan/dpp');?>
<table style="width: 100%" class="table table-bordered">
    <tr>
        <td><select name="kelas">
                <?php
                    foreach ($kelas as $k){
                        echo "<option class='form-control' value='$k->id_kelas'>$k->nama_kelas</option>";
                    }
                ?>
            </select></td>
    </tr>
    <tr>
        <td><select name="jurusan">
                <?php
                    foreach ($jurusan as $j){
                        echo "<option class='form-control' value='$j->id_jadwal'>$j->jurusan</option>";
                    }
                ?>
            </select></td>
    </tr>
    <tr>
        <td> <input type="text" name="tanggal" class="tanggal" placeholder="Tanggal Mulai" required=""></td>
    </tr>
    <tr>
        <td><button name="submit" type="submit">Cari</button></td>
    </tr>
    
</table>
<?php echo form_close();?>
</div>
</div><!--/.row-->