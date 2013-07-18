<?php

class Controller_shengz extends Controller_Base{
    public function action_shengz(){
        parent::setParams('name', 'ShengZl');
    }
    public function action_cosji(){
        parent::setParams('name', 'ShengZ');
        parent::setParams('action', 'earn money');
    }
}
