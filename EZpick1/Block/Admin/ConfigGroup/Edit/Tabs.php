<?php
namespace Block\Admin\ConfigGroup\Edit;

class Tabs extends \Block\Core\Edit\Tabs 
{
    public function prepareTab()
    {
        parent::prepareTab();
        $this->addTab('configGroup',['label' => 'ConfigGroup Infromation','block' => 'Block\Admin\ConfigGroup\Edit\Tabs\Form']);
        if ($this->getRequest()->getGet('id')) {
            $this->addTab('Config',['label' => 'Config','block' => 'Block\Admin\ConfigGroup\Edit\Tabs\Configuration']);
        }

        $this->setDefaultTab('configGroup');
        return $this;
    }
}