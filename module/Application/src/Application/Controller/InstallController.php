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

class InstallController extends AbstractActionController {

    public function indexAction() {

        $db = new Db();

        # Création de la table
        $sql ="CREATE DATABASE IF NOT EXISTS zend2;
               create table if not exists account (
               account_id int primary key AUTO_INCREMENT,
               login varchar(12),
               password varchar(255),
               firstname varchar(64) not null,
               lastname varchar(64) not null,
               email varchar(64),
               tel varchar(10)
               )";
        $db->getAdapter()->query($sql)->execute();
        die('ok');
    }

}
