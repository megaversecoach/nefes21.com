<?PHP
header('X-Frame-Options: SAMEORIGIN');
?>
<?php
error_reporting(0);
function encrypte($string,$key){
    $returnString = "";
    $charsArray = str_split("e7NjchMCEGgTpsx3mKXbVPiAqn8DLzWo_6.tvwJQ-R0OUrSak954fd2FYyuH~1lIBZ");
    $charsLength = count($charsArray);
    $stringArray = str_split($string);
    $keyArray = str_split(hash('sha256',$key));
    $randomKeyArray = array();
    while(count($randomKeyArray) < $charsLength){
        $randomKeyArray[] = $charsArray[rand(0, $charsLength-1)];
    }
    for ($a = 0; $a < count($stringArray); $a++){
        $numeric = ord($stringArray[$a]) + ord($randomKeyArray[$a%$charsLength]);
        $returnString .= $charsArray[floor($numeric/$charsLength)];
        $returnString .= $charsArray[$numeric%$charsLength];
    }
    $randomKeyEnc = '';
    for ($a = 0; $a < $charsLength; $a++){
        $numeric = ord($randomKeyArray[$a]) + ord($keyArray[$a%count($keyArray)]);
        $randomKeyEnc .= $charsArray[floor($numeric/$charsLength)];
        $randomKeyEnc .= $charsArray[$numeric%$charsLength];
    }
    return $randomKeyEnc.hash('sha256',$string).$returnString;
}
function split_link($link) {
	$spilt = chunk_split($link, 500, "=");
	$array = explode('=', $spilt);
	foreach($array as $i => $data) {
		$list .= 'link'.($i+1).'='.$data.'&';
	}
	$split_link = rtrim($list, '&');
	return $split_link;
}
include "curl_gd.php";
require_once 'packer.php';
$domain_name = (isset($_SERVER['HTTPS']) ? "https" : "https") . "://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);

