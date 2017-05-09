var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Data Penjualan Tiket Bus Rosalia Indah'
         },
         xAxis: {
            categories: ['Agen']
         },
         yAxis: {
            title: {
               text: 'Jumlah Transaksi'
            }
         },
              series:             
            [
<?php
foreach ($chart as $c){
    $agen = $c->nama;
    $jumlahtrx = $c->jumlah_transaksi;
    ?>
    {
		  name: '<?php echo $agen; ?>',
		  data: [<?php echo $jumlahtrx; ?>]
    },
	  <?php } ?>
            ]
        });
});
