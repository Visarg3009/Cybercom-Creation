<?php
namespace Block\Core\Layout;
\Mage::loadFileByClassName('Block\Core\Layout');

class Right extends \Block\Core\Layout
{
    public function __CONSTRUCT()
    {
        $this->setTemplate('./View/core/layout/right.php');  
    }
}
?>