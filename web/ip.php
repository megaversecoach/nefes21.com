<?php

function GetIP(){
 if(getenv("HTTP_CLIENT_IP")) {
  $ip = getenv("HTTP_CLIENT_IP");
 } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
  $ip = getenv("HTTP_X_FORWARDED_FOR");
   if (strstr($ip, ',')) {
    $tmp = explode (',', $ip); $ip = trim($tmp[0]);
   }
 } else {
  $ip = getenv("REMOTE_ADDR");
 }
 return $ip;
}

$ip = GetIP();


 
$ch = curl_init('http://ip-api.com/json/'.$ip.'?lang=en');                                                                     
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json'                                                                                
));
$result = curl_exec($ch);

$data = json_decode($result);
 
echo "Durum: ".$data->status;
echo " <br> ";

echo "İp Adresi: ".$data->query;
echo " <br> ";

echo "Ülke:".$data->country;
echo " <br> ";
 
echo "Ülke Kodu:".$data->countryCode;
echo " <br> ";
 
echo "Şehir:".$data->regionName;
echo " <br> ";
 
echo "Posta Kodu:".$data->zip;
echo " <br> ";
 
echo "Saat Dilimi:".$data->timezone;
echo " <br> ";
 
echo "İnternet Sağlayıcısı:".$data->isp;
echo " <br> ";
 
echo "Firma Adı:".$data->as;

?>