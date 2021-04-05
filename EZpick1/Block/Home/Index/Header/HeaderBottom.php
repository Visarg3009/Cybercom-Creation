<?php
namespace Block\Home\Index\Header;
\Mage::loadFileByClassName('Block\Core\Template');

class HeaderBottom extends \Block\Core\Template
{
    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/home/index/header/headerBottom.php');
    }
}