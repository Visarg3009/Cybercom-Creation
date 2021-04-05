<?php
namespace Block\Home\Index\Footer;
\Mage::loadFileByClassName('Block\Core\Template');

class FooterBottom extends \Block\Core\Template
{
    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/home/index/footer/footerBottom.php');
    }
}