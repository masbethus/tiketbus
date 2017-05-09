<div class="row">
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('operator');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Operator</li>
</ol>
</div><!--/.row-->

<div class="row">
<div class="col-lg-9">
        <h1 class="page-header">Operator</h1>
        <table style="width: 100%" class="table" data-toggle="table">
            <?php echo form_open('operator/post', array('role'=>'form'));?>
            <tr><td>Nama Lengkap</td>
            <td><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap"></td>
            </tr>
            <tr><td>User Name</td>
                <td><input type="text" name="username" class="form-control" placeholder="User Name"></td>
            </tr>
            <tr><td>Password</td>
                <td><input type="password" name="password" class="form-control" placeholder="Password"></td>
            </tr>
            <tr>
                <th colspan="2"><button class="btn btn-primary" type="submit" name="submit">Submit</button>
                <button class="btn btn-default" type="reset" name="reset">Reset</button></th>
            </tr>
            <?php echo form_close();?>
        </table>
</div>
</div>