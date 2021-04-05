<?php
namespace Block\Seller\Product\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs 
{
    public function prepareTab()
    {
        parent::prepareTab();
        $this->addTab('product',['label' => 'Product Infromation','block' => 'Block\Seller\Product\Edit\Tabs\Form']);
        if ($this->getRequest()->getGet('id')) {
            $this->addTab('media',['label' => 'Media','block' => 'Block\Seller\Product\Edit\Tabs\Media']);
            $this->addTab('groupPrice',['label' => 'Group-Price','block' => 'Block\Seller\Product\Edit\Tabs\GroupPrice']);
            $this->addTab('AttributeOption',['label' => 'Attribute-Option','block' => 'Block\Seller\Product\Edit\Tabs\AttributeOption']);
        }
        $this->setDefaultTab('product');
        return $this;
    }
}
?>