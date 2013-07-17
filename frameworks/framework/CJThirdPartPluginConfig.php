<?php
define('REDIS','redis');

$thirdPartInverted = array('Redis' => REDIS);

$thirdPartPlugins = array(
    REDIS => array('Redis.class.php' => 'Redis'),//means path = ThirdPartPlugin_root/Redis/Redis.class.php
);
CJPluginLoader::$inverted_cfg = $thirdPartInverted;
CJPluginLoader::$cfg4loader = $thirdPartPlugins;
