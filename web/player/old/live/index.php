<script> 
window.setTimeout("document.getElementById('reklami').style.display = 'none';document.getElementById('kendisi').style.display = '';",10000); 
</script> 

       <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script type="text/javascript">
 
            $(function(){
 
                var saniye = 10;
                var sayacYeri = $("div.sayac span");
 
                $.sayimiBaslat = function(){
                    if(saniye > 1){
                        saniye--;
                        sayacYeri.text(saniye);
                    } else {
                        $("div.sayac").text("Merhabalar, ben Ali Demirci.");
                    }
                }
 
                sayacYeri.text(saniye);
                setInterval("$.sayimiBaslat()", 1000);
 
            });
 
        </script>
		
		<style type="text/css">
 
            body {
                margin: 0;
                padding: 0;
                font-family: Arial;
            }
 
            div.sayac {
                background-color: #1da7da;
                padding: 15px 20px;
                border-bottom: 5px solid #161616;
            }
 
            div.sayac span {
                font-weight: bold;
				color: white;
            }
 
        </style>

<div id="reklami"> 
<div align="right"><font face="Arial" style="font-size: 15pt; font-weight: 700"><a href="#" onclick="document.getElementById('reklami').style.display = 'none';document.getElementById('kendisi').style.display = '';"> 
    <font color="#000000">Reklamı Geç»</font></a></font></div> 
<center> 
<font color="#000000"> 
<font face="Arial" style="font-size: 9pt; font-color: white font-weight: 700">        <div class="sayac"><span></span> <strong>saniye sonra test yayınımız açılacaktır.</strong></div>
<br> 


<?php
$bannerAd[1] = '<a href="https://nefes21.com/tukiyeye-ozel-ocak-ayi-kampanyasi" target="_blank" rel="noopener"><img src="https://nefes21.com/player/live/300/T%C3%BCrkiye_Ocak_Ay%C4%B1_Kampanyas%C4%B1_300x300.png" alt="" /></a>';
$bannerAd[2] = '<a href="https://nefes21.com/avrupaya-ozel-ocak-ayi-kampanyasi" target="_blank" rel="noopener"><img src="https://nefes21.com/player/live/300/Avrupa_Yeni_Y%C4%B1l_Kampanyas%C4%B1_300x300.png" alt="" /></a>';


$adCount = count($bannerAd);
$randomAdNumber = mt_rand(1, $adCount);
echo $bannerAd[$randomAdNumber];
?>

</font> 
</div> 

<div id="kendisi" style="display:none";> 


<style>
body {
margin-left: 0px;
margin-top: 0px;
margin-right: 0px;
margin-bottom: 0px;
}
#MediaPlayerOverview{
	width:100% !important;
	height:100% !important;
}


</style>


<!-- CSS  -->
 <link href="https://vjs.zencdn.net/7.2.3/video-js.css" rel="stylesheet">



<!-- HTML -->
<video id='MediaPlayerOverview'  class="video-js vjs-default-skin vjs-big-play-centered" width="400" height="300" controls>

<p><a href="https://www.dr.com.tr/Kitap/Kendini-Ertelemekten-Vazgec/Bulent-Gardiyanoglu/Egitim-Basvuru/Kisisel-Gelisim/urunno=0001896549001" target="_blank" rel="noopener"><img src="resim728/<?php echo $img[$rastgele_cek] ?>" alt="" /></a></p>

<source type="application/x-mpegURL" src="https://nefes21.arsivnet.net/P264447631/nefes21/playlist.m3u8">
</video>


<!-- JS code -->
<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
<script src="https://vjs.zencdn.net/ie8/ie8-version/videojs-ie8.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.14.1/videojs-contrib-hls.js"></script>
<script src="https://vjs.zencdn.net/7.2.3/video.js"></script>

<script>
var player = videojs('MediaPlayerOverview');
player.play();
</script>

<?php
$files = scandir('resim728/');
 
$img = array();
foreach($files as $item){
    if(preg_match('#(.*?).jpg#',$item)) {
        $img[] = $item;
    }
}
$say = count($img);
$rastgele_cek = rand(0,$say - 1);
 
/**echo 'Seçilen resim: <img src="resimler/'.$img[$rastgele_cek].'">';*/


?>


<p><a href="https://www.dr.com.tr/Kitap/Kendini-Ertelemekten-Vazgec/Bulent-Gardiyanoglu/Egitim-Basvuru/Kisisel-Gelisim/urunno=0001896549001" target="_blank" rel="noopener"><img src="resim728/<?php echo $img[$rastgele_cek] ?>" alt="" /></a></p>




</div>