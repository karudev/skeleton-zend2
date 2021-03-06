<?php

namespace Application\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;

class Db {
 public $config = array(
            'driver' => 'pdo_mysql',
            'database' => 'zend2',
            'username' => 'root',
            'password' => 'root',
            'host' => 'localhost'
        ); 
    public $adapter;
    
    /**
     * 
     * @return \Zend\Authentication\Adapter\AdapterInterface
     */
    public function __construct() {
       $this->adapter =  new Adapter($this->config);
       return $this->adapter;
    }
    public  function getTableGateway($table) {
       return new TableGateway($table,$this->adapter); 
    }
    public  function getPDO() {
       return new \PDO('mysql:dbname='.$this->config['database'].';host='.$this->config['host'],$this->config['username'],$this->config['password']);
    }
    public function getSql(){
        return new Sql($this->adapter);
    }
    /**
     * 
     * @return Adapter
     */
    public function getAdapter(){
       return $this->adapter; 
    }

}

?>
