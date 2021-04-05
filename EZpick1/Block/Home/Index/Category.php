<?php
namespace Block\Home\Index;
\Mage::loadFileByClassName('Block\Core\Template');

class Category extends \Block\Core\Template
{
    public $data = [];
    public $categories = [];
    public $query = NULL;

    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/home/index/category.php');
    }

    public function getCategories()
    {
        if (!$this->categories) {
            $this->setCategories();
        }
       return $this->categories;
    }

    public function setCategories()
    {
        $model = \Mage::getModel('Model\Category');
        $query = "SELECT category.*, category_media.image_name
        FROM category
        LEFT JOIN category_media ON category.category_Id = category_media.category_Id
        ORDER BY category.category_Id;";
        $categories =  $model->fetchAll($query);
        $this->categories = $categories;
        return $this;
    }
}