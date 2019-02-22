<?php

define('DS', '/');
define('ROOT', '../');
define('VIEWS_PATH', ROOT.DS.'Views');
require_once ROOT.DS.'libs/init.php';
$uri = $_GET['uri'];
//$router = new Router($uri);
App::run($uri);
