<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');
\Mage::getModel('Model\Core\Adapter');

class Admin extends \Model\Core\Table{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    function __CONSTRUCT()
    {
        $this->setTableName('admin');
        $this->setPrimaryKey('admin_Id');
    }

    public function getStatusOption()
    {
        return [
            self::STATUS_DISABLED => 'Disable',
            self::STATUS_ENABLED => 'Enable',
        ];
    }
}