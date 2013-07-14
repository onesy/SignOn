<?php

class CJFrameworkCollection {
    
    protected static $instance = null;
    
    protected static $db = null;
    
    private function __construct() {
        CJFrameworkCollection::$db = CJFrameworkDB::Instance();
    }
    
    private function __clone() {
        ;
    }
    
    public static function instance(){
        if(CJFrameworkCollection::$instance == null){
            CJFrameworkCollection::$instance = new static();
        }
        return CJFrameworkCollection::$instance;
    }
}
