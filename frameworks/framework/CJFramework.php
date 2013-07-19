<?php

//echo 'load CJFramework';
include 'CJRegister.php';
include 'CJFrameworkDB.php';
include 'CJFrameworkWeb.php';
include 'CJFrameworkController.php';
include 'CJFrameworkModule.php';
include 'CJFrameworkModel.php';
include 'CJFrameworkCollection.php';
include 'CJFrameworkPluginLoader.php';
include 'CJThirdPartPluginConfig.php';


        /**
         * http header spell
         */
        const HTTP_TXT_HTML_UTF8_HEAD = 'Content-Type:text/html;charset=utf-8 ';
        const HTTP_APP_JSON_HEAD = 'Content-type: application/json';
        const HTTP_TXT_CSS_HEAD = 'Content-type: text/css';
        const HTTP_TXT_JS_HEAD = 'Content-type: text/javascript';
        const HTTP_TXT_PLAIN_HEAD = 'Content-type: text/plain';
        const HTTP_TXT_XML_HEAD = 'Content-type: text/xml';
        const HTPP_OK_HEAD = 'HTTP/1.1 200 OK';
        const HTTP_PAGE_NOT_FOUND = 'HTTP/1.1 404 Not Found';

        /**
         * tpl and page plugin file and suffix
         */
        const PAGE_SUFFIX = '.tpl.php';
        const PAGE_PLUGIN_SUFFIX = '.plugin.php';

        const ACTION_PREFFIX = 'action_';
        const AJAX_PREFFIX = 'ajax_';
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
    if (strpos($classname, CTRLR_PREFIX) !== false) {
        $classRealName = str_replace(CTRLR_PREFIX, "", $classname);
        include_once APP_ROOT . DIRECTORY_SEPARATOR . "Controller" .
                DIRECTORY_SEPARATOR . $classRealName . '.class.php';
    } else if (strpos($classname, MODULE_PREFIX) !== false) {
        $classRealName = str_replace(MODULE_PREFIX, "", $classname);
        include_once COMMONS_ROOT . DIRECTORY_SEPARATOR . "Module" .
                DIRECTORY_SEPARATOR . $classRealName . '.class.php';
    } else if (strpos($classname, MODEL_PREFIX) !== false) {
        $classRealName = str_replace(MODEL_PREFIX, "", $classname);
        include_once COMMONS_ROOT . DIRECTORY_SEPARATOR . "Model" .
                DIRECTORY_SEPARATOR . $classRealName . '.class.php';
    } else if (strpos($classname, CLCT_PREFIX) !== false) {
        $classRealName = str_replace(CLCT_PREFIX, "", $classname);
        include_once COMMONS_ROOT . DIRECTORY_SEPARATOR . "Collection" .
                DIRECTORY_SEPARATOR . $classRealName . '.class.php';
    }
    
    /**
     * third party plugin 
     */
    CJPluginLoader::CJThirdPartPluginLoad($classname);
}

/**
 * Analyze the server info 
 */
$site_info = array();
global $site_info;
/**
 * 如果_rp_不存在，那么就说明一个问题，这个请求很可能是直接请求的实体文件
 * 这样的请求应该被304回去
 */

if(!array_key_exists('_rp_', $_REQUEST)){
    header('HTTP/1.1 403 Forbidden');
    header("status: 403 Forbidden");
    exit;
}
/**
 * 存在_rp_参数的才是被nginx转发之后的请求
 */
$site_info['_rp_'] = str_replace(".html", "", $_REQUEST['_rp_']);
$site_info['REST'] = array(array_filter(explode("/", $site_info['_rp_'])));

$site_info['REQUEST_METHOD'] = $_SERVER['REQUEST_METHOD'];
$site_info['REMOTE_ADDR'] = $_SERVER['REMOTE_ADDR'];
$site_info['HTTP_HOST'] = $_SERVER['HTTP_HOST'];
//var_dump($site_info);

/**
 * this is the site engine class,the index.php file will instance this class
 * and invoke the method go,from now on the ob_start,and analyze the controller
 * ,then activation the controller
 */
class CJFramework_Site_Engine {

    protected static $siteEngine = null;
    
    protected static $siteParams = array();
    
    protected static $ViewName = '';
    
