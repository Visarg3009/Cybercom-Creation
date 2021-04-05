<?php
namespace Block\Admin\Layout;
\Mage::loadFileByClassName('Block\Core\Template');

class Header extends \Block\Core\Template
{
    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/layout/header.php');  
    }

    public function setUrl($url = null)
    {
        if (!$url) {
            $url = \Mage::getModel('Model\Core\Url');
        }
        $this->url = $url;
        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }
}