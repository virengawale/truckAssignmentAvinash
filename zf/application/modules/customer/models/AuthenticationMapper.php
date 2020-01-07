<?php

/**
 * Class Customer_Model_AuthenticationMapper
 */
class Customer_Model_AuthenticationMapper
{
    /**
     * @var null $adapter
     */
     private $adapter = null;

    /**
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function authenticate(string $username, string $password): bool
    {
        $this->adapter = new Zend_Auth_Adapter_DbTable(
            null,
            'customers',
            'username',
            'password'
            );
        
        $this->adapter->setIdentity($username);
        $this->adapter->setCredential($password);
            
        $auth   = Zend_Auth::getInstance();
        $result = $auth->authenticate($this->adapter);

        return $result->isValid();
    }

    /**
     * @return
     */
    public function getAuthCustomerId()
    {
        return $this->adapter->getResultRowObject();
    }
}
