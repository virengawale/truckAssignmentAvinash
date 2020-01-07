<?php
/**
 * located at customer/forms/Auth/Login.php
 * create login form attributes
 */
class Customer_Form_Login extends Zend_Form
{
    /**
     * @throws Zend_Form_Exception
     */
    public function init()
    {
        $this->setMethod('post');
 
       $username = $this->createElement(
            'text', 'username', array(
                'label' => 'Username:',
                'required' => true,
                'filters'    => array('StringTrim'),
            ));
 
        $password = $this->createElement('password', 'password', array(
            'label' => 'Password:',
            'required' => true,
            ));
 
        $submit = $this->createElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Login',
            ));

        $elements = [
            $username,
            $password,
            $submit
        ];
        $this->addElements($elements);
    }
}
