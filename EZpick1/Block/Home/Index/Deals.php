<?php
namespace Block\Home\Index;
\Mage::loadFileByClassName('Block\Core\Template');

class Deals extends \Block\Core\Template
{
    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/home/index/deals.php');
    }
}