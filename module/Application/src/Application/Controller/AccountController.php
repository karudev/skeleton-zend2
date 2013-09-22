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

class AccountController extends AbstractActionController {

    public function addAction() {

        if ($this->getRequest()->getMethod() == "POST") {
            $error = null;
            $db = new Db();
            $post = (array) $this->getRequest()->getPost();

            $validator = new \Zend\Validator\StringLength(array('min' => 2, 'max' => 50));
            $validatorEmail = new \Zend\Validator\EmailAddress();

            //  var_dump( $validatorEmail->isValid($post['email'])); die('df');
            foreach ($post as $key => $value) {

                if (!$validator->isValid($value)) {
                    $error .='<p><b>' . $value . '</b> doit être supérieur à ' . $validator->getMin()
                            . ' et supérieur à ' . $validator->getMax() . '  caractères</p>';
                }

                if (!$validatorEmail->isValid($value) && $key == "email") {
                    $error .="<p>Email invalide</p>";
                }
            }

            if ($error == null)
                $db->getTableGateway('account')->insert($post);

            return array('error' => $error);
        }
    }

}
