<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tiket Engine</title>

<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/bootstrap-table.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="<?php echo base_url();?>assets/js/lumino.glyphs.js"></script>


<!--[if lt IE 9]>
<script src="<?php echo base_url();?>assets/js/html5shiv.js"></script>
<script src="<?php echo base_url();?>assets/js/respond.min.js"></script>
<![endif]-->

<script type="text/javascript">
function ajaxrunningreply(){
        if (window.XMLHttpRequest){ xmlhttp=new XMLHttpRequest(); }else{ xmlhttp =new ActiveXObject("Microsoft.XMLHTTP"); }
        xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){ }
        }

xmlhttp.open("GET","<?php echo base_url('tiket_engine/sms');?>");
        xmlhttp.send();
        setTimeout("ajaxrunningreply()", 3000);
}
	</script>
</head>

<body onload="ajaxrunningreply();">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
                            <a class="navbar-brand" href="<?php echo base_url();?>"><span>Pemesanan Tiket Dengan </span> SMS GATEWAY</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
                                                        <li><a href="<?php echo base_url('auth/logout','Logout');?>"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <form action="<?php echo base_url('transaksi/cari');?>" role="search" method="post">
			<div class="form-group">
				<input type="text" name="dicari" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
                    <li class="<?php echo activate_menu('dashboard'); ?>"><a href="<?php echo base_url();?>dashboard"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
                    <li class="<?php echo activate_menu('inbox'); ?>"><a href="<?php echo base_url('inbox');?>"><svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg> Kotak Masuk</a></li>
                    <li class="<?php echo activate_menu('outbox'); ?>"><a href="<?php echo base_url('outbox');?>"><svg class="glyph stroked open letter"><use xlink:href="#stroked-open-letter"/></svg> Kotak Keluar</a></li>
                    <li class="parent ">
                                 <a href="#sub-item-1" data-toggle="collapse">
                                         <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked table"><use xlink:href="#stroked-table"/></svg></span> Tiket 
                                 </a>
                                 <ul class="children collapse" id="sub-item-1">
                                         <li>
                                                 <a class="" href="<?php echo base_url('tiket');?>">
                                                         <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Daftar Tiket
                                                 </a>
                                         </li>
                                         <li>
                                                 <a class="" href="<?php echo base_url('jadwal');?>">
                                                         <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Jadwal
                                                 </a>
                                         </li>
                                         <li>
                                                 <a class="" href="<?php echo base_url('kelas');?>">
                                                         <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Kelas
                                                 </a>
                                         </li>
                                         
                                 </ul>
                    </li>
                    <li class="<?php echo activate_menu('balance');?>"><a href="<?php echo base_url('balance');?>"><svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg> Balance</a></li>
                    <li class="<?php echo activate_menu('agen');?>"><a href="<?php echo base_url('agen');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg> Agen</a></li>
                    <li class="<?php echo activate_menu('transaksi');?>"><a href="<?php echo base_url('transaksi');?>"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Transaksi</a></li>
                    <li class="parent">
                                 <a href="#sub-item-2" data-toggle="collapse">
                                         <span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg></span> Laporan
                                 </a>
                                 <ul class="children collapse" id="sub-item-2">
                                         <li>
                                                 <a class="" href="<?php echo base_url('laporan/dpp');?>">
                                                         <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Daftar Penumpang
                                                 </a>
                                         </li>
                                         <li>
                                                 <a class="" href="<?php echo base_url('laporan/agen');?>">
                                                         <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Laporan Agen
                                                 </a>
                                         </li>
                                         <li>
                                                 <a class="" href="<?php echo base_url('laporan/chart');?>">
                                                         <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Grafik
                                                 </a>
                                         </li>
                                         
                                 </ul>
                    </li>
			<li role="presentation" class="divider"></li>
                        <li><a href="<?php echo base_url('operator');?>"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Operator</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
               <?php echo $contents;?>

	</div><!--/End of Kontlo .main-->
        
        <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/highcharts.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-table.js"></script>
	<script>
            <?php 
            $url = $this->uri->segment(2);
            if($url == 'chart'){
                $this->load->view('laporan/chart1');
            }
            ?>
$(document).ready(function () {
                $('.tanggal').datepicker({
                    format: "yyyy-mm-dd",
                    autoclose:true
                });
            });
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
</script>	
</body>

</html>
