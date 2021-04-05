<?php
namespace Block\Home\Index;
\Mage::loadFileByClassName('Block\Core\Template');

class Blog extends \Block\Core\Template
{
    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/home/index/blog.php');
    }
}