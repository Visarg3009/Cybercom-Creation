<?php
namespace Block\Admin\Shipment\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');

class Form extends \Block\Core\Edit
{
    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/shipment/edit/tabs/form.php');
    }

    public function getTitle()
    {
        return 'Shipment Add/Edit';
    }
}
?>