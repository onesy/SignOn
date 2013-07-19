<?php

class Module_login extends Module_Base{
    
    public function isUserLoginAllowed($username, $passwd){
        /**
         * 
         * 各种加解密
         */
        $instance = Model_login::instance();
        return $instance->isUserLoginAllowed($username, $passwd);
    }
    
}
