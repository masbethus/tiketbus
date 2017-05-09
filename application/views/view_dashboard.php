<div class="row">
<ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Icons</li>
</ol>
</div><!--/.row-->

<div class="row">
<div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
        <div class="panel panel-heading">
            <p>Selamat Datang User: <strong><?php echo $user;?></strong></p>
        </div>
</div>
</div><!--/.row-->

<div class="row">
        <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-blue panel-widget ">
                        <div class="row no-padding">
                                <div class="col-sm-3 col-lg-5 widget-left">
                                        <svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
                                </div>
                                <div class="col-sm-9 col-lg-7 widget-right">
                                        <div class="large"><?php echo hitung_transaksi();?></div>
                                        <div class="text-muted">Transaksi Hari ini</div>
                                </div>
                        </div>
                </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-orange panel-widget">
                        <div class="row no-padding">
                                <div class="col-sm-3 col-lg-5 widget-left">
                                        <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"/></svg>
                                </div>
                                <div class="col-sm-9 col-lg-7 widget-right">
                                        <div class="large"><?php echo hitung_batal();?></div>
                                        <div class="text-muted">Transaksi Batal</div>
                                </div>
                        </div>
                </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-teal panel-widget">
                        <div class="row no-padding">
                                <div class="col-sm-3 col-lg-5 widget-left">
                                        <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                                </div>
                                <div class="col-sm-9 col-lg-7 widget-right">
                                    <div class="large"><?php echo hitung_agen();?></div>
                                        <div class="text-muted">Agen Bis</div>
                                </div>
                        </div>
                </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-red panel-widget">
                        <div class="row no-padding">
                                <div class="col-sm-3 col-lg-5 widget-left">
                                        <svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
                                </div>
                                <div class="col-sm-9 col-lg-7 widget-right">
                                    <div class="large"><?php echo transaksi_total();?></div>
                                        <div class="text-muted">Total Transaksi</div>
                                </div>
                        </div>
                </div>
        </div>
</div><!--/.row-->