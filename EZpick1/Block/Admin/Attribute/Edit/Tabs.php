<?php
namespace Block\Admin\Attribute\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs 
{
    public function prepareTab()
    {
        parent::prepareTab();
        $this->addTab('attribute',['label' => 'attribute Infromation','block' => 'Block\Admin\Attribute\Edit\Tabs\Form']);
        if ($this->getRequest()->getGet('id')) {
            $this->addTab('attributeOption',['label' => 'attribute Option','block' => 'Block\Admin\Attribute\Edit\Tabs\Option']);
        }

        $this->setDefaultTab('attribute');
        return $this;
    }
}
?>