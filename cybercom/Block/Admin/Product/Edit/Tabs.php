<?php
namespace Block\Admin\Product\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs 
{
    public function prepareTab()
    {
        parent::prepareTab();
        $this->addTab('product',['label' => 'Product Infromation','block' => 'Block\Admin\Product\Edit\Tabs\Form']);
        if ($this->getRequest()->getGet('id')) {
            $this->addTab('media',['label' => 'Media','block' => 'Block\Admin\Product\Edit\Tabs\Media']);
            $this->addTab('groupPrice',['label' => 'Group-Price','block' => 'Block\Admin\Product\Edit\Tabs\GroupPrice']);
            $this->addTab('AttributeOption',['label' => 'Attribute-Option','block' => 'Block\Admin\Product\Edit\Tabs\AttributeOption']);
        }
        $this->setDefaultTab('product');
        return $this;
    }
}
?>