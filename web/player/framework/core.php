<?php


define('APP', true);
define('VERSION', '1.0');



//start session
if(!isset($_SESSION))
{
    session_start();
}


// Error Reporting
if(!DEBUG)
{
    error_reporting(0);
}
else
{
    ini_set('display_error',1);
    ini_set('error_reporting',E_ALL);
    error_reporting(-1);
}


// Connect to Database
include(ROOT.'/framework/Database.class.php');
$db = new Database($config);
$config = $db->get_config();

//Set timezone
if(!empty($config['timezone'])){
    date_default_timezone_set($config["timezone"]);
  }

// Start Application
include(ROOT.'/framework/App.class.php');
$app = new App($db,$config);


// Get theme functions file
if(file_exists(ROOT.'/layouts/functions.php'))
{
    include(TEMPLATE.'/functions.php');
}


//Application Helpers
include(ROOT.'/framework/Helper.class.php');
include(ROOT.'/framework/Proxy.class.php');
include(ROOT.'/framework/Cache.class.php');
include(ROOT.'/framework/Stream.class.php');
include(ROOT.'/framework/Upload.class.php');
include(ROOT.'/framework/Link.class.php');
include(ROOT.'/framework/Server.class.php');
include(ROOT.'/framework/User.class.php');

include(ROOT.'/framework/library/JSPacker.php');

include(ROOT.'/framework/sources/GDrive.class.php');
include(ROOT.'/framework/sources/GPhoto.class.php');
include(ROOT.'/framework/sources/Yandex.class.php');



function getLayoutsURI()
{
    return PROOT . '/layouts';
}

function getPlayerURI($p)
{
    $p = ROOT."/players/{$p}";
    if(file_exists($p))
    {
        return $p;
    }
}