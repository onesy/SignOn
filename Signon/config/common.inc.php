<?php

/**
 * include the ip location
 */
include 'IpList.inc.php';


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
define('SITE_PROTOCAL_PREFIX', 'http://');
define('DOMAIN','cosjidev.com');
define('SITE_NAME', 'signon.'.DOMAIN);
define('SITE_FULL_NAME',SITE_PROTOCAL_PREFIX . SITE_NAME);
// project root is the top of the program, SignonCosji folder
define('PROJECT_ROOT', dirname(dirname(dirname(__FILE__))));
// define APP root ,the APP_ROOT is the index where work.
define('APP_ROOT', dirname(dirname(__FILE__)));
define('COMMONS_ROOT', PROJECT_ROOT . DIRECTORY_SEPARATOR . 'Commons');
define('FRAMEWORK_ROOT', PROJECT_ROOT . DIRECTORY_SEPARATOR . 'frameworks' . DIRECTORY_SEPARATOR . 'framework');
define('THIRD_PART_ROOT', FRAMEWORK_ROOT . DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR . 'ThirdPartPlugin');
define('VIEWS_ROOT', APP_ROOT . DIRECTORY_SEPARATOR . 'Site' . DIRECTORY_SEPARATOR . 'Views');
define('PAGE_PLUGIN_ROOT',APP_ROOT . DIRECTORY_SEPARATOR . 'Site' . DIRECTORY_SEPARATOR . 'Plugins');
define('RESOURCES_ROOT', '/Site/Resources');
//define database type
define('MYSQL', 'mysql');
define('MSSQL', 'mssql');
define('ORACLE', 'oracle');

// define the server variable
$server_cfg = array();
global $server_cfg;

/**
 * third part plugin and class define locate here
 */