<?php

//echo 'load CJFramework';
include 'CJFrameworkDB.php';
include 'CJFarmeworkWeb.php';
include 'CJFrameworkController.php';
include 'CJFrameworkModule.php';
include 'CJFrameworkModel.php';
include 'CJFrameworkCollection.php';

        const CTRLR_PREFIX = 'Controller_';
        const MODULE_PREFIX = 'Module_';
        const MODEL_PREFIX = 'Model_';
        const CLCT_PREFIX = 'Collection_';

function __autoload($classname) {
    /**
     * here make a rule that controller`s name like this Controller_classname
     * and the Controller`s file name like this classname.class.php
     * module`s class name is Module_classname filename = classname.class.php
     * model`s class name is Model_classname filename = classname.class.php
     * collection`s class name is Collection_classanme file name = classname.class.php
     */
    if (strpos($classname, CTRLR_PREFIX) === false) {
        $classRealName = str_replace(CTRLR_PREFIX, "", $classname);
        include_once APP_ROOT . DIRECTORY_SEPARATOR . "Controller" .
                DIRECTORY_SEPARATOR . $classRealName . '.class.php';
    } else if (strpos($classname, MODULE_PREFIX) === false) {
        $classRealName = str_replace(MODULE_PREFIX, "", $classname);
        include_once APP_ROOT . DIRECTORY_SEPARATOR . "Module" .
                DIRECTORY_SEPARATOR . $classRealName . '.class.php';
    } else if (strpos($classname, MODEL_PREFIX) === false) {
        $classRealName = str_replace(MODEL_PREFIX, "", $classname);
        include_once APP_ROOT . DIRECTORY_SEPARATOR . "Model" .
                DIRECTORY_SEPARATOR . $classRealName . '.class.php';
    } else if (strpos($classname, CLCT_PREFIX) === false) {
        $classRealName = str_replace(CLCT_PREFIX, "", $classname);
        include_once APP_ROOT . DIRECTORY_SEPARATOR . "Collection" .
                DIRECTORY_SEPARATOR . $classRealName . '.class.php';
    }
}