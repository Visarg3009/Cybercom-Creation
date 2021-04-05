<?php
namespace Block\Seller\Layout;
\Mage::loadFileByClassName('Block\Core\Layout');

class Content extends \Block\Core\Layout
{
    public function __CONSTRUCT()
    {
        $this->setTemplate('./View/seller/layout/content.php');
    }
}