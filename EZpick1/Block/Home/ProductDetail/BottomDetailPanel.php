<?php
namespace Block\Home\ProductDetail;

class BottomDetailPanel extends \Block\Core\Template
{
    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/home/productDetail/bottomDetailPanel.php');
    }
}