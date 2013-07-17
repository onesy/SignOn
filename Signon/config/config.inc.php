<?php

/**
 * @author onesy <leentingOne@gmail.com>
 */
include 'common.inc.php';

/**
 * master db setting(write db)
 */
$server_cfg['database']['master'] = array(
    'type' => MYSQL,
    'username' => 'root',
    'password' => 'root',
    'port' => '3306',
    'db' => 'signon',
    'host' => '127.0.0.1',
);

/**
 * slave db setting(read db)
 */
$server_cfg['database']['slave'] = array(
    'type' => MYSQL,
    'username' => 'root',
    'password' => 'onesy6',
    'port' => '3306',
    'db' => 'signon',
    'host' => '127.0.0.1',
);

/**
 * redis server cfg
 */
$server_cfg['redis'] = array(
    array(
        'no' => 0,
        'host' => '127.0.0.1',
        'port' => '6379',
        'db' => '0'
    ),
);

/**
 * memcached server cfg
 */
$server_cfg['memcache'] = array(
    array(
        'host' => '127.0.0.1',
        'port' => '11211',
        'no' =>0
    )
);
