<?php
/**
 * 
 */
class CJRegister {
    
    public static $store = array();
    
    public static function Set($name, $key){
        self::$store[$name] = $key;
    }
    
    public static function Get($name){
        if(array_key_exists($name, self::$store)){
            return self::$store[$name];
        }
        return null;
    }
}
/**
 * @author sunyuw <leentingOne@gmail.com>
 * 从请求中获得需要的请求，直接调用该类中的方法。
 */
class CJReqResP{
    
    public static function CJGetGetInt($name){
        if(!array_key_exists($name, $_GET))
            return false ;
        
        if(!is_numeric($_GET[$name])){
            return false;
        }
        return (int)$_GET[$name];
    }
    
    public static function CJGetGetVar($name){
        if(!array_key_exists($name, $_GET))
            return false;
        
        return $_GET[$name];
    }
    
    public static function CJGetPostInt($name){
        if(!array_key_exists($name, $_POST))
            return false;
        
        if(!is_numeric($_POST[$name])){
            return false;
        }
        
        return (int)$_POST[$name];
    }
    
    public static function CJGetPostVar($name){
        if(!array_key_exists($name, $_POST))
            return false;
        
        return $_POST[$name];
    }
    
    public static function CJGetCookieInt($name){
        if(!array_key_exists($name, $_COOKIE))
            return false;
        
        if(!is_numeric($_COOKIE[$name])){
            return false;
        }
        return (int)$_COOKIE[$name];
    }
    
    public static function CJGetCookieVar($name){
        if(!array_key_exists($name, $_COOKIE))
            return false;
        
        return $_COOKIE[$name];
    }
    
    /**
     * @author sunyuw <leentingOne@gmail.com>
     * 所有的cookie必须设置作用域，如果不设置就会报错
     * @param type $name
     * @param type $value
     * @param type $expire
     * @param type $path
     * @param type $domain
     * @throws Exception
     */
    public static function CJSetCookieVar($name, $value, $expire = 0, $path=null, $domain = DOMAIN){
        
        if($path == null)
            throw new Exception ('set cookie operation, null $expire is not allowed!');
        setcookie($name, $value, $expire, $path, $domain);
        
    }
    
    public static function CJSetSimpleCookieVar($name,$value){
        setcookie($name, $value);
    }
    
    /**
     * 不能传空
     * @author sunyuw <leentingOne@gmail.com>
     */
    public static function CJResponseAsJson($var){
        if($var){
            $json = json_encode($var);
            echo $json;
            ob_end_flush();
        }
        /**
         * @todo header尚未设置
         */
        echo 'json encode failed';
    }
    
}
