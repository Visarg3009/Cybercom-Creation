<?php
namespace Block\Admin\Attribute\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');

class Form extends \Block\Core\Edit
{
    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/attribute/edit/tabs/form.php');
    }

    public function getTitle()
    {
        return 'Attribute Add/Edit';
    }
}
?>