<?php

class Customer_Model_OperationMapper
{
    protected $_name = 'vehicle';
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

    public function selectAllVechicles()
    {
        $select = $this->getDbConnection()->query("select * from $this->_name");
        return $select->fetchAll();   
    }
}
