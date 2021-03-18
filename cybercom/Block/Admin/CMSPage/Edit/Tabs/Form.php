<?php
namespace Block\Admin\CMSPage\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');

class Form extends \Block\Core\Edit
{
    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/cmsPage/edit/tabs/form.php');
    }

    public function getTitle()
    {
        return 'CMS-PAGE Add/Edit';
    }
}
?>