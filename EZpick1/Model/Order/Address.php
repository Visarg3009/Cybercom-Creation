<?php
namespace Model\Order;

class Address extends \Model\Core\Table
{
    public function __construct()
    {
        $this->setTableName('order_address');
        $this->setPrimaryKey('orderAddressId');
    }
}