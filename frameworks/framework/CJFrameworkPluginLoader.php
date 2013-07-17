<?php

class CJPluginLoader {
    
    /**
     * inverted configure ,it is the cfg dictonary of key words
     * @var type 
     */
    public static $inverted_cfg = null;
    
    /**
     *
     * @var type 
     */
    public static $cfg4loader = null;
    
    public static function CJThirdPartPluginRegister($classname){
        $invertedName = '';
        if($invertedName = self::$inverted_cfg[$classname]){
            foreach (self::$cfg4loader[$invertedName] as $key => $value) {
                include THIRD_PART_ROOT . DIRECTORY_SEPARATOR . $key;
            }
        }
        
    }
    
    public static function CFPagePluginRegister($page_plugin_name){
        include PAGE_PLUGIN_ROOT . DIRECTORY_SEPARATOR  . $page_plugin_name .'.plugin.php';
    }
    
}
