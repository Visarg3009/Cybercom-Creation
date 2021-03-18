<?php
namespace Block\Admin\Admin\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');

class Form extends \Block\Core\Edit
{
    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/admin/edit/tabs/form.php');
    }

    public function getTitle()
    {
        return 'Admin Add/Edit';
    }
}
?>