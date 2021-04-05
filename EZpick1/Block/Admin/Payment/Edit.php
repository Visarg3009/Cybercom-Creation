<?php
namespace Block\Admin\Payment;

class Edit extends \Block\Core\Edit
{
    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTabClass(\Mage::getBlock('Block\Admin\Payment\Edit\Tabs'));
    }
}
