<?php
namespace Block\Seller\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');

class Form extends \Block\Core\Edit
{
    protected $categoryOption = null;

    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/Seller/product/edit/tabs/form.php');
    }

    public function getCategoryOption()
    {
        if (!$this->categoryOption) {
            $this->setCategoryOption();
        }
       return $this->categoryOption;
    }

    public function setCategoryOption($categoryOption = null)
    {
        $model = \Mage::getModel('Model\Category');
        $query = "SELECT `category_Id`,`name` FROM `category`;";
        $options =  $model->getAdapter()->fetchPairs($query);

        $query = "SELECT `category_Id`,`path` FROM `category`;";
        $categoryOption =  $model->getAdapter()->fetchPairs($query);
        
        if ($categoryOption) {
            foreach ($categoryOption as $categoryId => &$pathId) {
                $pathIds = explode("=", $pathId);

                foreach ($pathIds as $key => &$id) {
                    if (array_key_exists($id, $options)) {
                        $id = $options[$id];
                    }
                }
                $pathId = implode("=>", $pathIds);
            }
        }
        
        $categoryOption = [""=>"Root Category"] + $categoryOption;

        $this->categoryOption = $categoryOption;
        return $this;
    }

    public function getTitle()
    {
        return 'Product Add/Edit';
    }
}