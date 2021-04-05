<?php
namespace Block\Home\Category;

class PricePanel extends \Block\Core\Template
{
    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/home/category/pricePanel.php');
    }
}