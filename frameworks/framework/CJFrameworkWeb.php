<?php
/**
 * process the $_SERVER site info
 * 
 */
//echo ' this is  CJFrameworkWeb.php<br/>';
class CJFrameworkWeb{
    
    protected static $instance = null;

    protected static $WebVarStore = array();
    
    public function __set($name, $value) {
        if($name == null)
            throw new Exception('params invalid');
        $this->WebVarStore[$name] = $value;
    }
    
    public function __get($name) {
        if($name == null)
            throw new Exception('params invalid');
        return $this->WebVarStore[$name];
    }
    
    public static function RelaceStore($store)
    {
        if(!is_array($store)){
            return ;
        }
        self::$WebVarStore = $store;
    }
    
    public static function AppendStore($store){
        if(!is_array($store)){
            return ;
        }
        self::$WebVarStore = array_merge(self::$WebVarStore, $store);
    }
    
    public static function GetStore(){
        return self::$WebVarStore;
    }
    
    private function __construct() {
        ;
    }
    
    private function __clone() {
        ;
    }
    
    public static function Instance(){
        if(self::$instance == null){
            self::$instance = new static();
        }
        return self::$instance;
    }
    
    public function Rendering(){
        /**
         * page rendering
         */
    }
}