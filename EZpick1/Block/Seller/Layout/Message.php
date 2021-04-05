<?php
namespace Block\Seller\Layout; 
\Mage::loadFileByClassName('Block\Core\Template');

class Message extends \Block\Core\Template 
{
    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/seller/layout/message.php');
    }
}