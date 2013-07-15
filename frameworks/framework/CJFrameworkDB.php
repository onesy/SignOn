<?php

final class CJFrameworkDB {

    /**
     * single instance
     * @var type 
     */
    static private $_instance = null;
    
    static private $master = null;
    
    static private $slave = null;
    
    static private $server_cfg = null;
    
    private $masterOrSlave = -1;
    
    private $sqlArray = array();
    
    private $sql = '';

    public static function setServer_cfg($server_cfg){
        self::$server_cfg = $server_cfg;
    }
    
    private function __construct() {
        self::$master = new PDO(
                MYSQL . ":host=" . self::$server_cfg['database']['master']['host'] 
                . ";port=" . self::$server_cfg['database']['master']['port'] 
                . ";dbname=" . self::$server_cfg['database']['master']['db'] . ";"
                , self::$server_cfg['database']['master']['username']
                , self::$server_cfg['database']['master']['password'], array(
            PDO::ATTR_PERSISTENT => true,
        ));
        self::$slave = new PDO(
                MYSQL . ":host=" . self::$server_cfg['database']['slave']['host'] 
                . ";port=" . self::$server_cfg['database']['master']['port'] 
                . ";dbname=" . self::$server_cfg['database']['master']['db'] . ";"
                , self::$server_cfg['database']['master']['username']
                , self::$server_cfg['database']['master']['password'], array(
            PDO::ATTR_PERSISTENT => true,
        ));
        if(!self::$master){
            throw new Exception('master connection failed!');
        }
        if(!self::$slave){
            throw new Exception('slave connetion failed!');
        }
    }

    private function __clone() {
        ;
    }

    static public function Instance() {
        if (is_null(self::$_instance) || !isset(self::$_instance)) {
            self::$_instance = new CJFrameworkDB();
        }
        return self::$_instance;
    }

    public function master() {
        $this->masterOrSlave = 0;
        return self::Instance();
    }
    
    public function slave(){
        $this->masterOrSlave = 1;
        return self::Instance();
    }
    
    /**
     * receive the sql
     * @param type $params
     */
    public function __call($name, $arguments) {
        if($name != 'Query'||$name != 'SimpleQuery'){
            $this->sqlArray[] = array('order' => $name,'params' => $arguments);
            return self::Instance();
        } else {
            return $this->$name($arguments);
        }
    }
    
    /**
     * 
     * @param type $sql
     * @return null
     */
    public function exec($sql){
        $dbConn = null;
        if(is_null($sql) || $this->masterOrSlave == -1){
           return null; 
        }
        if($this->masterOrSlave == 0)
        {
            $dbConn = self::$master;
        }
        else {
            $dbConn = self::$slave;
        }
        $result = $dbConn->exec($sql);
        
        return $result;
    }
    
    public function query($sql){
        $dbConn = null;
        if(is_null($sql) || $this->masterOrSlave == -1){
           return null; 
        }
        if($this->masterOrSlave == 0)
        {
            $dbConn = self::$master;
        }
        else {
            $dbConn = self::$slave;
        }
        $result = $dbConn->query($sql);
        $rows = $result->fetch();
        return $rows;
    }
    
    /**
     * TODO this method is not complate now
     * @param type $arguments
     */
    public function SimpleQuery($arguments){
        
    }

}

