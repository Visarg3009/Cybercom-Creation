<?php
namespace Block\Seller\Layout;
\Mage::loadFileByClassName('Block\Core\Layout');

class Right extends \Block\Core\Layout
{
    public function __CONSTRUCT()
    {
        $this->setTemplate('./View/seller/layout/right.php');  
    }
}