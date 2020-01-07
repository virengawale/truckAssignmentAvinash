<?php

class Truck_OrderController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function listAction()
    {
        $this->_helper->viewRenderer->renderBySpec('list', array('module' => 'truck', 'controller' => 'purchase'));
    }
}