    public static $paramsPassenger = array();
    
    private static $site_info = null;

    private function __construct() {
        ;
    }

    private function __clone() {
        ;
    }

    public function __set($name, $value) {
        self::$siteParams[$name] = $value;
    }

    public function __get($name) {
        return self::$siteEngine[$name];
    }

    public static function Instance() {
        if (self::$siteEngine == null) {
            self::$siteEngine = new static();
        }
        return self::$siteEngine;
    }
    
    public static function setViewName($viewName = null){
        if($viewName == null){
            $viewName = $site_info['REST'][0][2];
        }
        self::$ViewName = $viewName;
    }

    /**
     * please do not use numeric key!
     * @param type $params
     * @return type
     */
    public static function setEngine($params) {
        if (!is_array($params) || empty($params))
            return;
        else {
            foreach ($params as $k => $v) {
                if (is_numeric($k))
                    continue;
                self::$siteEngine->$k = $v;
            }
        }
    }

    public function run($site_info) {
        
        /**
         * @todo 这个方法需要被重构
         */
        self::$site_info = $site_info;
        $origin_controller_name = null;
        if(!array_key_exists(1, $site_info['REST'][0])){
            $site_info['REST'][0][1] = false;
        }
        if(!array_key_exists(2, $site_info['REST'][0])){
            $site_info['REST'][0][2] =false;
        }
        $controller = self::getClassName($site_info['REST'][0][1], CTRLR_PREFIX);
        $action = self::getClassName($site_info['REST'][0][2], ACTION_PREFFIX);
        if((!$site_info['REST'][0][1] && !$site_info['REST'][0][2]) ||
                (! $site_info['REST'][0][2] && ($site_info['REST'][0][1] == 'index'))){
            $controller = self::getClassName('index', CTRLR_PREFIX);
            $action = self::getClassName('index', ACTION_PREFFIX);
            $origin_controller_name = 'index';
            self::setViewName('index');
        } elseif( ! array_key_exists($site_info['REST'][0][1] . '/' . $site_info['REST'][0][2], $site_info['rule_map'])) {
            
            header('HTTP/1.1 404 Not Found');
            header("status: 404 Not Found");
            return ;
        } else {
            /**
             * 既然找的到路径，那么原始的控制器名字也是很重要的，因为查找模板所在的文件夹还要使用原始控制器名字
             */
            $origin_controller_name = $site_info['REST'][0][1];
        }
        $action_preffixed = $action;
        if(array_key_exists('_ajax_', $_REQUEST) && $_REQUEST['_ajax_'] == 1){
            $action = str_replace(ACTION_PREFFIX , AJAX_PREFFIX, $action);
        }

        // from now on ,the echo and any print out will be store in buffer 
        ob_start();
        /**
         * invoke the controller and view are here
         */
        header('Location: ' . SITE_FULL_NAME . '/');
        header('HTTP/1.1 200 OK');
        header("status: 200 OK");
        header('Content-Type:text/html;charset=utf-8 ');
        $controller_instance = $controller::Instance();
        $controller_instance->$action();
        /**
         * TODO http request respon hearder is not slove.
         */
        
        /**
         * spelling the html page
         * 7月19凌晨，增加一层区分模板的文件夹，因为这里的
         * 
         */
        // include_once VIEWS_ROOT . DIRECTORY_SEPARATOR . self::getPageTplName(self::$ViewName);
        if($action_preffixed == $action){//如果ajax的前缀没有被替换则说明是普通的action请求
            include_once VIEWS_ROOT . DIRECTORY_SEPARATOR . $origin_controller_name . 
                    DIRECTORY_SEPARATOR . self::getPageTplName(self::$ViewName);
        }
        /**
         * flush content in buffer and close the buffer.
         */
        ob_end_flush();
    }

    public static function getClassName($ctrlr_name, $prefix = CTRLR_PREFIX) {
        return $prefix . $ctrlr_name;
    }
    
    public static function getPageTplName($page_name = null){
        if($page_name == null){
            $page_name = self::$site_info['REST'][0][2];
        }
        return $page_name . PAGE_SUFFIX;
    }
    
    public static function getPagePluginName($ctrlr_name){
        return $ctrlr_name . PAGE_PLUGIN_SUFFIX;
    }

}
