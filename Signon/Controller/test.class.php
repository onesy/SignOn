<?php

class Controller_test extends Controller_Base {
    
    function action_test(){
        parent::setParams('name4boy', 'onesy');
        $instance = Collection_test::instance();
        $result = $instance->getDB()->master()->query('select * from test');
        parent::setParams('name4girl', $result['name']);
    }
}
