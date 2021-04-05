<?php
namespace Block\Seller\Product;
\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{
    public function __CONSTRUCT()
    {
    	parent::__CONSTRUCT();
    	$this->setTabClass(\Mage::getBlock('Block\Seller\Product\Edit\Tabs'));
    }
}