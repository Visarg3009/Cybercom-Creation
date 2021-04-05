<?php
namespace Controller;

class ProductDetail extends Core\Customer
{
    public function viewAction()
    {
        try {
            $category = \Mage::getBlock('Block\Home\ProductDetail');
            $layout = $this->getLayout();
            $layout->addChild($category,'content');
            $this->toHtmlLayout();
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
}