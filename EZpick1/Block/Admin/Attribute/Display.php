<?php
namespace Block\Admin\Attribute;
\Mage::loadFileByClassName('Block\Core\Edit');

class Display extends \Block\Core\Edit
{
    public $product = null;
    public $attribute = null;
    public $options = null;

    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/attribute/display.php');
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

    public function getAttribute()
    {
    	if (!$this->attribute) {
            $this->setAttribute();
        }
        return $this->attribute;
    }

    public function setAttribute(\Model\Attribute $attribute = null)
    {
        $this->attribute = $attribute;
        return $this;
    }

    public function getOptions()
    {
    	if (!$this->options) {
            $this->setOptions();
        }
        return $this->options;
    }

    public function setOptions()
    {
    	$option = \Mage::getModel('Model\Attribute\Option');
        $query = "SELECT * FROM `{$option->getTableName()}` WHERE `attributeId` = '{$this->getAttribute()->attributeId}';";
        
        $this->options = $option->fetchAll($query);
        return $this;
    }
}