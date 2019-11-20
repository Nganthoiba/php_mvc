<?php
/*** Path Configurations ***/
define('DS', '/');
define('ROOT', '../');
define('VIEWS_PATH', ROOT.DS.'Views');

/*******************************/

require_once ROOT.DS.'libs/init.php';
//starting session securely
startSecureSession();
date_default_timezone_set(Config::get('default_time_zone'));

//$uri = trim($_SERVER['REQUEST_URI'], '/');
$uri = filter('uri', "GET");

try{
    App::run($uri);
}catch(Exception $e){
    echo $e->getMessage();
}
 
