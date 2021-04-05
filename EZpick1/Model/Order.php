<?php
namespace Model;

class Order extends Core\Table
{
    protected $items = null;

    public function __construct()
    {
        $this->setTableName('order');
        $this->setPrimaryKey('orderId');
    }

    public function setOrderItems(\Model\Order\Item\Collection $items)
    {
        $this->items = $items;
        return $this;
    }

    public function getOrderItems()
    {
        if ($this->items) {
            return $this->items;
        }
        if (!$this->orderId) {
            return false;
        }
        $query = "SELECT * FROM order_item WHERE `orderId` = '{$this->orderId}';";
        $items = \Mage::getModel('Model\Order\Item')->fetchAll($query);
        if($items) {
            $this->setOrderItems($items);
        }
        return $this->items;
    }

    public function setBillingAddress()
    {
        
    }
}