if($_GET['url'] != ""){
	$url = $_GET['url'];
	$sub = $_GET['sub'];
	$poster = $_GET['poster'];
	$original_id = my_simple_crypt($url, 'd');
	$url = ''.$original_id.'';
	$url = $original_id;
	function curl($url){
		$ch = @curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		$head[] = "Connection: keep-alive";
		$head[] = "Keep-Alive: 300";
		$head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
		$head[] = "Accept-Language: en-us,en;q=0.5";
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36');
		curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
		$page = curl_exec($ch);
		curl_close($ch);
		return $page;
}
function cut_str($str, $left, $right){
	$str = substr(stristr($str, $left) , strlen($left));
	$leftLen = strlen(stristr($str, $right));
	$leftLen = $leftLen ? -($leftLen) : strlen($str);
	$str = substr($str, 0, $leftLen);
	return $str;
}
if(isset($url)){
	$curTemp = curl($url);
	$curTemp = cut_str($curTemp,'{"79468658":[[','"]');
	$curTemp = str_replace('\u003d','=', $curTemp);
	$curTemp = str_replace('\u0026','&', $curTemp);
	$curTemp = urldecode($curTemp);
	if ($curTemp <> "") {
		$curList = explode("&",$curTemp);
		foreach ($curList as $curl) {
		$curl = trim(substr($curl, strpos($curl,'https')-strlen($curl)));
			if ($curl <> "" ){
				if (strpos($curl,'itag=22') || strpos($curl,'=m22') !== false) {$v720p=$curl;}
				if (strpos($curl,'itag=22') || strpos($curl,'=m22') !== false) {$v480p=$curl;}
				if (strpos($curl,'itag=18') || strpos($curl,'=m18') !== false) {$v360p=$curl;}
			}
		}
	}
	}
	
	$file = '[{"file":"'.$domain_name.'/redirector.php?'.split_link(encrypte($v360p,'uplaycrypt')).'","label":"360p","type":"video\/mp4","default":"true"}]';
}

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Google Photos Player</title>
<link rel="icon" href="https://cdn.staticaly.com/gh/domkiddie/drive/master/assets/img/favicon.png">
<meta name="referrer" content="never" /><meta name="referrer" content="no-referrer" />
<link rel='dns-prefetch' href='//cdn.statically.io' /><link rel='dns-prefetch' href='//lh3.googleusercontent.com' /><link rel='preconnect' href='//cdn.statically.io' />
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.js"></script>	
<style>body,html {background-color: #000;margin:0px;padding:0;width:100%;height:100%;border:none;}@-webkit-keyframes spin{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}@-moz-keyframes spin{0%{-moz-transform:rotate(0)}100%{-moz-transform:rotate(360deg)}}@keyframes spin{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}.ancok-spinner{position:fixed;top:0;left:0;width:100%;height:100%;z-index:1003;background: #000000;overflow:hidden}  .ancok-spinner div:first-child{display:block;position:relative;left:50%;top:50%;width:150px;height:150px;margin:-75px 0 0 -75px;border-radius:50%;box-shadow:0 3px 3px 0 rgba(255,56,106,1);transform:translate3d(0,0,0);animation:spin 2s linear infinite}  .ancok-spinner div:first-child:after,.ancok-spinner div:first-child:before{content:'';position:absolute;border-radius:50%}  .ancok-spinner div:first-child:before{top:5px;left:5px;right:5px;bottom:5px;box-shadow:0 3px 3px 0 rgb(255, 228, 32);-webkit-animation:spin 3s linear infinite;animation:spin 3s linear infinite}  .ancok-spinner div:first-child:after{top:15px;left:15px;right:15px;bottom:15px;box-shadow:0 3px 3px 0 rgba(61, 175, 255,1);animation:spin 1.5s linear infinite}</style>
</head>
<body>
<div id="ancokplayer-loading-style" class="ancok-spinner"><div class="blob blob-0"></div><div class="blob blob-1"></div><div class="blob blob-2"></div><div class="blob blob-3"></div><div class="blob blob-4"></div><div class="blob blob-5"></div></div>
<?php
$result = '<script type="text/javascript" src="https://nefes21.com/player/live/jwplayer2x.js"></script>
<script type="text/javascript">jwplayer.key = "T9B1QH8ZOp1oyGyL/88olz7Ypv58aHwwNKQR8w==";</script>
<div id="ancok-player"></div>';
$data = 'var playerInstance = jwplayer("ancok-player");playerInstance.setup({sources:'.$file.',preload:"auto",primary:"html5",autostart:"false",playbackRateControls: [0.25, 0.5, 0.75, 1, 2, 3, 4],image:"'.$poster.'",width:"100%",height:"100%",tracks:[{file:"'.$sub.'",label:"English",kind:"captions"}],captions:{color:"#FFFF00",fontSize:15,edgeStyle:"uniform",backgroundOpacity:0,},aboutlink:"https://nefes21.com",abouttext:"NEFES21.COM",sharing: {},advertising:{client:"vast",admessage:"This is an ad pod. This ad ends in xx seconds.",schedule:{adbreak1:{offset:"pre",tag:"https://vast.yomeno.xyz/?tcid=1539"},overlay:{offset:"5",tag: "overlay.xml",type:"nonlinear"},adbreak2:{ offset:"50%",tag:"https://vast.yomeno.xyz/?tcid=1539"},overlay:{offset:"5", tag:"overlay.xml",type:"nonlinear"}}}});playerInstance.on("error", function() { playerInstance = jwplayer("ancok-player"); playerInstance.setup({ width: "100%", height: "100%", autostart: false, sources:[{"file":"https://www.googleapis.com/drive/v3/files/1VstS11auX0pu8JPA6xz8FY-NOKu0Rus0?alt=media&key=AIzaSyDdoetN4aDmDBc6Y11CUGK4nhZ0pvZbXOw","type":"video/mp4","label":"360p", "default": "true"}],tracks:[{"file":"/","label":"English","kind":"captions","default":"true"}],logo: {file: ""}, abouttext: "Download Grive-X Player", aboutlink: "https://github.com/karankankaria/GDrive-X", captions: { color: "#FFFF00", fontSize: 14, backgroundOpacity:0,edgeStyle:"uniform" }});});
';
$packer = new Packer($data, 'Normal', true, false, true);
$packed = $packer->pack();
$result .= '<script type="text/javascript">' . $packed . '</script>';
echo $result;
?>

<noscript><i>Javascript required</i></noscript>
<script type="text/javascript">
   (function ($) {
  function getTimer(obj) {
    return obj.data("swd_timer");
  }

  function setTimer(obj, timer) {
    obj.data("swd_timer", timer);
  }

  $.fn.showWithDelay = function (delay) {
    var self = this;
    if (getTimer(this)) {
      window.clearTimeout(getTimer(this)); 
    }
    setTimer(this, window.setTimeout(function () {
      setTimer(self, false);
      $(self).show();
    }, delay));
  };
  $.fn.hideWithDelay = function () {

    if (getTimer(this)) {
      window.clearTimeout(getTimer(this));
      setTimer(this, false);
    }
    $(this).hide();
  }
})(jQuery);

$(document).ready(function () {
  $("#ancokplayer-loading-style").showWithDelay(0);
  
  window.setTimeout(function () {
    
    $("#ancokplayer-loading-style").hideWithDelay();
  }, 1000);

  
});</script>

</body>
</html>
