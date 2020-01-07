<?php

/**
 * Class Truck_VehicleController
 */
class Truck_VehicleController extends Zend_Controller_Action
{
    /**
     * List Vehicle Action
     */
    public function listAction()
    {
        $vehicleForm = new Truck_Form_Vehicle();
        if ($this->_request->isPost()) {
            $postData = $this->getRequest()->getParams();
            $isValid = $vehicleForm->isValid($postData);
            if ($isValid) {
                $truckService = new Truck_Service_Vehicle();
                $truckService->insert($postData);
            }
        }

        $this->view->vehicleForm = $vehicleForm;
    }

    /**
     * Response for AJAX call
     */
    public function vehiclesAction()
    {
        $truck_service_vehicle = new Truck_Service_Vehicle();
        $this->_helper->json(['data' => $truck_service_vehicle->selectAllVehicle()]);
    }

    /**
     * Display Available vehicles
     */
    public function availvehiclesAction()
    {
        // action body
        $truck_service_vehicle = new Truck_Service_Vehicle();
        $this->_helper->json(['data' => $truck_service_vehicle->getAvailableVehicle()]);
    }
}
