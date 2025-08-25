<?php 
include("vt.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz. 
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Yatay reklam İşlemleri</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="col-md-6">
<form action="" method="post">
	
	<table class="table">
		
		<tr>
			<td>Gideceği Link</td>
			<td><input type="text" name="baslik" class="form-control" ></td>
		</tr>

		<tr>
			<td>Resim Linki</td>
			<td><textarea name="icerik" class="form-control" ></textarea></td>
		</tr>

		<tr>
			<td></td>
			<td><input class="btn btn-primary"  type="submit" value="Ekle"></td>
		</tr>

	</table>

</form>

<!-- Öncelikle HTML düzenimizi oluşturuyoruz. Daha sonra girdiğimiz verileri veritabanına eklemesi için PHP kodlarına geçiyoruz. -->

<?php 

if ($_POST) { // Sayfada post olup olmadığını kontrol ediyoruz.
	
	$baslik = $_POST['baslik']; // Sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz
	$icerik = $_POST['icerik'];

	if ($baslik<>"" && $icerik<>"") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz. başka kontrollerde yapabilirsiniz.
		
		if ($baglanti->query("INSERT INTO yatay (baslik, icerik) VALUES ('$baslik','$icerik')")) // Veri ekleme sorgumuzu yazıyoruz.
		{
			echo "Veri Eklendi"; // Eğer veri eklendiyse eklendi yazmasını sağlıyoruz.
		}
		else
		{
			echo "Hata oluştu";
		}

	}

}

?>
</div>
<!-- ############################################################## -->

<!-- Veritabanına eklenmiş verileri sıralamak için önce üst kısmı hazırlayalım. -->
<div class="col-md-7">
<table class="table">
	
	<tr>
		<th>No</th>
		<th>Gideceği Link</th>
		<th>Resim Link</th>
		<th></th>
		<th></th>
	</tr>

<!-- Şimdi ise verileri sıralayarak çekmek için PHP kodlamamıza geçiyoruz. -->

<?php 

$sorgu = $baglanti->query("SELECT * FROM yatay"); // yatay tablosundaki tüm verileri çekiyoruz.

while ($sonuc = $sorgu->fetch_assoc()) { 

$id = $sonuc['id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
$baslik = $sonuc['baslik'];
$icerik = $sonuc['icerik'];

// While döngüsü ile verileri sıralayacağız. Burada PHP tagını kapatarak tırnaklarla uğraşmadan tekrarlatabiliriz. 
?>
	
	<tr>
		<td><?php echo $id; // Yukarıda tanıttığımız gibi alanları dolduruyoruz. ?></td>
		<td><?php echo $baslik; ?></td>
	

		<td><img src="<?php echo $icerik; ?>" width="250" height="31" alt=""></td>

		<td><a href="duzenle2.php?id=<?php echo $id; ?>" class="btn btn-primary">Düzenle</a></td>
		<td><a href="sil2.php?id=<?php echo $id; ?>" class="btn btn-danger">Sil</a></td>
	</tr>

<?php } // Tekrarlanacak kısım bittikten sonra PHP tagının içinde while döngüsünü süslü parantezi kapatarak sonlandırıyoruz. ?>

</table>
</div>
</div>
</body>
</html>