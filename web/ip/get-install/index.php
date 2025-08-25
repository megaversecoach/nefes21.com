<?php
    set_time_limit(500);
    $r_errors = array();

    if(phpversion() < 7) $r_errors[] = 'Required PHP Version is PHP VERSION >= 7. !';
    if(!function_exists('curl_version')) $r_errors[] = 'Required cUrl Extension. !';
    if(!ini_get('allow_url_fopen')) $r_errors[] = 'Enable URL fopen. !';
    if(!function_exists('mysqli_connect')) $r_errors[] = 'Required nd_MySqli Extension. !';
    if(!is_writable('../framework/config_sample.php')) $r_errors[] = 'App/config_sample.php file is not writable. !';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $filename = 'db.sql';
    $mysql_host = trim($_POST['host']);
    $mysql_username = trim($_POST['user']);
    $mysql_password = trim($_POST['pass']);
    $mysql_database = trim($_POST['name']);

    $conn = @mysqli_connect($mysql_host, $mysql_username, $mysql_password, $mysql_database);

    if($conn){
      mysqli_select_db($conn, $mysql_database);

    $templine = '';
    $lines = file($filename);

    foreach ($lines as $line){
    if (substr($line, 0, 2) == '--' || $line == '') continue;
    $templine .= $line;
    if (substr(trim($line), -1, 1) == ';') {
        mysqli_query($conn, $templine) or die('Error performing query \'<strong>' .  mysqli_error($conn) . '\': ' . 1 . '<br /><br />');
        $templine = '';
        }
    }
    generate_config($_POST);
    }else{
    $r_errors[] = 'Invalid database details !';
        }
    }
    ?>
    
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./../layouts/assets/css/tabler.min.css" >
    <script> document.title = "MXPlayer Install";</script>
    <link rel="shortcut icon" type="image/ico" href="./../layouts/static/icons/settings.svg" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body class="bg-install">
    <div class="container">
    <div class="row align-items-center justify-content-center vh-100">
    <div class="col-md-6">
    <div class="card border-0 shadow rounded-c">
    <div class="card-body">
    <h2 id="classic-inputs" class="text-center mb-4"><p class="h2">MXPlayer | OneClick! Installer</p></h2>

    <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($r_errors)): ?>
    <?php if (!empty($r_errors)): ?>
    <?php foreach ($r_errors as $error): ?>
    <div class="alert alert-danger">
    <?=$error?>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
    <div class="alert alert-c text-center mb-4" role="alert">
    <p class="font-weight-bold h2">Script Ready For Install</p>
    </div>

    <form class="" action="<?=$_SERVER['REQUEST_URI']?>" method="post">
    <div class="row">
    <div class="col">
    <label for="basic-url">Database Host Server</label>
    <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="bi bi-server"></i></span>
    </div>
    <input type="text" class="form-control" name="host" placeholder="example : localhost" required>
    </div>
    </div>
    <div class="col">
    <label for="basic-url">Database User</label>
    <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
    </div>
    <input type="text" class="form-control" name="user" placeholder="input your databse username" required>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col">
    <label for="basic-url">Database Name</label>
    <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
    </div>
    <input type="text" class="form-control" name="name" placeholder="input your databse name" required>
    </div>
    </div>
    <div class="col">
    <label for="basic-url">Database Password</label>
    <div class="input-group mb-3">
    <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="bi bi-shield-lock"></i></span>
    </div>
    <input type="text" class="form-control" name="pass" placeholder="input your databse password" >
    </div>
    </div>
    </div>
    <div class="col">
    <input type="submit" class="btn btn-c mt-3" name="submit" value="Install Now">
    </div>
    </form>
    </div>
    <div class="card-footer text-center">
    &#169; 2021-<?php echo date("Y"); ?> Powered By <a href="https://codeside.biz.id" target="_blank">Codeside ID</a>
    </div>
    
    <?php endif; ?>
    <?php else: ?>
    <div class="alert alert-info text-success border-0 text-center h3">
    <b>Congratulations !</b> Script Installed Successfully.
    </div>
    <div class="alert alert-danger text-center">
    DO NOT FORGET  DELETE <b> GET INSTALL </b> FOLDER
    </div>
    <div class="card text-center">
    <div class="card-body">
    <a class="btn btn-c" href="/login" role="button">Login Admin</a>
    <?php endif; ?>
    </div>
    </div>
    </div>
    </div>
    </div>    
    </div>
</body>
</html>

<?php

function generate_config($array){
	if(!empty($array)){
		if(file_exists('../framework/config_sample.php')){
			$file = file_get_contents('../framework/config_sample.php');
	    $file = str_replace("RHOST",trim($array["host"]),$file);
	    $file = str_replace("RDB",trim($array["name"]),$file);
	    $file = str_replace("RUSER",trim($array["user"]),$file);
	    $file = str_replace("RPASS",trim($array["pass"]),$file);
	    $fh = fopen('../framework/config_sample.php', 'w') or die("Can't open config_sample.php. Make sure it is writable.");
	    fwrite($fh, $file);
	    fclose($fh);
	    rename("../framework/config_sample.php", "../framework/config.php");
		}else{
      die('config_example.php file does not exist !');
    }
	}
}

function getHost() {
    if (isset($_SERVER['HTTP_HOST'])) {
        $host = $_SERVER['HTTP_HOST'];
    } else {
        $host = $_SERVER['SERVER_NAME'];
    }
    return trim($host);
}
?>
