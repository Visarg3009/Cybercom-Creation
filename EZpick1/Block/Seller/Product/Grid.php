<?php
namespace Block\Seller\Product;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    public $query = NULL;
    public $data = [];

    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/seller/product/grid.php');
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
        $sellerId = $_SESSION['sellerId'];
        $model = \Mage::getModel('Model\Product');
        $query = "SELECT * FROM product WHERE `sellerId` = '{$sellerId}';";
        $data =  $model->fetchAll($query);
        $this->data = $data;
        return $data;
    }
}