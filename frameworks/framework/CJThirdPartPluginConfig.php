<?php
define('REDIS','redis');

$thirdPartPlugins = array(
    REDIS => array('Redis.class.php' => 'Redis'),//means path = ThirdPartPlugin_root/Redis/Redis.class.php
);
CJPluginLoader::$cfg4loader = $thirdPartPlugins;
