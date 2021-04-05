<?php
namespace Block\Home\ProductDetail;

class RelatedProductPanel extends \Block\Core\Template
{
    protected $products = [];

    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/home/productDetail/relatedProductPanel.php');
    }

    public function getProducts()
    {
        $product = \Mage::getModel('Model\Product');
        $query = "SELECT product.*, product_media.image_name
        FROM product
        LEFT JOIN product_media ON product.product_id = product_media.product_id
        ORDER BY product.product_id;";
        $products =  $product->fetchAll($query);
        $this->products = $products;
        return $this->products;
    }
}