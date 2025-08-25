<?php
$bannerAd[1] = '<a href="https://nefes21.com/turkiyeye-ozel-kampanya" target="_blank" rel="noopener"><img src="https://nefes21.com/player/live/300/tr3.png" alt="" /></a>';
$bannerAd[2] = '<a href="https://nefes21.com/avrupaya-ozel-kampanya" target="_blank" rel="noopener"><img src="https://nefes21.com/player/live/300/Avrupa_Yeni_Y%C4%B1l_Kampanyas%C4%B1_300x300.png" alt="" /></a>';
$bannerAd[3] = '<a href="https://nefes21.com/Kitaplar-Uygulama" target="_blank" rel="noopener"><img src="https://nefes21.com/player/live/300/kitapsiaris.png" alt="" /></a>';
$bannerAd[4] = '<a href="https://nefes21.com/Kitaplar-Uygulama" target="_blank" rel="noopener"><img src="https://nefes21.com/player/live/300/kitapsiaris1.png" alt="" /></a>';
$bannerAd[5] = '<a href="https://nefes21.com/Kitaplar-Uygulama" target="_blank" rel="noopener"><img src="https://nefes21.com/player/live/300/kitapsiaris2.png" alt="" /></a>';
$bannerAd[6] = '<a href="https://nefes21.com/dusod-butunsel-nefes-akademi" target="_blank" rel="noopener"><img src="https://nefes21.com/player/live/300/Nefes_Ko%C3%A7u_Olmak_%C4%B0stiyormusun_300x300.png" alt="" /></a>';
$bannerAd[7] = '<a href="https://nefes21.com/icf-acsth-onayli-profesyonel-kocluk-egitimi-avrupa" target="_blank" rel="noopener"><img src="https://nefes21.com/player/live/300/Ya%C5%9Fam_Ko%C3%A7u_Olmak_%C4%B0stiyormusun_300x300.png" alt="" /></a>';
$bannerAd[8] = '<a href="https://t.me/s/nefes21" target="_blank" rel="noopener"><img src="https://nefes21.com/player/live/300/Telegram_%20Sayfam%C4%B1za_%20Abone_Oldunuzmu_300x300.png" alt="" /></a>';
$bannerAd[9] = '<a href="https://nefes21.com/youtube-katil-butonumuza-abone-olabilirsiniz" target="_blank" rel="noopener"><img src="https://nefes21.com/player/live/300/Youtube_%C4%B0zlemek_%C4%B0%C3%A7in_T%C4%B1klay%C4%B1n_300x300.png" alt="" /></a>';
$bannerAd[10] = '<a href="https://nefes21.com/avrupaya-ozel-ocak-ayi-kampanyasi" target="_blank" rel="noopener"><img src="https://nefes21.com/player/live/300/Avrupa_Yeni_Y%C4%B1l_Kampanyas%C4%B1_300x300.png" alt="" /></a>';
$bannerAd[11] = '<a href="https://nefes21.online/app-download" target="_blank" rel="noopener"><img src="https://nefes21.com/player/live/300/Cep_Telefonu_Uygulamas%C4%B1_%C3%9Ccretsiz_%C4%B0ndirin_2_300x300.png" alt="" /></a>';
$bannerAd[12] = '<a href="https://nefes21.online/app-download" target="_blank" rel="noopener"><img src="https://nefes21.com/player/live/300/Cep_Telefonu_Uygulamas%C4%B1_%C3%9Ccretsiz_%C4%B0ndirin_300x300.png" alt="" /></a>';


$adCount = count($bannerAd);
$randomAdNumber = mt_rand(1, $adCount);
echo $bannerAd[$randomAdNumber];
?>