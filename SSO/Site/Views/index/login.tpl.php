<?php

class Controller_login extends Controller_Base{
    
    public function ajax_step1(){
        $json = json_encode(array('name' => 'onesy'));
        echo $json;
    }
}
