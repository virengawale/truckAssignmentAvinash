<?php

class Truck_Model_VehicleMapper
{
    /**
     * @var string $_name
     */
    protected $_name = 'vehicle';

    /**
     * @var
     */
    private $dbconn;

    /**
     * @var array $params
     */
    private $params = [
        'host'     => '127.0.0.1',
        'username' => 'root',
        'password' => 'root',
        'dbname'   => 'zendApp'
    ];

    /**
     * @return Zend_Db_Adapter_Abstract
     * @throws Zend_Db_Exception
     */
    private function getDbConnection()
    {
        if (!$this->dbconn) {
            $this->dbconn = Zend_Db::factory('PDO_MYSQL', $this->params);
        }

        return $this->dbconn;
    }

    /**
     * @return array
     * @throws Zend_Db_Statement_Exception
     */
    public function selectAllVechicles()
    {
        $select = $this->getDbConnection()->query("select * from $this->_name");

        return $select->fetchAll();
    }

    /**
     * @return array
     * @throws Zend_Db_Exception
     * @throws Zend_Db_Statement_Exception
     */
    public function selectAllAvailableVechicles()
    {
        $select = $this->getDbConnection()->query("select id,brand,model from $this->_name where is_available=1;");

        return $select->fetchAll();
    }

    /**
     * Insert.
     *
     * @param $data
     * @return int
     * @throws Zend_Db_Exception
     */
    public function insert($data)
    {
        $dao = $this->getDbConnection();
        $data = [
            'brand' => $data['brand'] ?? '',
            'model' => $data['model'] ?? '',
            'reg_year' => $data['reg_year'] ?? '',
            'reg_number' => $data['reg_number'] ?? '',
            'price' => $data['price'] ?? '',
        ];
        try {
            return $dao->insert($this->_name, $data);
        } catch (Zend_Db_Adapter_Exception $e) {
            var_dump($e->getMessage());
        }
    }
}
