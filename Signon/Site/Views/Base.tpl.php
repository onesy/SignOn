<?php

class View_Base extends CJFrameworkWeb{
    
    public static function GetStore() {
        parent::RelaceStore(Controller_Base::getStore());
        return parent::GetStore();
    }
}
