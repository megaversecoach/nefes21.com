<?php 
include("vt.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz. 
?>



<?php 

$sorgu = $baglanti->query("SELECT * FROM yatay ORDER BY RAND() LIMIT 1"); // yatay tablosundaki tüm verileri çekiyoruz.


while ($sonuc = $sorgu->fetch_assoc()) { 

$id = $sonuc['id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
$baslik = $sonuc['baslik'];
$icerik = $sonuc['icerik'];

// While döngüsü ile verileri sıralayacağız. Burada PHP tagını kapatarak tırnaklarla uğraşmadan tekrarlatabiliriz. 
?>
	





<?php

$bannerAd[1] = '<a href="'.$baslik.'" target="_blank" rel="noopener"><img src="'.$icerik.'" alt="" /></a>';

$adCount = count($bannerAd);
$randomAdNumber = mt_rand(1, $adCount);
echo $bannerAd[$randomAdNumber];
?>



	

<?php } // Tekrarlanacak kısım bittikten sonra PHP tagının içinde while döngüsünü süslü parantezi kapatarak sonlandırıyoruz. ?>







