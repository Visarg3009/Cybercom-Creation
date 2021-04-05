<?php
namespace Block\Customer\Layout;
\Mage::loadFileByClassName('Block\Core\Layout');

class Left extends \Block\Core\Layout
{
    public function __CONSTRUCT()
    {
        $this->setTemplate('./View/customer/layout/left.php');
    }
}
?>