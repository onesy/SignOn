<?php
/**
 * process the $_SERVER site info
 * 
 */
//echo ' this is  CJFrameworkWeb.php<br/>';
class CJFrameworkWeb{
    
    private static $instance = null;

    protected $WebVarStore = array();
    
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
}