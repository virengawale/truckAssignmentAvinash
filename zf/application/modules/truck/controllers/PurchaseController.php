<?php

/**
 * Class Truck_PurchaseController
 */
class Truck_PurchaseController extends Zend_Controller_Action
{

    /**
     * List Purchase
     */
    public function listAction()
    {

    }

    /**
     * requested by AJAX Call
     */
    public function listpurchaseAction()
    {
        $truck_service_purchase = new Truck_Service_Purchase();
        $this->_helper->json(['data' => $truck_service_purchase->selectAllPurchase()]);
    }

    /**
     * List Purchase Order
     * @throws Zend_Form_Exception
     */
    public function listpoAction()
    {
       $truck_form_createpo = new Truck_Form_Createpo();

       if ($truck_form_createpo->isValid($_REQUEST)) {
           $truck_service_purchase = new Truck_Service_Purchase();
           $truck_service_purchase->addInPo($truck_form_createpo
                                    ->getValue('vehicle'));
       }
       $this->view->createpo = $truck_form_createpo;
    }

    /**
     * List Purchase order
     */
    public function listpurchaseorderAction()
    {
        $truck_service_purchase = new Truck_Service_Purchase();
        $this->_helper->json(['data' => $truck_service_purchase->selectAllPO()]);
    }
}

