<?php
namespace Controller;
\Mage::loadFileByClassName('Controller\Core\Customer');
/**
 * 
 */
class Home extends \Controller\Core\Customer
{
	public function indexAction()
    {
        $index = \Mage::getBlock('Block\Home\Index');
        $layout = $this->getLayout();
        $layout->addChild($index,'content');
        $this->toHtmlLayout();
    }
}