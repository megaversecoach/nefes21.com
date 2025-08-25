<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
	.sayac{
		background:#0484AA repeat;
		border:1px dashed #555;
		border-radius:10px;
		color:#FFFFFF;
		width:300px;
		
	}
	p{
		border-bottom: 3px solid #fff;
		color:#FFFFFF;
	}
	
</style>


<?php


	$sayac_degeri = file_get_contents('hit.txt');
	$sayac_degeri = $sayac_degeri+1;
	file_put_contents('hit.txt',$sayac_degeri);
	
	echo 'Site Goruntulenme Sayisi: '.$sayac_degeri;
 



/*
margin:0px auto;
CREATE TABLE IF NOT EXISTS `hit` (
  `gun` int(11) NOT NULL,
  `ay` int(11) NOT NULL,
  `yil` int(11) NOT NULL,
  `simdi` int(11) NOT NULL,
  `sayac` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

*/
// veri tabanı yukarda 
 function vehbiakdoganSayac()
 {
 	$host='localhost'; // mysql host
 	$user='nefes03_sayac'; // kullanıcı adı
	$pass='1416174sa'; // şifresi
	$vt='nefes03_sayac'; // veri tabanı adı 
	try {
	    $db = new PDO('mysql:host='.$host.';dbname='.$vt, $user, $pass);
	} catch (PDOException $v) {
	    echo 'Bağlantı Başarısız:  ' . $v->getMessage();
	}
	 // Veri tabanı bağlantımızı yaptık
	 
 	$bugun=date("d"); // bugünün tarihi 
 	$ay=date("m"); // bu ay
 	$yil=date("Y"); // bu yıl 
 	$onlineSuresi=time()-2*60*60; // iki dakika aktif olmazsa onlineden düşecek
 	$ip=$_SERVER['REMOTE_ADDR']; // ziyaretçinin ip si 
 	$bugunGiris=$db->query("SELECT * FROM hit WHERE ip='$ip' AND gun='$bugun'")->rowCount(); // bugün o ip ile girilmişmi 
 	if($bugunGiris!=0){ // yani bugün girilmişse
 	$al=$db->query("SELECT * FROM `hit` WHERE  `ip`='".$ip."' AND `gun`='".$bugun."'")->fetch();
 	$guncelle=$db->query("UPDATE `hit` SET `sayac`='".($al['sayac']+1)."' WHERE id='".$al['id']."'"); // çoğulu 1 artırdık 
		
	}else{ // griş yapılmamışsa kaydettirelim
		$db->query("INSERT INTO `hit` SET `gun`='$bugun', `ay`='$ay', `yil`='$yil', simdi='".time()."', sayac='1',ip='$ip'");
		
	}
	// evet sıra geldi online, tekil ve çoğulu Göstermeye
	// online Kişi 
	$online=$db->query("SELECT * FROM hit WHERE simdi>='$onlineSuresi'")->rowCount(); // onlnie kişilerimiz
	// çoğul hitler 
	$bugunx=$db->query("SELECT SUM(sayac) FROM hit WHERE gun='$bugun' AND ay='$ay' AND yil='$yil' ORDER BY id desc")->fetch();
	$bugun_cogul=$bugunx['SUM(sayac)']; // bugün çoğul
	$dunx=$db->query("SELECT SUM(sayac) FROM hit WHERE gun='".($bugun-1)."' AND ay='$ay' AND yil='$yil' ORDER BY id desc")->fetch();
	$dun_cogul=$dunx['SUM(sayac)']; // dün Çoğul 
	$ayx=$db->query("SELECT SUM(sayac) FROM hit WHERE ay='$ay' AND yil='$yil' ORDER BY id desc")->fetch();
	$buay_cogul=$ayx['SUM(sayac)']; // bu ay çoğul
	$toplamx=$db->query("SELECT SUM(sayac) FROM hit ORDER BY id desc")->fetch();
	$toplam_cogul=$toplamx['SUM(sayac)']; // toplam çoğulumuz
	// tekil hitler 
	$bugun_tekil=$db->query("SELECT * FROM hit WHERE gun='$bugun' AND ay='$ay' AND yil='$yil'")->rowCount(); // bugün tekil
	$dun_tekil=$db->query("SELECT * FROM hit WHERE gun='".($bugun-1)."' AND ay='$ay' AND yil='$yil'")->rowCount(); // dün tekil
	$buay_tekil=$db->query("SELECT * FROM hit WHERE  ay='$ay' AND yil='$yil'")->rowCount(); // dün tekil
	$toplam_tekil=$db->query("SELECT * FROM hit")->rowCount(); // dün tekil
	//yedekler   <p>Online: $online </p> 
	//yedekler	 <p>Bugün Tekil: $bugun_tekil</p>
	//yedekler	 <p>Dün Tekil: $dun_tekil</p>
	//yedekler   <p>Buay Tekil: $buay_tekil</p>
	//yedekler   <p>Toplam Tekil: $toplam_tekil</p>
	echo"<div class='sayac'>
	
		  <p>Online: $online </p>  
            <p>Bugün Tekil: $bugun_tekil</p>  
            <p>Bugün Çoğul: $sayac_degeri</p>  
            <p>Dün Tekil: $dun_tekil</p>  
            <p>Dün Çoğul: $dun_cogul</p>  
            <p>Buay Tekil: $buay_tekil</p>  
            <p>Buay Çoğul: $buay_cogul</p>  
            <p>Toplam Tekil: $toplam_tekil</p>  
            <p>Toplam Çoğul: $toplam_cogul</p>  
            </div>";  
  }  
  vehbiakdoganSayac();  
 ?>  
