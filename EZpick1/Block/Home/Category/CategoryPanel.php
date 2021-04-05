<?php 
namespace Block\Home\Category;

class CategoryPanel extends \Block\Core\Template
{
    protected $categories = [];

    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/home/category/categoryPanel.php');
    }

    public function getCategories()
    {
      $query="SELECT * FROM `category` WHERE `parent_Id` = '0'";
      $categories = \Mage::getModel('Model\Category')->fetchAll($query);
      $this->categories = $categories;
      return $this->categories;
    }
}