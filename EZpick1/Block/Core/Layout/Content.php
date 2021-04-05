<?php
namespace Block\Core\Layout;
\Mage::loadFileByClassName('Block\Core\Layout');

class Content extends \Block\Core\Layout
{
    public function __CONSTRUCT()
    {
        $this->setTemplate('./View/core/layout/content.php');
    }
}
?>