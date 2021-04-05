<?php
namespace Model;

class Payment extends \Model\Core\Table
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    function __CONSTRUCT()
    {
        $this->setTableName('payment');
        $this->setPrimaryKey('method_Id');
    }

    public function getStatusOption()
    {
        return [
            self::STATUS_DISABLED => 'Disable',
            self::STATUS_ENABLED => 'Enable',
        ];
    }
}