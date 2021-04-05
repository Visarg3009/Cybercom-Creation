<?php
namespace Block\Home;

class Category extends \Block\Core\Template
{
    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/home/category.php');
    }
}
