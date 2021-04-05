<?php
namespace Block\Admin\ConfigGroup;

class Edit extends \Block\Core\Edit
{
    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTabClass(\Mage::getBlock('Block\Admin\ConfigGroup\Edit\Tabs'));
    }
}