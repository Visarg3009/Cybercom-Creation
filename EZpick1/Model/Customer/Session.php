<?php
namespace Model\Customer;
\Mage::loadFileByClassName('Model\Core\Session');

class Session extends \Model\Core\Session
{
    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setNameSpace('Customer');
    }
}
?>