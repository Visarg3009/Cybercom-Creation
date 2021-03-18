<?php
namespace Block\Admin\CustomerGroup\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');

class Form extends \Block\Core\Edit
{
    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/customerGroup/edit/tabs/form.php');
    }

    public function getTitle()
    {
        return 'CustomerGroup Add/Edit';
    }
}