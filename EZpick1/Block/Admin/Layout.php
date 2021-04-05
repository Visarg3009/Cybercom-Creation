<?php
namespace Block\Admin;
\Mage::loadFileByClassName('Block\Core\Layout');

class Layout extends \Block\Core\Layout
{
	public function __CONSTRUCT()
	{
		parent::__CONSTRUCT();
		$this->setTemplate('.\View\admin\layout.php');
	}

	public function prepareChildren()
    {
        $this->addChild(\Mage::getBlock('Block\Admin\Layout\Header'), 'header');
        $this->addChild(\Mage::getBlock('Block\Admin\Layout\Footer'), 'footer');
        $this->addChild(\Mage::getBlock('Block\Admin\Layout\Content'), 'content');
        $this->addChild(\Mage::getBlock('Block\Admin\Layout\Message'), 'message');
        $this->addChild(\Mage::getBlock('Block\Admin\Layout\Left'), 'left');
        $this->addChild(\Mage::getBlock('Block\Admin\Layout\Right'), 'right');
        return $this;
    }
}