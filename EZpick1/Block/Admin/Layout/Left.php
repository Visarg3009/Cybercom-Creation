<?php
namespace Block\Admin\Layout;
\Mage::loadFileByClassName('Block\Core\Layout');

class Left extends \Block\Core\Layout
{
    public function __CONSTRUCT()
    {
        $this->setTemplate('./View/admin/layout/left.php');
    }
}