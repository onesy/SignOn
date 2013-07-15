<?php
define('DEBUG', true);

error_reporting(E_ALL);

if(DEBUG){
    include 'config/config_debug.inc.php';
}
include 'config/config.inc.php';
// define the site name for whole site
/**
 * include the framework
 */
include PROJECT_ROOT . DIRECTORY_SEPARATOR
        . "frameworks" . DIRECTORY_SEPARATOR
        . "framework" . DIRECTORY_SEPARATOR . "CJFramework.php";
//echo PROJECT_ROOT;

$siteEngine = CJFramework_Site_Engine::Instance();

$siteEngine->setEngine($site_info);
$siteEngine->run($site_info);

//var_dump($_SERVER);
