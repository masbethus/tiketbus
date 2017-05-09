<div class="row">
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('operator');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Operator</li>
</ol>
</div><!--/.row-->

<div class="row">
<div class="col-lg-9">
        <h1 class="page-header">Operator</h1>
        <?php echo form_open('operator/edit', array('role'=>'form'));?>
        <table style="width: 100%" class="table" data-toggle="table">
            <input type="hidden" name="id" value="<?php echo $record['operator_id'];?>">
            <tr><td>Nama Lengkap</td>
                <td><input type="text" name="nama" value="<?php echo $record['nama_lengkap'];?>" class="form-control" placeholder="Nama Lengkap"></td>
            </tr>
            <tr><td>User Name</td>
                <td><input type="text" name="username" value="<?php echo $record['username'];?>" class="form-control" placeholder="User Name"></td>
            </tr>
            <tr><td>Password</td>
                <td><input type="password" name="password" class="form-control" placeholder="Password"></td>
            </tr>
            <tr>
                <th colspan="2"><button class="btn btn-primary" type="submit" name="submit">Submit</button>
                <button class="btn btn-default" type="reset" name="reset">Reset</button></th>
            </tr>
        </table>
        <?php echo form_close();?>
</div>
</div>