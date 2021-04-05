<?php
namespace Block\Home\Index\Header;
\Mage::loadFileByClassName('Block\Core\Template');

class Menu extends \Block\Core\Template
{
    public $query = NULL;
    public $categories = [];

    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/home/index/header/menu.php');
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
        $categoryModel = \Mage::getModel('Model\Category');
        $query = "SELECT * FROM `{$categoryModel->getTableName()}` WHERE `parent_Id` = '0';";
        $categories =  $categoryModel->fetchAll($query);
        $this->categories = $categories;
        return $this;
    }
}