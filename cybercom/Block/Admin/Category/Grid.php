<?php
namespace Block\Admin\Category;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    public $query = NULL;
    public $categories = [];
    public $categoriesOptions = [];

    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/category/grid.php');
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
        $categories =  $model->fetchAll($this->query);
        $this->categories = $categories;
        return $this;
    }

    public function getName($category)
    {
        $categoryModel = \Mage::getModel('Model\Category');
        if (!$this->categoriesOptions) {
            $query = "SELECT `category_Id`,`name` FROM `{$categoryModel->getTableName()}`";
            $this->categoriesOptions = $categoryModel->getAdapter()->fetchPairs($query);
        }

        $pathIds = explode('=', $category->path);
        foreach ($pathIds as $key => &$id) {
            if (array_key_exists($id, $this->categoriesOptions)) {
                $id = $this->categoriesOptions[$id];
            }
        }
        $name = implode('/', $pathIds);
        return $name;
    }
}
?>