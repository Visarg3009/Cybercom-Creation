<?php
namespace Model;

class Shipment extends \Model\Core\Table
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    function __CONSTRUCT()
    {
        $this->setTableName('shipping');
        $this->setPrimaryKey('method_Id');
    }

    public function getStatusOption()
    {
        return [
            self::STATUS_ENABLED => 'Enable',
            self::STATUS_DISABLED => 'Disable',
        ];
    }
}