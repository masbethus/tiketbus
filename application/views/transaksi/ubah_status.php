<div class="row">
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('transaksi');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
    <li class="active">Transaksi</li>
</ol>
</div><!--/.row-->

<div class="row">
<div class="col-lg-8">
        <h1 class="page-header">Ubah Status</h1>
        <?php echo form_open('transaksi/edit', array('role'=>'form'));?>
        <input type="hidden" name="id" value="<?php echo $record['transaksi_id'];?>">
    <table style="width:100%" class="table">
        <tr><td>Kode Tiket</td>
        <td><input type="text" name="kd_tiket" value="<?php echo $record['kode_tiket'];?>" class="form-control" placeholder="Kode Tiket" disabled></td>
    </tr>
    <tr>
        <td>Nomor Tiket</td>
        <td><input type="text" name="no_tiket" value="<?php echo $record['no_tiket'];?>" class="form-control" placeholder="Nomor Tiket" disabled></td>
    </tr>
    <tr>
        <td>Nama Pelanggan</td>
        <td><input type="text" name="nama_plg" value="<?php echo $record['nama_pelanggan'];?>" class="form-control" placeholder="Nama" disabled></td>
    </tr>
    <tr>
        <td>Nomor Telp Pelanggan</td>
        <td><input type="text" name="no_hp" value="<?php echo $record['nohp_pelanggan'];?>" class="form-control" placeholder="No Telp Pelanggan" disabled></td>
    </tr>
    <tr><td>Status</td>
        <td><select name="status" class="form-control">
                <option class="form-control" value="AKTIF" selected="">AKTIF</option>
                <option class="form-control" value="BATAL">BATAL</option>
            </select></td>
    </tr>
    <tr>
        <th colspan="2"><button class="btn btn-primary" type="submit" name="submit">Submit</button>
        <button class="btn btn-default" type="reset" name="reset">Reset</button></th>
    </tr>
</table>
    <?php echo form_close();?>
</div>
</div><!--/.row-->