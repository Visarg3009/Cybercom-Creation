<?php
namespace Block\Core\Layout; 
\Mage::loadFileByClassName('Block\Core\Template');

class Message extends \Block\Core\Template 
{
    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/core/layout/message.php');
    }
}
?>