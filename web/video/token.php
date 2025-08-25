<?php 
$secret = 'W39Hd509SeReT41p'; 
$vhost = 'nefes21.com'; 
$client_id = '10'; 
$stream_id = '14'; 
$expires = time() + 10000; 
$link = "{$client_id}_{$stream_id}_${secret}_${expires}_"; 
$md5 = md5($link, true); 
$md5 = base64_encode($md5); 
$md5 = strtr($md5, '+/', '-_'); 
$md5 = str_replace('=', '', $md5); 
$url = "https://{$vhost}/video/Files/test-video/{$client_id}_${stream_id}/${md5}/${expires}/output.m3u8"; 
echo $url; 
echo "\n"; 