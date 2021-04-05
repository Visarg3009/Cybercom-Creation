<?php
namespace Block\Admin\ConfigGroup\Edit\Tabs;

class Form extends \Block\Core\Edit
{
    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/configGroup/edit/tabs/form.php');
    }

    public function getTitle()
    {
        return 'Config-Group Add/Edit';
    }
}