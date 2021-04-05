<?php
namespace Block\Admin\Shipment;

class Edit extends \Block\Core\Edit
{
    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTabClass(\Mage::getBlock('Block\Admin\Shipment\Edit\Tabs'));
    }
}