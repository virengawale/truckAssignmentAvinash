<?php

class Customer_Model_UserrightMapper
{ 
    protected $_name = 'user_right';
    private $dbconn;

    private $params = [
        'host'     => '127.0.0.1',
        'username' => 'root',
        'password' => 'root',
        'dbname'   => 'zendApp'
    ]; 
 
    private function getDbConnection()
    {
        if (!$this->dbconn) {
            $this->dbconn = Zend_Db::factory('PDO_MYSQL', $this->params);
        }

        return $this->dbconn;
    }

    public function setDbConnection(Zend_Db $dbconn)
    {
        $this->dbconn = $dbconn;
       
    }

    public function selectCustomerRights($cid)
    {
        $select = $this->getDbConnection()->query("select 
                    features, accessibility_level from $this->_name 
                    where customer_id = '$cid'");

        return $select->fetchAll();   
    }
}
