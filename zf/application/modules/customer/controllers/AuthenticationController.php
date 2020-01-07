<?php

/**
 * Class Customer_AuthenticationController
 */
class Customer_AuthenticationController extends Zend_Controller_Action
{
    /**
     * user login action
     * @throws Zend_Form_Exception
     */
    public function loginAction()
    {
        $loginForm = new Customer_Form_Login();
        if ($loginForm->isValid($_POST)) {
            $authentication_login_service = new Customer_Service_Authentication();
            $username = $authentication_login_service
                        ->setUsername($loginForm->getValue('username'));
            $password = $authentication_login_service
                        ->setPassword($loginForm->getValue('password'));
    
            if ($authentication_login_service->login()) {
                $this->_redirect('/truck/vehicle/list');
            } else {
                $this->view->message = "Login Failed! Please Try Again";
            }
        }
        $this->view->loginForm = $loginForm;
    }

    /**
     * logout action and reset session
     */
    public function logoutAction()
    {
        // action body
        Zend_Session::destroy();
        $this->_redirect('/customer/authentication/login');
    }
}
