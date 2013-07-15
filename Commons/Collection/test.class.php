<?php

class Collection_test extends Collection_Base{
    
    
    
    public function exec($sql){
        parent::$db->exec($sql);
    }
    
    public function query($sql){
        parent::$db->query($sql);
    }
    
}
