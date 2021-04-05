<?php
namespace Block\Home\Index;
\Mage::loadFileByClassName('Block\Core\Template');

class Products extends \Block\Core\Template
{
    protected $query = null;
    public $data = [];

    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/home/index/products.php');
    }

    public function getProducts()
    {
        if (!$this->data) {
            $this->setProducts();
        }
       return $this->data;
    }

    public function setProducts()
    {
        $model = \Mage::getModel('Model\Product');
        $query = "SELECT product.*, product_media.image_name
        FROM product
        LEFT JOIN product_media ON product.product_id = product_media.product_id
        ORDER BY product.product_id;";
        $data =  $model->fetchAll($query);
        $this->data = $data;
        return $data;
    }
}