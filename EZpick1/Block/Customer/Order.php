<?php
namespace Block\Customer;

class Order extends \Block\Core\Template
{
    protected $order = null;
    protected $orderItems = [];
    protected $orderAddresses = [];

    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/customer/order.php');
    }

    public function getOrder()
    {
        if (!$this->order) {
            $this->setOrder();
        }
        return $this->order;
    }

    public function setOrder()
    {
        $cartId = $this->getRequest()->getGet('id');
        $query = "SELECT * FROM `order` WHERE `cartId` = '{$cartId}';";
        $order = \Mage::getModel('Model\Order');
        $order = $order->fetchRow($query);
        $this->order = $order;
        return $this;
    }

    public function getProduct($id = null)
    {
        $product = \Mage::getModel('Model\Product');
        $query = "SELECT `product`.*,`product_media`.`image_name` FROM `product` 
        LEFT JOIN `product_media` ON `product`.`product_id` = `product_media`.`product_id`
        WHERE `product`.`product_id` = '{$id}'";
        $product->fetchRow($query);
        $this->product = $product;
        return $this->product;
    }

    public function getItems($id = null)
    {
        $orderItem = \Mage::getModel('Model\Order\Item');
        $query = "SELECT * FROM `order_item` WHERE `orderId` = '{$id}';";
        $orderItems = $orderItem->fetchAll($query);
        $this->orderItems = $orderItems;
        return $this->orderItems;
    }

    public function getAddresses($id = null)
    {
        $orderAddress = \Mage::getModel('Model\Order\Address');
        $query = "SELECT * FROM `order_address` WHERE `orderId` = '{$id}';";
        $orderAddresses = $orderAddress->fetchAll($query);
        $this->orderAddresses = $orderAddresses;
        return $this->orderAddresses;
    }
}