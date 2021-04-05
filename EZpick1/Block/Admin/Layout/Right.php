<?php
namespace Block\Admin\Layout;
\Mage::loadFileByClassName('Block\Core\Layout');

class Right extends \Block\Core\Layout
{
    public function __CONSTRUCT()
    {
        $this->setTemplate('./View/admin/layout/right.php');  
    }
}