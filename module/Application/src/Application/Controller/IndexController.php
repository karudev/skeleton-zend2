<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
//use Zend\View\Model\ViewModel;
use Application\Model\Db;

class IndexController extends AbstractActionController {

    public function indexAction() {
        $db = new Db();
        //$data = $db->getTableGateway('contact')->select();
        //$data = $db->getPDO()->query('select * from contact')->fetchAll();
        $sql = $db->getSql();
        $select = $sql->select('contact');
        //$data = $sql->prepareStatementForSqlObject($select)->execute();
        // $data = $sql->getSqlStringForSqlObject($select);
        $data = $db->getAdapter()->query('select * from contact')->execute();
        print_r($data); die();
        return array('data' => $data);
    }

}
