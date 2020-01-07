<?php

class Truck_Form_Createpo extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');
        $dropdownbox = $this->createElement('select', 'vehicle', [
            'label' => 'Brand :',
            'required' => 'true'
        ]);

        $dropdownbox->setRegisterInArrayValidator(false);

        $button = $this->createElement('submit', 'addVehicle', ['label' => 'Add Vehicle']);

        $elements = [
            $dropdownbox,
            $button
        ];

        $this->addElements($elements);
    }
}

