<?php
namespace Block\Admin\Category\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');

class Media extends \Block\Core\Edit
{
    public $image = null;
    public $query = NULL;
    public $data = [];

    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/category/edit/tabs/media.php');
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
        $category_Id = $this->getRequest()->getGet('id');
        $categoryMedia = \Mage::getModel('Model\Category\Media');
        $query = "SELECT * FROM category_media WHERE category_Id = {$category_Id};";
        $data =  $categoryMedia->fetchAll($query);
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