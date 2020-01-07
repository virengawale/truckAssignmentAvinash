<?php

/**
 * Class Truck_Service_Vehicle
 */
class Truck_Service_Vehicle
{
    /**
     * Select all vehicle
     * @return array
     */
    public function selectAllVehicle()
    {
        $truck_model_vehicle_mapper = new Truck_Model_VehicleMapper();

        return $truck_model_vehicle_mapper->selectAllVechicles();
    }

    /**
     * Insert.
     *
     * @param array $data
     * @return array
     */
   public function insert(array $data): array
    {
        if ([] === $data) {
            return [];
        }
        $vehicleMapper = new Truck_Model_VehicleMapper();
        return ['resposne' => $vehicleMapper->insert($data)];
    }

    /**
     * Get Available Vehicle
     * @return array
     * @throws Zend_Db_Exception
     * @throws Zend_Db_Statement_Exception
     */
    public function  getAvailableVehicle()
    {
        $truck_model_vehicle_mapper = new Truck_Model_VehicleMapper();

        return $truck_model_vehicle_mapper->selectAllAvailableVechicles();
    }
}

