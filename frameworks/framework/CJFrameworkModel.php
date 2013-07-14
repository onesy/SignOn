<?php

class CJFrameworkModel {
    
    protected static $instance = null;
    
    protected static $db = null;
    
    private function __construct() {
        CJFrameworkModel::$db = CJFrameworkDB::Instance();
    }
    
    private function __clone() {
        ;
    }
    
    public static function instance(){
        if(CJFrameworkModel::$instance == null){
            CJFrameworkModel::$instance = new static();
        }
        return CJFrameworkModel::$instance;
    }
}
