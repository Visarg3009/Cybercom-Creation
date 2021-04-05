<?php
namespace Model\Seller;
\Mage::loadFileByClassName('Model\Core\Session');

class Session extends \Model\Core\Session
{
    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setNameSpace('Seller');
    }
}