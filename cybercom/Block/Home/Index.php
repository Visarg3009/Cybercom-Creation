<?php
namespace Block\Home;
\Mage::loadFileByClassName('Block\Core\Template');
/**
 * 
 */
class Index extends \Block\Core\Template
{
    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/home/index.php');
    }
}
