<?php

/**
 * include the ip location
 */
include 'IpList.inc.php';


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
define('SITE_NAME', 'signon.cosjidev.com');
// project root is the top of the program, SignonCosji folder
define('PROJECT_ROOT', dirname(dirname(dirname(__FILE__))));
// define APP root ,the APP_ROOT is the index where work.
define('APP_ROOT', dirname(dirname(__FILE__)));
//define database type
define('MYSQL', 'mysql');
define('MSSQL', 'mssql');
define('ORACLE', 'oracle');

// define the server variable
$server_cfg = array();
global $server_cfg;

