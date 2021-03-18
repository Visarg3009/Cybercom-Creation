<?php
namespace Block\Admin\Product;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    public $query = NULL;
    public $data = [];

    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/product/grid.php');
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
        $data =  $model->fetchAll($this->query);
        $this->data = $data;
        return $data;
    }
}
?>