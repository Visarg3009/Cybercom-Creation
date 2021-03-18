<?php
namespace Block\Customer\Layout;
\Mage::loadFileByClassName('Block\Core\Layout');

class Content extends \Block\Core\Layout
{
    public function __CONSTRUCT()
    {
        $this->setTemplate('./View/customer/layout/content.php');
    }
}
?>