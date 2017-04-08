 <?php

   $soap_request = '<?xml version="1.0" encoding="UTF-8"?> <SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://wsdl.example.org/">
<SOAP-ENV:Header>
   <ns1:requestHeader>
      <username>osaro</username>
      <password>boom</password>
   </ns1:requestHeader>
</SOAP-ENV:Header>
   <SOAP-ENV:Body>
      <ns1:boom>
         <first>PHP SOAP</first>
         <last>Tutorial</last>
      </ns1:boom>
</SOAP-ENV:Body>
</SOAP-ENV:Envelope>';
 
$headers = array(
     "Content-type: text/xml",
     "Accept: text/xml",
     "Cache-Control: no-cache",
     "Pragma: no-cache",
     "SOAPAction: http://url/location/of/soap/method", 
     "Content-length: ".strlen($soap_request),
                    ); 
$url = "http://localhost/soap/server/location";
 $ch = curl_init($url);
   
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
 curl_setopt($ch, CURLOPT_POSTFIELDS, $soap_request);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_VERBOSE, true);
 curl_setopt($ch, CURLOPT_TIMEOUT,10);
 
 $output = curl_exec($ch);
 
 curl_close($ch);
 
var_dump($output);
echo("
RESPONSE FROM SERVER :
" .htmlspecialchars($output) . "
"); 
  