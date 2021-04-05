<?php
namespace Block\Home\Category;

class ProductList extends \Block\Core\Template
{
    protected $products = [];

    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/home/category/productList.php');
    }

    public function getProducts()
    {
        $id = $this->getRequest()->getGet('id');
        $query = "SELECT `product`.*,`product_media`.`image_name` FROM `product`
        LEFT JOIN `category` ON `product`.`category_Id` = `category`.`category_Id`
        LEFT JOIN `product_media` ON `product`.`product_id` = `product_media`.`product_id`
        WHERE `product`.`category_Id` = '{$id}'";
        $products = \Mage::getModel('Model\Product')->fetchAll($query);
        $this->products = $products;
        return $this->products;
    }
}