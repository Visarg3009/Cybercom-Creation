<?php
namespace Block\Customer\Cart;

class Grid extends \Block\Core\Template
{
    protected $cart = null;
    protected $product = null;

    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/customer/cart/grid.php');
    }

    public function setCart(\Model\Cart $cart)
    {
        $this->cart = $cart;
        return $this;
    }

    public function getCart()
    {
        if (!$this->cart) {
            throw new \Exception("Cart is not set");
        }
        return $this->cart;
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
}