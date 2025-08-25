<?php define("include",true); include("vendor/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="robots" content="noindex,nofollow,nosnippet,noodp,noarchive,noimageindex">
<!-- Google Tag Manager -->

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

})(window,document,'script','dataLayer','GTM-PMGN744');</script>

<!-- End Google Tag Manager -->
<script type="text/javascript">
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(45573864, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/45573864" style="position:absolute; left:-9999px;" alt="" /></div></noscript>


<script async src="https://www.googletagmanager.com/gtag/js?id=UA-72507059-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-72507059-1');
</script>
	
  <title><?php echo $print['siteadi']; ?></title>

  <link rel="shortcut icon" href="vendor/favicon.png">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/fontawesome/all.min.css" rel="stylesheet">
<?php echo $print['analytics']; ?>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f7b7cd94ce70c01"></script>

</head>
<body>
<!-- Google Tag Manager (noscript) -->

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PMGN744"

height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<!-- End Google Tag Manager (noscript) -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="index.php"><i class="fas fa-poll"></i> <?php echo $print['siteadi']; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link"> <i class="far fa-calendar-alt"></i> <?php echo date('d.m.Y'); ?>&nbsp;&nbsp;&nbsp;<i class="far fa-clock"></i> <?php echo date('H:i'); ?></a></li>
		  
        </ul>
      </div>
    </div>
  </nav>
<br>

                <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <center> <i class="fas fa-home"></i> <a title="Anasayfa" href="https://nefes21.com/"><span style="color: #000000;">Anasayfa'ya gitmek için TIKLAYINIZ.</span></a> <br>  <h3>ANKETİ PAYLAŞABİLİRSİNİZ.</h3>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->

<div class='widget-content'>
<center><a class='blur' href='https://www.facebook.com/sharer/sharer.php?u=https://nefes21.com/en-cok-taninan-kisisel-gelisim-yazarlari' rel='nofollow' target='_blank'><img alt='facebook' border='0' height='40' src='http://icons.iconarchive.com/icons/danleech/simple/128/facebook-icon.png' width='40'/></a>
<a class='blur' href='https://twitter.com/share?url=https://nefes21.com/en-cok-taninan-kisisel-gelisim-yazarlari&text=EN ÇOK TANINAN KİŞİSEL GELİŞİM UZMANLARI ANKETİ ' rel='nofollow' target='_blank'><img alt='twitter' border='0' height='41' src='http://icons.iconarchive.com/icons/danleech/simple/128/twitter-icon.png' width='40'/></a>
<a class='blur' href='whatsapp://send?text=https://nefes21.com/en-cok-taninan-kisisel-gelisim-yazarlari' rel='nofollow' target='_blank'><img alt='google+' border='0' height='40' src='https://icons.iconarchive.com/icons/limav/flat-gradient-social/128/Whatsapp-icon.png' width='40'/></a>
<a class='blur' href='tg://msg_url?url=https://nefes21.com/en-cok-taninan-kisisel-gelisim-yazarlari&amp;text=En Çok Tanınan Kişisel Gelişim Yazarları' rel='nofollow' target='_blank'><img alt='feedburner' border='0' height='40' src='https://icons.iconarchive.com/icons/froyoshark/enkel/128/Telegram-icon.png' width='40'/></a>
</center>
</div>
				</center>
            
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
	  
<?php $sorgu = $db->prepare("select * from sorular where sID=?"); $sorgu->execute(array($print['anket_id'])); if($sorgu->rowCount()=="0"){  
echo '<div class="alert alert-warning mt-5"><i class="fas fa-exclamation-triangle"></i> Seçilmiş bir anket olmadığı için bu uyarıyı görüyorsunuz! Bu sayfada anket görünmesi için yönetici panelinde yer alan ayarlar sayfasından anket seçmeniz gerekir...</div>'; }else{ $aaa = $sorgu->fetch(PDO::FETCH_ASSOC);
$say = $db->query("select count(*) from ip_list where ip='".$ip."' AND sID='".$aaa['sID']."'")->fetchColumn(); if($say>="1"){ ?>

        <h3 class="mt-5"><i class="fas fa-poll-h"></i> <?php echo $aaa['baslik']; ?>  ANKETİ SONUÇLARI</h3>

		<div class="alert alert-info"><i class="fas fa-info-circle"></i> Bu ankette daha önce oy kullandığınız için teşekkür ederiz.</div>	
		<ul class="list-group">
<?php foreach($db->query("select * from cevaplar where sID='".$aaa['sID']."'") as $ccc){ $ddd = $db->query("select sum(oy_sayisi) from cevaplar where sID='".$aaa['sID']."'")->fetchColumn(); ?>		
		  <li class="list-group-item">
			<i class="fas fa-asterisk"></i> <?php echo $ccc['baslik']; ?> <small>(<?php echo number_format($ccc['oy_sayisi']); ?> oy)</small>
			<div class="progress">
			  <div class="progress-bar" role="progressbar" style="width: <?php echo round((($ccc['oy_sayisi']/$ddd)*100),2); ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">%<?php echo round((($ccc['oy_sayisi']/$ddd)*100),2); ?></div>
			</div>	  
		  </li>	 
<?php } ?>		  
		</ul>
<?php }else{ ?>
        <h3 class="mt-5"> <?php echo $aaa['baslik']; ?> ANKETİNE HOŞ GELDİNİZ</h3>
				<div class="alert alert-success" role="alert">
  Kişisel Gelişim Uzmanlarının yer aldığı anket çalışmasına hoş geldiniz. Listede yer alan uzmanlardan, size bilgileriyle destek olan kişiye, şimdi de sizin destek olmak vaktiniz. Oy vererek ve anketi paylaşarak sevdiğiniz kişiye destek olabilirsiniz.

</div>
<?php if(isset($_POST['send'])){

if(!isset($_POST['cevap_id'])){ echo '<div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> Ankete katılmak için seçim yapmanız gerekir!</div>'; }else{ $id = intval($_POST['cevap_id']);

if($id==""){ echo '<div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> Bir hata oluştu! Lütfen sayfayı yenileyip tekrar deneyin.</div>'; }else{
	
$db->query("update cevaplar set oy_sayisi=oy_sayisi+1 where id='".$id."'"); $db->query("insert into ip_list set ip='".$ip."',sID='".$aaa['sID']."'");

echo '<div class="alert alert-success"><i class="fas fa-check-circle"></i> Seçiminiz kaydedildi! Ankete katıldığınız için teşekkür ederiz. Sayfa yenileniyor...</div>'; 
echo '<meta http-equiv="refresh" content="3;URL=index.php">'; } } } ?>
		<div class="list-group">
		<form method="post">
<?php foreach($db->query("select * from cevaplar where sID='".$aaa['sID']."'") as $bbb){ ?>
		  <span class="list-group-item list-group-item-action"><input type="radio" name="cevap_id" value="<?php echo $bbb['id']; ?>"> <?php echo $bbb['baslik']; ?></span>
<?php } ?><br>
			<button type="submit" name="send" class="btn btn-primary"><i class="far fa-hand-point-right"></i> Ankete Katıl</button>
		</form>
		</div>
<?php } }  ?>
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>

 

  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/fontawesome/all.min.js"></script>
  <script>$('.list-group-item').on('click', e => { $('input', e.target).prop('checked', true); });</script>

</body>
</html>