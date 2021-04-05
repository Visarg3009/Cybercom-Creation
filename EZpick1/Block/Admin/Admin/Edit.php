<?php
namespace Block\Admin\Admin;

class Edit extends \Block\Core\Edit
{
    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTabClass(\Mage::getBlock('Block\Admin\Admin\Edit\Tabs'));
    }
}