<?php
abstract class CJFrameworkController{
    
    protected static $instance = null;
    
    protected static $view = null;
    
    private function __construct() {

        CJFrameworkController::$view = CJFrameworkWeb::Instance();
        
    }
    
    public static function Instance(){
        if(CJFrameworkController::$instance == null){
            CJFrameworkController::$instance = new static();
        }
        return CJFrameworkController::$instance;
    }
}

