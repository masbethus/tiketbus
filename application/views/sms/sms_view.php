<script type="text/javascript">
  function ajaxrunning(){
   if (window.XMLHttpRequest)
   {
       xmlhttp=new XMLHttpRequest();
   }
   else
   {
       xmlhttp =new ActiveXObject("Microsoft.XMLHTTP");
   }
   
   xmlhttp.onreadystatechange=function()
   {
       if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    }
   }
 
   xmlhttp.open("GET","<?PHP echo base_url('/tiket_engine/sms');?>");
   xmlhttp.send();
   setTimeout("ajaxrunning()", 3000);
  }
</script>
 </head>
 <body onload="ajaxrunning()">
 </body>
