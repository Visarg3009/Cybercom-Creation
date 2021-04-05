<?php
namespace Block\Home\Category;

class ColorPanel extends \Block\Core\Template
{
    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/home/category/colorPanel.php');
    }
}