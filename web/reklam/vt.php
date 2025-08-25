<?php
error_reporting(0);
@$baglanti = new mysqli('localhost', 'nefes21reklam', 'qY0c898m*', 'nefes21reklam'); // Veritabanı bağlantımızı yapıyoruz.
	if(mysqli_connect_error())
	{
		echo mysqli_connect_error();
		exit; //eğer bağlantıda hata varsa PHP çalışmasını sonlandırıyoruz.
	}

$baglanti->set_charset("utf8"); // Türkçe karakter sorunu olmaması için utf8'e çeviriyoruz.


?>

