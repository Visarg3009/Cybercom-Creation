<?php
namespace Block\Customer\Layout;
\Mage::loadFileByClassName('Block\Core\Layout');

class Footer extends \Block\Core\Layout
{
    public function __CONSTRUCT()
    {
        $this->setTemplate('./View/customer/layout/footer.php');  
    }
}