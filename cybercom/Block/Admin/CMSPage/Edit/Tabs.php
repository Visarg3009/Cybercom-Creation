<?php
namespace Block\Admin\CMSPage\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs 
{
    public function prepareTab()
    {
        parent::prepareTab();
        $this->addTab('cmsPage',['label' => 'CMSPage Infromation','block' => 'Block\Admin\CMSPage\Edit\Tabs\Form']);

        $this->setDefaultTab('cmsPage');
        return $this;
    }
}
?>