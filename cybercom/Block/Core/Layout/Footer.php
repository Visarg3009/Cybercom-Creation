<?php
namespace Block\Core\Layout;
\Mage::loadFileByClassName('Block\Core\Layout');

class Footer extends \Block\Core\Layout
{
    public function __CONSTRUCT()
    {
        $this->setTemplate('./View/core/layout/footer.php');  
    }
}
?>