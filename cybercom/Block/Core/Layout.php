<?php
namespace Block\Core;
\Mage::loadFileByClassName('Block\Core\Template');

class Layout extends Template{
    protected $context = [];

    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/core/layout/oneColumn.php');
        $this->prepareChildren();
    }

    public function prepareChildren()
    {
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Header'), 'header');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Footer'), 'footer');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Content'), 'content');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Message'), 'message');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Left'), 'left');
        $this->addChild(\Mage::getBlock('Block\Core\Layout\Right'), 'right');
        return $this;
    }
}
?>