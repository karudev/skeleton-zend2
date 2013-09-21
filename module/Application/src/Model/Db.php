<?php

namespace Application\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;

class Db {
 public $config = array(
            'driver' => 'pdo_mysql',
            'database' => 'karudev',
            'username' => 'root',
            'password' => 'root',
            'host' => 'localhost'
        ); 
    public  function getTableGateway($table) {
       return new TableGateway($table,  $adapter = new Adapter($this->config));
    }
    public  function getPDO() {
       return new \PDO('mysql:dbname='.$this->config['database'].';host='.$this->config['host'],$this->config['username'],$this->config['password']);
    }

}

?>
