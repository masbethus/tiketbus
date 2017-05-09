<?php
// membuat header dokumen XML
header('Content-Type: text/xml');
echo "<?xml version='1.0'?>";
echo "<outbox>";
            if(empty($record)){
                echo "<data>Data tidak tersedia</data>";
            }else{
                foreach ($record as $r){
                    echo "<data>";
                    echo "<ID>$r->ID</ID>";
                    echo "<TextDecoded>$r->TextDecoded</TextDecoded>";
                    echo "<DestionationNumber>$r->DestinationNumber</DestionationNumber>";
                    echo "<SendingDateTime>$r->SendingDateTime</SendingDateTime>";
                    echo "</data>";
                }
            }
echo "</outbox>";
           ?>