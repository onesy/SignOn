<?php

class Controller_login extends Controller_Base{
    
    public function action_step1(){
        /**
         * 欢迎来到cosji~~~
         */
    }
    
    public function action_step2(){
        
        $username = CJReqResP::CJGetPostVar('username');
        $passwd = CJReqResP::CJGetPostVar('passwd');
        parent::setParams('username', $username);
        parent::setParams('passwd', $passwd);
        $instance = Module_login::Instance();
        parent::setParams('is_allow', $instance->isUserLoginAllowed($username,$passwd));

    }
}
