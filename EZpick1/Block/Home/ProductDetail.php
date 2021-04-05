<?php
namespace Block\Home;

class ProductDetail extends \Block\Core\Template
{
    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/home/productDetail.php');
    }
}