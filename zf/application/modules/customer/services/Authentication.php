<?php

/**
 * Class Customer_Service_Authentication
 */
class Customer_Service_Authentication
{
    /**
     * @var string $username;
     */
    private $username;

    /**
     * @var string $password
     */
    private $password;

    /**
     * login service
     * @return bool
     */
    public function login(): bool
    {
        $customer_model_authentication_mapper = new Customer_Model_AuthenticationMapper();
        $validation_status = $customer_model_authentication_mapper->authenticate($this->username, $this->password);
        if ($validation_status) {
            $customer_result = $customer_model_authentication_mapper->getAuthCustomerId();
            $customer_id = $customer_result->id;
            $customer_full_name = $customer_result->fullname;

            $customer_model_userright_mapper = new Customer_Model_UserrightMapper();
            $customer_right_result = $customer_model_userright_mapper->selectCustomerRights($customer_id);
            self::setAccessRightsSession($customer_right_result);
            self::setFullNameSession($customer_full_name);

           return true;
        }

        return false;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @param $customer_right_result
     * @throws Zend_Session_Exception
     */
    public function setAccessRightsSession($customer_right_result)
    {
        $accessrights = new Zend_Session_Namespace('accessrights');

        foreach ($customer_right_result as $result) {
            $feature = $result['features'];
            $accessibility = $result['accessibility_level'];

            $accessrights->$feature = $accessibility;
        }
    }

    /**
     * Add Customer Name In Session
     * @param string $customer_full_name
     */
    public function setFullNameSession(string $customer_full_name)
    {
        $session = new Zend_Session_Namespace('fullname');
        $session->fullname = $customer_full_name;

        $loggedin = new Zend_Session_Namespace('loggedin');
        $loggedin->status = 1;
    }
}
