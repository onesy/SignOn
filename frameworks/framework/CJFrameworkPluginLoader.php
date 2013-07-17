<?php

define('PIC_SUFFIX', 'png|PNG|gif|GIF|jpg|JPG|jpeg|JPEG|bmp|BMP');
define('CSS_SUFFIX', 'css');
define('JS_SUFFIX', 'js');

define('PIC', 'Pic');
define('CSS', 'Css');
define('JS','Js');

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
    
    /**
     * load the defined third part plugin
     */
    public static function CJThirdPartPluginLoad($classname){
        $invertedName = '';
        if($invertedName = self::$inverted_cfg[$classname]){
            foreach (self::$cfg4loader[$invertedName] as $key => $value) {
                include THIRD_PART_ROOT . DIRECTORY_SEPARATOR .$value . DIRECTORY_SEPARATOR . $key;
            }
        }
        
    }
    
    /**
     * load the defined page plugin
     * @param type $page_plugin_name
     */
    public static function CJPagePluginLoad($page_plugin_name){
        include PAGE_PLUGIN_ROOT . DIRECTORY_SEPARATOR  . $page_plugin_name .'.plugin.php';
    }
    
    /**
     * load resource files
     * @param type $file_name
     */
    public static function CJResourceFile($file_name, $isOnCDN) {
        
        $mediaVar = explode(".", $file_name);
        
        $suffix = end($mediaVar);
        
        if($suffix == CSS_SUFFIX){
            return self::CJResourceFileOnCDN(CSS . DIRECTORY_SEPARATOR . $file_name, $isOnCDN);
        } elseif ($suffix == JS_SUFFIX) {
            return self::CJResourceFileOnCDN(JS . DIRECTORY_SEPARATOR . $file_name, $isOnCDN);
        } else {
            foreach (explode('|', PIC_SUFFIX) as $suffixx){
                //echo $suffixx . "------->" . $suffix;
                if($suffixx == $suffix){//if the suffix is equal to what we expect
                    return self::CJResourceFileOnCDN(PIC . DIRECTORY_SEPARATOR . $file_name, $isOnCDN);
                }
            }
        }  
    }
    
    /**
     * @todo this method is just a interface, CDN address functin is still empty!
     * @param type $LocalPath
     */
    public static function CJResourceFileOnCDN($step1Path, $isOnCDN){
        
        $relativeLocation = SITE_FULL_NAME . RESOURCES_ROOT . DIRECTORY_SEPARATOR . $step1Path;
        
        if($isOnCDN){
            /**
             * @todo unfinish
             * relative-cdn address is still not finish
             */
            return $relativeLocation;
        } else {
            /**
             * Pic is Not On CDN server
             */
            return $relativeLocation;//$relativeLocation;
        }
    }
    
}
