<?php
namespace Block\Admin\Payment\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');

class Form extends \Block\Core\Edit
{
    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/payment/edit/tabs/form.php');
    }

    public function getTitle()
    {
        return 'Payment Add/Edit';
    }
}
?>