<?php
namespace Block\Home\ProductDetail;

class ProductDetailPanel extends \Block\Core\Template
{
    protected $product = null;

    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/home/productDetail/productDetailPanel.php');
    }

    public function getProductDetail($id)
    {
        $product = \Mage::getModel('Model\Product');
        $query = "SELECT * FROM `product` 
        LEFT JOIN `product_media` ON `product`.`product_id` = `product_media`.`product_id`
        WHERE `product`.`product_id` = '{$id}'";
        $product->fetchRow($query);
        $this->product = $product;
        return $this->product;
    }
}