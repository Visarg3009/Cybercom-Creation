<?php
namespace Model\Order;

class Item extends \Model\Core\Table
{
    protected $product = null;
    
    public function __construct()
    {
        $this->setTableName('order_item');
        $this->setPrimaryKey('orderItemId');
    }

    public function setProduct(\Model\Product $product = null)
    {
        $this->product = $product;
        return $this;
    }

    public function getProduct($productId = null)
    {
        $product = \Mage::getModel('Model\Product');
        $query = "SELECT * FROM {$product->getTableName()} WHERE `product_id` = '{$productId}';";
        $product->fetchRow($query);
        $this->setProduct($product);
        return $this->product;
    }
}