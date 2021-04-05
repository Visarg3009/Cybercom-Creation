<?php
namespace Block\Admin\Category\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs 
{
    public function prepareTab()
    {
        parent::prepareTab();
        $this->addTab('category',['label' => 'Category Infromation','block' => 'Block\Admin\Category\Edit\Tabs\Form']);
        $this->addTab('media',['label' => 'Media','block' => 'Block\Admin\Category\Edit\Tabs\Media']);
        $this->setDefaultTab('category');
        return $this;
    }
}
?>