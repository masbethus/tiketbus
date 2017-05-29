<table width="200" border="1">
<tr>
<?php
$kolom = 4;
$i = 0;
$w = 0;
$k =32;
    foreach ($record->result() as $p){
        $pnp = $p->nama_pelanggan;
        $agen = $p->nama;
        $notiket = $p->no_tiket;
        
        if ($i >= $kolom) {
        echo "<tr></tr>";
        $i = 0;
    }
    $i++;
 $w++;
?>
 <td width="90"><?php echo $pnp; ?><br><?php echo "No Tiket : " .$notiket;?><br><?php echo $w; ?></td>
<?php
}
?>
</tr>
</table>