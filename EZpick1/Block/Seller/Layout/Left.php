<?php
namespace Block\Seller\Layout;
\Mage::loadFileByClassName('Block\Core\Layout');

class Left extends \Block\Core\Layout
{
    public function __CONSTRUCT()
    {
        $this->setTemplate('./View/seller/layout/left.php');
    }
}