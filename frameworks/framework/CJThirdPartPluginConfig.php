<?php
define('TESTY','Testy');

$thirdPartInverted = array('Testy' => TESTY);

$thirdPartPlugins = array(
    TESTY => array('Testy.class.php' => 'Testy'),//means path = ThirdPartPlugin_root/Redis/Redis.class.php
);

CJPluginLoader::$inverted_cfg = $thirdPartInverted;
CJPluginLoader::$cfg4loader = $thirdPartPlugins;
