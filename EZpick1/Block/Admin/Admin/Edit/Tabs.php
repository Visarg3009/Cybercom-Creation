<?php
namespace Block\Admin\Admin\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs 
{
    public function prepareTab()
    {
        parent::prepareTab();
        $this->addTab('admin',['label' => 'Admin Infromation','block' => 'Block\Admin\Admin\Edit\Tabs\Form']);

        $this->setDefaultTab('admin');
        return $this;
    }
}