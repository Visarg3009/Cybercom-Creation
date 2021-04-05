<?php
namespace Controller;

class Category extends Core\Customer
{
    public function viewAction()
    {
        try {
            $category = \Mage::getBlock('Block\Home\Category');
            $layout = $this->getLayout();
            $layout->addChild($category,'content');
            $this->toHtmlLayout();
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
}