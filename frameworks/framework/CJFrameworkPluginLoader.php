<?php

class CJPluginLoader {
    
    public static function CJThirdPartPluginRegister($plugin_name){
        include 'CJThirdPartPluginConfig.php';
        
    }
    
    public static function CFPagePluginRegister($page_plugin_name){
        include PAGE_PLUGIN_ROOT . DIRECTORY_SEPARATOR  . $page_plugin_name .'.plugin.php';
    }
    
}
