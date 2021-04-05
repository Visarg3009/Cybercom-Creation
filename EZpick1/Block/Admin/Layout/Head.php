<?php
namespace Block\Admin\Layout;
\Mage::loadFileByClassName('Block\Core\Template');

class Head extends \Block\Core\Template
{
    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/layout/head.php');  
    }
}