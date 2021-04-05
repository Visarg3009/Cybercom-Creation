<?php
namespace Block\Core\Layout;
\Mage::loadFileByClassName('Block\Core\Layout');

class Left extends \Block\Core\Layout
{
    public function __CONSTRUCT()
    {
        $this->setTemplate('./View/core/layout/left.php');
    }
}
?>