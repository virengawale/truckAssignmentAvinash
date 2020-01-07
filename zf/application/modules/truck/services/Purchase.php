<?php

/**
 * Class Truck_Service_Purchase
 */
class Truck_Service_Purchase
{
    private $truck_model_purchase_mapper = null;

    protected function getTruckModelPurchaseMapper()
    {
        if (isset($this->truck_model_purchase_mapper)) {
             new Truck_Model_PurchaseMapper();
        }
    }

    /**
     * Select All Purchase Records
     * @return array
     */
    public function selectAllPurchase(): array
    {
        $truck_model_purchase_mapper = 
            new Truck_Model_PurchaseMapper();
        
        return $truck_model_purchase_mapper->selectAllPurchase();
    }

    /**
     * @return array
     */
    public function selectAllPO(): array
    {
        $truck_model_purchase_mapper =
            new Truck_Model_PurchaseMapper();

        return $truck_model_purchase_mapper->selectAllPO();
    }

    /**
     * Add Vehicle In Purchase Order
     * @param int $vehicleId
     */
    public function addInPo(int $vehicleId)
    {
        $truck_model_purchase_mapper =
            new Truck_Model_PurchaseMapper();

        $truck_model_purchase_mapper->setVehicleId($vehicleId);
        $truck_model_purchase_mapper->updateVehicleStatus();
        $truck_model_purchase_mapper->insertInToPO();
    }
}

