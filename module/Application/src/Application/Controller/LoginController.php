<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Model\AuthAdapter;
use Zend\Authentication\AuthenticationService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Validator\StringLength;

class LoginController extends AbstractActionController {

    public function indexAction() {
        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $post = $request->getPost();
            $retour = null;
            $validator = new StringLength(array('min' => 3, 'max' => 12));
            
            if (!$validator->isValid($post['login'])) {
                $retour =  '<p>Login incorret : '
                . $validator->value
                . '; its length is not between '
                . $validator->min
                . ' and '
                . $validator->max
                . "</p>";
            }
            
             if (!$validator->isValid($post['password'])) {
                $retour .=  '<p>Mot de passe incorret : '
                . $validator->value
                . '; its length is not between '
                . $validator->min
                . ' and '
                . $validator->max
                . "</p>";
            }


            return array('retour' => $retour);
            /* $identifiant = $post['login'];
              $mdp =  $post['password']; */
        }
    }

}
