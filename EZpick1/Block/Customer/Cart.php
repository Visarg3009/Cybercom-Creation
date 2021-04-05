<?php
namespace Block\Customer;

class Cart extends \Block\Core\Template
{
    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/customer/cart.php');
    }
}