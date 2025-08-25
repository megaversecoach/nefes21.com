<?php
session_start();
/* DECLARE VARIABLES */
$username = 'admin';
$password = 'admin123';
$random1 = 'secret_key1';
$random2 = 'secret_key2';
$hash = md5($random1 . $password . $random2);
$self = $_SERVER['REQUEST_URI'];
/* USER LOGOUT */
if(isset($_GET['logout']))
{
	unset($_SESSION['login']);
}
/* USER IS LOGGED IN */
if (isset($_SESSION['login']) && $_SESSION['login'] == $hash)
{
	logged_in_msg($username);
}
/* FORM HAS BEEN SUBMITTED */
else if (isset($_POST['submit']))
{
	if ($_POST['username'] == $username && $_POST['password'] == $password)
	{
		//IF USERNAME AND PASSWORD ARE CORRECT SET THE LOGIN SESSION
		$_SESSION["login"] = $hash;
		header("Location: $_SERVER[PHP_SELF]");
	}
	else
	{
		// DISPLAY FORM WITH ERROR
		display_login_form();
		display_error_msg();
	}
}
/* SHOW THE LOGIN FORM */
else
{
	display_login_form();
}
/* TEMPLATES */
function display_login_form()
{
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Form</title>
<style>html {background-color:#ababab;background-blend-mode:overlay;display:flex;align-items:center;justify-content:center;background-image:url(https://cdn.statically.io/img/i.imgur.com/2oSVvpV.jpg?quality=10&f=auto);background-repeat:no-repeat;background-size:cover;height:100%;}</style>

</head>
<body>
<div class="uplay-login-form">
<?php echo '<form action="' . isset($self) . '" method="post">' .
'<h3 class="text-center">Please Login</h3>' .
'<input class="form-control item" type="text" name="username" id="username" placeholder="Your Username">' .
'<input class="form-control item" type="password" name="password" id="password" placeholder="Your Password">' .
'<input type="submit" name="submit" value="login" class="btn btn-primary btn-block logmein">' .
'</form>';
}
function logged_in_msg($username)
{
?>
<?php
	error_reporting(0);
	include "curl_gd.php";
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
	if($_POST['submit'] != ""){
		$url = $_POST['url'];
		$sub = $_POST['sub'];
		$poster = $_POST['poster'];
		$iframeid = my_simple_crypt($url);
		$file = '[{"file": "'.$v360p.'", "type":"video/mp4","label":"360p", "default": "true"},{"file": "'.$v480p.'", "type":"video/mp4","label":"480p"},{"file": "'.$v720p.'", "type":"video/mp4","label":"720p"}]';
	}
	$domain_name = (isset($_SERVER['HTTPS']) ? "https" : "https") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$domain_name = str_replace('index.php','',$domain_name);
	?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Google Photos Player</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
    <br />
<div class="container" style="width:80%">
<div class="row">
<div class="col-md-12">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">Google Photos Player</h3>
<p> <?php echo '<p>Welcome back <b>' . $username . '</b>. You have successfully logged in!</p>';?> </p>
<p class="lead"><a class="btn btn-info btn-sm" href="?logout=true" role="button">Log Out</a></p>
</div>
<div class="panel-body">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<?php if($iframeid){echo 'Video Preview:<br><iframe src="'.$domain_name.'embed.php?url='.$iframeid.'&sub='.$sub.'&poster='.$poster.'" width="100%" height="350px" frameborder="0" scrolling="no" allowfullscreen></iframe>';}?>
</div>
</div><br><br>
<form action="" method="POST" class="form-horizontal">
<div class="form-group">
<label for="drive" class="col-md-3 control-label">Google Photos Url</label>
<div class="col-md-6">
<input type="text" class="form-control" id="drive" name="url" placeholder="https://photos.google.com/share/xxxxxxxxxxx/photo/xxxxxxxxxx?key=xxxxxxxxxxxxx">
</div>
</div>
<div class="form-group">
<label for="subtitle" class="col-md-3 control-label">Subtitle</label>
<div class="col-md-6">
<input type="text" class="form-control" placeholder="https://example.com/srt/The-Flash-S01E01-Pilot.srt" name="sub">
</div>
</div>							
<div class="form-group">
<label for="poster" class="col-md-3 control-label">Poster</label>
<div class="col-md-6">
<input type="text" class="form-control" placeholder="https://m.media-amazon.com/images/M/MV5BMjI1MDAwNDM4OV5BMl5BanBnXkFtZTgwNjUwNDIxNjM@._V1_SY1000_SX800_AL_.jpg" name="poster">
</div>
</div>							
<div class="form-group">
<div class="col-md-6 col-md-offset-3">
<button value="GET" name="submit" class="btn btn-info" id="btn-create">GET & WATCH MOVIE</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<br>
<div>
<?php if($iframeid){echo 'Iframe Embed:<br><textarea style="margin:10px;width:98%;height:120px;">&lt;iframe src="'.$domain_name.'embed.php?url='.$iframeid.'&sub='.$sub.'&poster='.$poster.'" width="100%" height="100%" frameborder="0" scrolling="no" allowfullscreen&gt;&lt;/iframe&gt;</textarea>';}?>
</div>
<br>
<div>
<?php if($iframeid){echo 'Direct Link:<br><textarea style="margin:10px;width:98%;height:120px;">'.$domain_name.'embed.php?url='.$iframeid.'&sub='.$sub.'&poster='.$poster.'</textarea>';}?>
</div>
<p><b>Sample Google Photo URL:</b> <input type="text" value="https://photos.google.com/share/AF1QipMTEPAiVF8t0YqLukflnOSQjwfd8ARIoT2h37AXvYO1uaWodbeiFoBUDuD_19tEbg/photo/AF1QipPA2Bq0JlAR9LoGD3mogsxSb9OZWEG4XqBDD4Rv?key=cjhUT0xrZjM5NGN2SVRLOVptZU5SMUlKV0lQYWpB" id="myInput">
<button onclick="myFunction()">Copy</button></div>
</div>
<?php
	}
function display_error_msg()
{
	echo '<p>Username or password is invalid</p>';
}
?>
</div>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}
</script>
<script src="https://cdn.statically.io/gh/karankankaria/JWPlayer/master/bootstrap/4.0.0/js/bootstrap.min.js" defer></script>
</body>
</html>
