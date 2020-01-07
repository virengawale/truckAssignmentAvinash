<?php

/**
 * Class Truck_Model_PurchaseMapper
 */
class Truck_Model_PurchaseMapper
{
    /**
     * @var string $_name
     */
    protected $_name = 'purchase';

    /**
     * @var $dbconn
     */
    private $dbconn;

    /**
     * @var $vehicle_id
     */
    private $vehicle_id;

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
     * @param Zend_Db $dbconn
     */
    public function setDbConnection(Zend_Db $dbconn)
    {
        $this->dbconn = $dbconn;
    }

    /**
     * @return array
     * @throws Zend_Db_Statement_Exception
     */
    public function selectAllPurchase(): array
    {
       $select = $this->getDbConnection()->query("select
                                    a.brand,a.model,a.reg_number,
                                    a.price,b.contact_number 
                                    from vehicle as a 
                                    join purchase as b on 
                                    a.id=b.vehicle_id;");

        return $select->fetchAll();   
    }

    /**
     * @return array
     * @throws Zend_Db_Statement_Exception
     */
    public function selectAllPO(): array
    {
        //$select = $this->getDbConnection()->query("SELECT * FROM po_vehicle");
        $select = $this->getDbConnection()->query("select
                                    a.brand,a.model,a.reg_number,
                                    a.price
                                    from vehicle as a
                                    join po_vehicle as b on
                                    a.id=b.vehicle_id;");

        return $select->fetchAll();
    }

    /**
     * @param int $vehicleId
     */
   public function setVehicleId(int $vehicleId)
    {
        $this->vehicle_id = $vehicleId;
    }

    /**
     * @return int
     */
    public function getVehicleId(): int
    {
        return $this->vehicle_id;
    }

    /**
     * Update Vehicle Status
     */
    public function updateVehicleStatus()
    {
        $this->getDbConnection()->query("UPDATE vehicle set is_available=0 WHERE id='$this->vehicle_id';");
    }

    /**
     * @throws Zend_Db_Adapter_Exception
     */
    public function insertInToPO()
    {
        $data = ["vehicle_id"=>"$this->vehicle_id"];
        $this->getDbConnection()->insert('po_vehicle', $data);
    }
}
