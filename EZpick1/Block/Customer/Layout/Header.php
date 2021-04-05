<?php
namespace Block\Customer\Layout;
\Mage::loadFileByClassName('Block\Core\Template');

class Header extends \Block\Core\Template
{
    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/customer/layout/header.php');  
    }
}
