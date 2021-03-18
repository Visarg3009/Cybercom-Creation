<?php
namespace Block\Admin\Shipment\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs 
{
    public function prepareTab()
    {
        parent::prepareTab();
        $this->addTab('shipment',['label' => 'Shipment Infromation','block' => 'Block\Admin\Shipment\Edit\Tabs\Form']);
    
        $this->setDefaultTab('shipment');
        return $this;
    }
}