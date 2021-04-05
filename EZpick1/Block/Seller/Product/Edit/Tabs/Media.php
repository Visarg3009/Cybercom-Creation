<?php
namespace Block\Seller\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');

class Media extends \Block\Core\Edit
{
    public $image = null;
    public $query = NULL;
    public $data = [];

    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/seller/product/edit/tabs/media.php');
    }

    public function getImages()
    {
        if (!$this->data) {
            $this->setImages();
        }
       return $this->data;
    }

    public function setImages()
    {
        $product_id = \Mage::getModel('Model\Core\Request')->getGet('id');
        $model = \Mage::getModel('Model\ProductMedia');
        $query = "SELECT * FROM product_media WHERE product_id = {$product_id};";
        $data =  $model->fetchAll($query);
        $this->data = $data;
        return $data;
    }

    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('upload');
    }

    public function getTitle()
    {
        return 'Image Add/Edit';
    }
}
?>