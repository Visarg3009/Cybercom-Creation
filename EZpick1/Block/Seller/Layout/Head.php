<?php
namespace Block\Seller\Layout;
\Mage::loadFileByClassName('Block\Core\Template');

class Head extends \Block\Core\Template
{
    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/seller/layout/head.php');  
    }
}