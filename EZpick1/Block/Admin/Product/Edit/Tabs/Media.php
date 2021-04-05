<?php
namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');

class Media extends \Block\Core\Edit
{
    public $image = null;
    public $query = NULL;
    public $data = [];

    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/product/edit/tabs/media.php');
    }

    // public function getImage()
    // {
    //     if (!$this->image) {
    //         $this->setImage();
    //     }
    //    return $this->image;
    // }

    // public function setImage(\Model\ProductMedia $image = null)
    // {   
    //     $request = \Mage::getModel('Model\Core\Request');
    //     if (!$image) {
    //         $image = \Mage::getModel('Model\ProductMedia');
    //     }
    //     if ($id = (int) $request->getGet('id'))
    //     {    
    //         $image = $image->load($id);
    //     }
    //     $this->image = $image;
    //     return $this;
    // }

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