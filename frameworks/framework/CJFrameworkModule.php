<?php

class CJFrameworkModule{
    
    protected static $instance = null;
    
    protected static $view = null;
    
    protected static $db = null;


    private function __construct() {
        CJFrameworkModule::$db = CJFrameworkDB::Instance();
        CJFrameworkModule::$view = CJFrameworkWeb::Instance();
    }
    
    private function __clone() {
        ;
    }
    
    public static function Instance(){
        if(CJFrameworkModule::$instance == null){
            CJFrameworkModule::$instance = new static();
        }
        return CJFrameworkModule::$instance;
    }
}