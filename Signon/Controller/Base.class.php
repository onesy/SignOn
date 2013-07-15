<?php

abstract class Controller_Base extends CJFrameworkController{
    
    private static $store = array();
    
    public static function setParams($key, $value){
        self::$store[$key] = $value;
    }
    public static function getParams($key){
        return self::$store[$key];
    }
    public static function getStore(){
        return self::$store;
    }
    
}
