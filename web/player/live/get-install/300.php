<?php

if(!file_exists("framework/config.php")){
  header("Location: get-install");
  exit;
}

require_once(__DIR__.'/framework/config.php');

$app->run();
?>