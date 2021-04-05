<?php
namespace Block\Seller;
\Mage::loadFileByClassName('Block\Core\Layout');

class Layout extends \Block\Core\Layout
{
	public function __CONSTRUCT()
	{
		parent::__CONSTRUCT();
		$this->setTemplate('.\View\seller\layout.php');
	}

	public function prepareChildren()
    {
        $this->addChild(\Mage::getBlock('Block\Seller\Layout\Header'), 'header');
        $this->addChild(\Mage::getBlock('Block\Seller\Layout\Footer'), 'footer');
        $this->addChild(\Mage::getBlock('Block\Seller\Layout\Content'), 'content');
        $this->addChild(\Mage::getBlock('Block\Seller\Layout\Message'), 'message');
        $this->addChild(\Mage::getBlock('Block\Seller\Layout\Left'), 'left');
        $this->addChild(\Mage::getBlock('Block\Seller\Layout\Right'), 'right');
        return $this;
    }
}

