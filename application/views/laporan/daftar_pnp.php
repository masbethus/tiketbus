<?php echo form_open('laporan/dpp');?>
<table>
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