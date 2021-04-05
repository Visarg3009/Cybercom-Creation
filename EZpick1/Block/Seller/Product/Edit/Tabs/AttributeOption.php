<?php
namespace Block\Seller\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');

class AttributeOption extends \Block\Core\Edit
{
    public $product = null;
    public $data = [];

    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/seller/product/edit/tabs/attributeOption.php');
    }

    public function getProduct()
    {
        if (!$this->product) {
            $this->setProduct();
        }
        return $this->product;
    }

    public function setProduct(\Model\Product $product = null)
    {
        if (!$product) {
            $product = \Mage::getModel('Model\Product');
        }
        if ($id = (int) $this->getRequest()->getGet('id')) 
        {
            $product = $product->load($id);  
        }
        $this->product = $product;
        return $this;
    }

    public function getAttributes()
    {
        if (!$this->data) {
            $this->setAttributes();
        }
        return $this->data;
    }

    public function setAttributes()
    {
        $attribute = \Mage::getModel('Model\Attribute');
        $query = "SELECT * FROM attribute WHERE `entityTypeId` = 'product' ORDER BY `sortOrder`;";
        $data = $attribute->fetchAll($query);
        $this->data = $data;
        return $this;
    }

    public function getFormUrl()
    {
        return $this->getUrl()->getUrl('save');
    }
}