<?php

class Controller_index extends Controller_Base {
    
    public function action_index(){
        #$parent_instance = parent::instance();
        $page_echo = 'this is the index page for cosji.com';
        parent::setParams('say',$page_echo);
    }
    
    
}
