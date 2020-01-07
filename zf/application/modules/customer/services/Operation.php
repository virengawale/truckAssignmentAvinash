<?php

class Customer_Service_Operation
{
    public function selectAllVehicle()
    {
        $obj = new Customer_Model_OperationMapper();

        return $obj->selectAllVechicles();
    }
}